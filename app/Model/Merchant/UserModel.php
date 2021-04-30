<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $fillable = ['id','name','email','fname','lname','mname','gender','country','pnumber','address','profpic','accnt_nu','bdate'];
}
