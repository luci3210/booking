<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class MerchantPermit extends Model
{
    protected $table = 'merchant_permit';
    protected $fillable = ['id','prof_id','permit','temp_status'];
}
