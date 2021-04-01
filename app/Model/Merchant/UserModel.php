<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $fillable = ['id','name','email'];
}
