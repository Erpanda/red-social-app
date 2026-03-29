<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    // GET /notificaciones
    public function index()
    {
        $notificaciones = Notificacion::where('user_id', Auth::id())
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('notificaciones.index', compact('notificaciones'));
    }

    // PUT /notificaciones/{notificacion}/leer
    public function leer(Notificacion $notificacion)
    {
        if ($notificacion->user_id !== Auth::id()) {
            abort(403);
        }

        $notificacion->update(['leida' => true]);

        return back();
    }

    // PUT /notificaciones/leer-todas
    public function leerTodas()
    {
        Notificacion::where('user_id', Auth::id())
                    ->where('leida', false)
                    ->update(['leida' => true]);

        return back();
    }
}