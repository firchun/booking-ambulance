<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Supir extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'supir';
    protected $fillable = ['nama', 'alamat', 'noHP', 'email', 'password'];
}
