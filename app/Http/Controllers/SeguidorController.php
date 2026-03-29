<?php

namespace App\Http\Controllers;

use App\Models\Seguidor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeguidorController extends Controller
{
    // POST /seguidores
    public function store(Request $request)
    {
        $request->validate([
            'seguido_id' => 'required|exists:users,id',
        ]);

        if ($request->seguido_id == Auth::id()) {
            return back();
        }

        $existente = Seguidor::where('seguidor_id', Auth::id())
                            ->where('seguido_id', $request->seguido_id)
                            ->first();

        if ($existente) {
            // Ya lo sigue, deja de seguirlo
            $existente->update([
                'activo'         => false,
                'unfollowed_at'  => now(),
            ]);
        } else {
            Seguidor::create([
                'seguidor_id' => Auth::id(),
                'seguido_id'  => $request->seguido_id,
                'activo'      => true,
            ]);
        }

        return back();
    }
}