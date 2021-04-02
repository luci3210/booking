<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class LocationRegionModel extends Model
{
    protected $table = 'locations_region';
    protected $fillable = ['id','location_id','country_id','region','temp_status'];
}
