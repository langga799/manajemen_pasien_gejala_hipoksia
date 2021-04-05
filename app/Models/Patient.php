<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Contracts\Auth\CanResetPassword;

class Patient extends Model implements CanResetPassword
{
    use HasApiTokens, Notifiable;

    protected $guard = 'patient';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'photo',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat'
    ];
}
