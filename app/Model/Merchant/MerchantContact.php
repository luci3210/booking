<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class MerchantContact extends Model
{
    protected $table = 'merchant_contact';
    protected $fillable = ['id','prof_id','fname','lname','email','phonno','temp_status'];
}
