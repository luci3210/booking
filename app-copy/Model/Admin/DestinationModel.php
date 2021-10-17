<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class DestinationModel extends Model
{
    protected $table = 'destinations';
    protected $fillable = [
    		'id',
    		'country_id',
    		'destination_id',
    		'destination_info',
    		'destination_desc',
    		'destination_image',
    		'temp_status'
    	];
}
