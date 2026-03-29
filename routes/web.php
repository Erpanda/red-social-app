<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ReaccionController;
use App\Http\Controllers\SeguidorController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ExploreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {

    // Feed principal
    Route::get('/feed', [FeedController::class, 'index'])->name('feed');
    Route::get('/explore', [ExploreController::class, 'index'])->name('explore');

    // Perfil de usuario
    Route::get('/perfil/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/perfil/{user}/tab/{tab}', [ProfileController::class, 'tab'])->name('profile.tab');

    // Route::post('/profile/imagenes', [ProfileController::class, 'actualizarImagenes'])->name('profile.imagenes');
    Route::post('/profile/imagenes/{tipo?}', [ProfileController::class, 'actualizarImagenes'])->name('profile.imagenes');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::get('/users', [ProfileController::class, 'users'])->name('profile.users');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Posts
    Route::resource('posts', PostController::class)->only(['index','store', 'show', 'edit', 'update', 'destroy']);

    // Comentarios, reacciones y seguidores
    Route::resource('comentarios', ComentarioController::class)->only(['store', 'destroy']);
    Route::resource('reacciones', ReaccionController::class)->only(['store', 'destroy']);
    Route::resource('seguidores', SeguidorController::class)->only(['store']);

    // Notificaciones
    Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones.index');
    Route::put('/notificaciones/leer-todas', [NotificacionController::class, 'leerTodas'])->name('notificaciones.leerTodas');
    Route::put('/notificaciones/{notificacion}/leer', [NotificacionController::class, 'leer'])->name('notificaciones.leer');

});

require __DIR__.'/auth.php';