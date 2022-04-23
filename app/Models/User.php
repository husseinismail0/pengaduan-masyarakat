<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ADMIN = 'ADMIN';
    const PETUGAS = 'PETUGAS';

    /**
     * The attributes that should be hidden for serialization.
     *
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
