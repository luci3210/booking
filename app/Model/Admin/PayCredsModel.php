<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PayCredsModel extends Model
{
    protected $table = 'payment_creds';
    protected $fillable = ['id','api_name','private_key','public_key','merchant_id','merchant_name','temp_status'];
}
