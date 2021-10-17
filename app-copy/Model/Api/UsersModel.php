<?php

namespace App\Model\Api;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
// sanctum
use Laravel\Sanctum\HasApiTokens;



class UsersModel extends Authenticatable implements MustVerifyEmail
{
    //
    use HasApiTokens, Notifiable;
    protected $table = "users";
    protected $primaryKey = 'id';
    protected $hidden  = ['password', 'remember_token'];
}
