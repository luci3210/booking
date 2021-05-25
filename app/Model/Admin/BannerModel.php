<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    protected $table = 'banners';
    protected $fillable = ['id','short_des',
    	'long_desc	',
    	'banner_img',
    	'location',
    	'user_id',
    	'temp_status'];
}
