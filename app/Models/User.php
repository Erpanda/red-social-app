<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'fullname',
        'username',
        'email',
        'password',
        'bio',
        'role',
        'avatar',
        'portada_photo',
    ];

    public function isAdmin(): bool {
        return $this->role === 'admin';
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function seguidores()
    {
        return $this->belongsToMany(
            User::class,
            'seguidores',
            'seguido_id',   // este usuario es el seguido
            'seguidor_id'   // los que lo siguen
        )->wherePivot('activo', true);
    }

    public function siguiendo()
    {
        return $this->belongsToMany(
            User::class,
            'seguidores',
            'seguidor_id',  // este usuario sigue a otros
            'seguido_id'
        )->wherePivot('activo', true);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    // public function seguidores() {
    //     return $this->hasMany(Seguidor::class);
    // }
}

