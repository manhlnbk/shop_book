<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Role extends Authenticatable
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = [
        'role',
        'name'
    ];
}
