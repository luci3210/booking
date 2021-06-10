<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class MerchantCountyModel extends Model
{
    protected $table = 'location_country';
    protected $fillable = ['id','location_id','country','temp_status'];
}
