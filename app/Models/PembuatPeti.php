<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PembuatPeti extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pembuat_peti';
    protected $fillable = ['nama', 'email', 'password'];
}
