<?php

namespace App\Http\Controllers;

use App\Models\Reaccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReaccionController extends Controller
{
    // POST /reacciones
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'tipo'    => 'required|in:like,corazon,fuego',
        ]);

        // Si ya reaccionó con el mismo tipo, la elimina (toggle)
        $existente = Reaccion::where('user_id', Auth::id())
                            ->where('post_id', $request->post_id)
                            ->where('tipo', $request->tipo)
                            ->first();

        if ($existente) {
            $existente->delete();
        } else {
            Reaccion::create([
                'user_id' => Auth::id(),
                'post_id' => $request->post_id,
                'tipo'    => $request->tipo,
            ]);
        }

        return back();
    }

    public function destroy(Reaccion $reaccion)
    {
        if ($reaccion->user_id !== Auth::id()) {
            abort(403);
        }

        $reaccion->delete();

        return back();
    }
}