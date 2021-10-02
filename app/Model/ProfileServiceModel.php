<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProfileServiceModel extends Model
{
    protected $table = 'profile_services';
    protected $primaryKey = 'ps_id';
    protected $guarded = [];

    public $timestamps = false;

}
