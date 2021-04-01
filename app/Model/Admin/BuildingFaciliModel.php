<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class BuildingFaciliModel extends Model
{
    protected $table = 'building_dacilities';
    protected $fillable = ['id','name','temp_status'];
}
