<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class TourModel extends Model
{
    protected $table = 'service_tour';
    protected $fillable = ['id',
        'price',
        'nonight',
        'tour_name',
        'roomdesc',
        'tour_desc',
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
        'pay_method',
        'qty',
        'tour_expect',
        'on_home',
        'service_id',
        'created_at'];
}
