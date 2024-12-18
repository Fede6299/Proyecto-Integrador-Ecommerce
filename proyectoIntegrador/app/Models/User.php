<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "admin_user";
    protected $primaryKey = "id_admin";
    protected $fillable = [
        'nombre',
        'user_name',
        'apellido',
        'password',
        'email',
        'activo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
