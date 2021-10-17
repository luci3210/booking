<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class HotelPhoMoldel extends Model
{
    protected $table = 'hotel_photos';
    protected $fillable = ['id','merchant_id','upload_id','photo','temp_status'];
}
