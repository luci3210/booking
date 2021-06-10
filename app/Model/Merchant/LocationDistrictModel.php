<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class LocationDistrictModel extends Model
{
    protected $table = 'locations_district';
    protected $fillable = ['id','location_id','country_id','region_id','district','temp_status'];
}
