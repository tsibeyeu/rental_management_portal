<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class Admin extends AuthenticatableUser
{
    use HasFactory;
    protected $guard='admin';
    protected $fillable=[
        'first_name',
        'second_name',
        'email',
        'password',
    ];
    protected $hidden=[
        'password',
        'remember_token',
    ];
    protected $casts=[
          'email_verified_at' => 'datetime',
    ];
}
