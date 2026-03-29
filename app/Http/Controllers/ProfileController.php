<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Seguidor;
use App\Models\Comentario;

use Cloudinary\Cloudinary;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    private function getCloudinary(): Cloudinary
    {
        return new Cloudinary(config('cloudinary.cloud_url'));
    }

    public function actualizarImagenes(Request $request, String $tipo = 'all')
    {
        try {
            $request->validate([
                'avatar'        => 'nullable|image|max:2048',
                'portada_photo' => 'nullable|image|max:4096',
            ]);

            $data = [];
            $cloudinary = $this->getCloudinary();

            if ($tipo === 'portada_photo') {
                if ($request->hasFile('portada')) {
                    try {
                        $result = $cloudinary->uploadApi()->upload(
                            $request->file('portada')->getRealPath(),
                            ['folder' => 'portadas']
                        );
                        $data['portada_photo'] = $result['secure_url'];
                    } catch (\Exception $e) {
                        dd($e->getMessage());
                    }
                }
            } elseif ($tipo === 'avatar') {
                if ($request->hasFile('avatar')) {
                    try {
                        $result = $cloudinary->uploadApi()->upload(
                            $request->file('avatar')->getRealPath(),
                            ['folder' => 'avatars']
                        );
                        $data['avatar'] = $result['secure_url'];
                    } catch (\Exception $e) {
                        dd($e->getMessage());
                    }
                }
            } else {
                if ($request->hasFile('avatar')) {
                    try {
                        $result = $cloudinary->uploadApi()->upload(
                            $request->file('avatar')->getRealPath(),
                            ['folder' => 'avatars']
                        );
                        $data['avatar'] = $result['secure_url'];
                    } catch (\Exception $e) {
                        dd($e->getMessage());
                    }
                }

                if ($request->hasFile('portada')) {
                    try {
                        $result = $cloudinary->uploadApi()->upload(
                            $request->file('portada')->getRealPath(),
                            ['folder' => 'portadas']
                        );
                        $data['portada_photo'] = $result['secure_url'];
                    } catch (\Exception $e) {
                        dd($e->getMessage());
                    }
                }
            }

            if (!empty($data)) {
                Auth::user()->update($data);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            response()->json(['success' => false , 'message' => $e->getMessage()]);
        }
    }

    public function show(User $user)
    {
        $esMiPerfil = Auth::id() === $user->id;
        return view('profile.show', compact('user', 'esMiPerfil'));
    }

    public function tab(User $user, string $tab)
    {
        return match($tab) {
            'posts' => view('profile.tabs.posts', [
                'user' => $user->only('id', 'fullname', 'username', 'avatar', 'bio'),
                'posts' => $user->posts()->with('multimedia')->latest()->get(),
                'seguidores' => $user->seguidores()->get(),
            ]),
            'comentarios' => view('profile.tabs.comentarios', [
                'user'        => $user,
                'comentarios' => Comentario::where('user_id', $user->id)->with('post')->latest()->get(),
            ]),
            'destacado' => view('profile.tabs.destacado', [
                'user'       => $user,
                'destacados' => Post::where('user_id', $user->id)->where('destacado', true)->latest()->get(),
            ]),
            'multimedia' => view('profile.tabs.multimedia', [
                'user'       => $user,
                'multimedia' => Post::where('user_id', $user->id)->whereNotNull('imagen')->latest()->get(),
            ]),
            'megusta' => view('profile.tabs.megusta', [
                'user'    => $user,
                'megusta' => $user->megusta()->with('user')->latest()->get(),
            ]),
            'guardado' => view('profile.tabs.guardado', [
                'user'     => $user,
                'guardado' => $user->guardado()->with('user')->latest()->get(),
            ]),
            default => view('profile.tabs.posts', [
                'user'  => $user,
                'posts' => Post::where('user_id', $user->id)->latest()->get(),
            ]),
        };
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', ['user' => $request->user()]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        Auth::logout();

        $user->update(['activo' => false]);
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}