<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMultimedia extends Model
{
    protected $fillable = [
        'post_id', 'url', 'tipo', 'orden'
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }

}
