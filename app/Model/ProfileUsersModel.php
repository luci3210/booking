<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProfileUsersModel extends Model
{
    protected $table = 'profile_users';
    protected $primaryKey = 'pu_id';
    protected $guarded = [];

    public $timestamps = false;

}
