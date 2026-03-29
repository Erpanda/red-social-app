<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    // POST /comentarios
    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required|max:500',
            'post_id'   => 'required|exists:posts,id',
        ]);

        Comentario::create([
            'user_id'   => Auth::id(),
            'post_id'   => $request->post_id,
            'contenido' => $request->contenido,
        ]);

        return back()->with('exito', 'Comentario agregado.');
    }

    // DELETE /comentarios/{comentario}
    public function destroy(Comentario $comentario)
    {
        if ($comentario->user_id !== Auth::id()) {
            abort(403);
        }

        $comentario->delete();

        return back()->with('exito', 'Comentario eliminado.');
    }
}