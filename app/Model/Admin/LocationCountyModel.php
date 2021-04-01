<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class LocationCountyModel extends Model
{
    protected $table = 'location_country';
    protected $fillable = ['id','location_id','country','temp_status'];
}
