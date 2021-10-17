<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class MerchantModel extends Model
{
    protected $table = 'merchant';
    protected $fillable = ['id','merchant_key','user_id','plan_id','temp_status'];
}
