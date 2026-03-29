<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguidor extends Model
{
    protected $fillable = ['seguidor_id', 'seguido_id', 'activo'];

}
