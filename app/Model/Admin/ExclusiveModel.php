<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ExclusiveModel extends Model
{
    protected $table = 'exclusives';
    protected $fillable = [
    		'id',
    		'merchant_id',
    		'exclusive_info',
    		'exclusive_desc',
    		'for_home',
    		'for_approve',
            'exclusive_image',
            'temp_status'
    	];
}
