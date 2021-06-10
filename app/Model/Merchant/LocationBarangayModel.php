<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class LocationBarangayModel extends Model
{
   protected $table = 'locations_barangay';
   protected $fillable = ['id','location_id','country_id','region_id','district_id','city_id','municipality_id','barangay','temp_status'];
}
