<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MerchantVerifyModel extends Model
{
    protected $table = 'merchant_verify';
    protected $fillable = ['id','prof_id','verify_id','description'];
}
