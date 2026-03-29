<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'slug', 'contenido', 'tipo_privacidad'
    ];

    // Un post le pertenece a un usuario
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function multimedia() {
        return $this->hasMany(PostMultimedia::class)->orderBy('orden');
    }

    public function reacciones() {
        return $this->hasMany(Reaccion::class);
    }
}
