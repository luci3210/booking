<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class MerchantAddress extends Model
{
    protected $table = 'merchant_address';
    protected $fillable = ['id','prof_id','address','longt','latt','temp_status','country_id','region_id','district_id','city_id','municipality_id','barangay_id'];
}
