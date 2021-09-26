<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class LocationCountyModel extends Model
{
    public $timestamps = false;
    
    protected $table = 'location_country';
    protected $primaryKey = 'id';
    protected $guarded = [];

    //protected $fillable = ['id','location_id','country','temp_status'];
}
