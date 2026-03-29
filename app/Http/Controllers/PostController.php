<?php

namespace App\Http\Controllers;

use Cloudinary\Cloudinary;

use App\Models\Post;
use App\Models\PostMultimedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    private function getCloudinary(): Cloudinary
    {
        return new Cloudinary(config('cloudinary.cloud_url'));
    }

    public function index(Request $request) {

        $busqueda = $request->query('q');

        if ($busqueda) {
            $posts = Post::where('estado', 'publicado')
                    ->where('activo', true)
                    ->where(function($query) use ($busqueda) {
                        $query->where('titulo', 'like', "%{$busqueda}%")
                            ->orWhere('contenido', 'like', "%{$busqueda}%");
                    })
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);

            $sugeridos = User::where('id', '!=', Auth::id())
                    ->where('activo', 1)
                    ->where(function($query) use ($busqueda) {
                        $query->where('fullname', 'like', "%{$busqueda}%")
                            ->where('username', 'like', "%{$busqueda}%");
                    })
                    ->withCount('seguidores')
                    ->orderBy('seguidores_count', 'desc')
                    ->take(5)
                    ->get();
        
            return view('posts.index', compact('posts', 'busqueda'));
        }

        $tendencias = Post::where('estado', 'publicado')
                    ->where('activo', true)
                    ->withCount('reacciones')
                    ->orderBy('reacciones_count', 'desc')
                    ->take(5)
                    ->get();

        $sugeridos = User::where('id', '!=', Auth::id())
                    ->where('activo', 1)
                    ->withCount('seguidores')
                    ->orderBy('seguidores_count', 'desc')
                    ->take(5)
                    ->get();

        $recientes = Post::where('estado', 'publicado')
                    ->where('activo', true)
                    ->with('user')
                    ->inRandomOrder()
                    ->take(6)
                    ->get();

        return view('posts.index', compact('tendencias', 'sugeridos', 'recientes'));
    }

    public function store(Request $request)
    {
        
        try {
            $request->validate([
                'tipo_privacidad' => 'nullable',
            ]);

            $contenidoVacio = trim($request->contenido) === '';
            $sinArchivos = !$request->file('archivos');

            if ($contenidoVacio && $sinArchivos) {
                return response()->json([
                    'success' => false,
                    'message' => 'Debes escribir algo o subir al menos un archivo'
                ]);
            }

            $post = Post::create([
                    'user_id'   => Auth::id(),
                    'slug' => Str::slug(Str::limit($request->contenido, 40, '')) . '-' . uniqid(),
                    'contenido' => $request->contenido,
                    'tipo_privacidad'    => $request->tipo_privacidad,
                ]);
            $id = $post->id;

            $cloudinary = $this->getCloudinary();

            // No olvidad desactivar / activar los permisos de files en Security
            $orden = 0;
            if ($request->file('archivos')) {
                foreach ($request->file('archivos') as $tipo => $files) {
                    foreach ($files as $file) {
                        if ($tipo === 'file') {
                            $result = $cloudinary->uploadApi()->upload(
                                $file->getRealPath(),
                                [
                                    'folder' => $tipo,
                                    'resource_type' => 'raw',
                                    'public_id' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                                    'format' => $file->getClientOriginalExtension(),
                                ]
                            );
                        } else {
                            $result = $cloudinary->uploadApi()->upload(
                                $file->getRealPath(),
                                ['folder' => $tipo]
                            );
                        }

                        PostMultimedia::create([
                            'post_id' => $id,
                            'url'     => $result['secure_url'],
                            'tipo'    => $tipo,
                            'orden'   => $orden++,
                        ]);
                    }
                }
            }

            return response()->json(['success' => true, 'message' => 'Posteo exitoso']);
        
        } catch (\Exception $e) {
            response()->json(['success' => false , 'message' => $e->getMessage()]);
        }
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'contenido' => 'required',
            'imagen'    => 'nullable',
        ]);

        $post->update([
            'contenido' => $request->contenido,
        ]);

        return redirect()->route('perfil.show', Auth::user())->with('exito', 'Post actualizado.');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->update(['activo' => false]);
        $post->delete();

        return redirect()->route('perfil.show', Auth::user())->with('exito', 'Post eliminado.');
    }

}