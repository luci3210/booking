<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;


class TourPhoModel extends Model
{
    protected $table = 'service_tour_photos';
    protected $fillable = ['id','merchant_id','upload_id','photo','temp_status'];
}
