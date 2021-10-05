<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProfileServiceModel extends Model
{

    public $timestamps = false;

    protected $table = 'profile_services';
    protected $primaryKey = 'ps_id';
    protected $guarded = [];

}
