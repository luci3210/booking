<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class LocationMunicipalityModel extends Model
{
    protected $table = 'locations_municipalities';
    protected $fillable = ['id','location_id','country_id','region_id','district_id','city_id','municipality','temp_status'];
}
