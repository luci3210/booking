<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class HotelModel extends Model
{
    protected $table = 'hotels';
    protected $fillable = ['id',
    	'price',
    	'nonight',
    	'roomname',
    	'roomdesc',
    	'roomsize',
    	'viewdeck',
    	'noguest',
    	'nobed',
    	'profid',
    	'serviceid',
    	'temp_status',
    	'picimages',
    	'room_facilities',  
        'building_facilities',
        'booking_package',
        'country',
        'region',
        'district',
        'city',
        'municipality',
        'barangay',
        'address_id',
        'created_at'];
}
