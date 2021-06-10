<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class LocationModel extends Model
{
    protected $table = 'locations';
    protected $fillable = ['id','name','temp_status'];
}
