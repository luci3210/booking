<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class LocationCityModel extends Model
{
    protected $table = 'locations_city';
    protected $fillable = ['id','location_id','country_id','region_id','district_id','city','temp_status'];
}
