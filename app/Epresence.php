<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Epresence extends Model
{
    protected $fillable = [
        'id_users', 'type', 'is_approve', 'waktu'
    ];
}
