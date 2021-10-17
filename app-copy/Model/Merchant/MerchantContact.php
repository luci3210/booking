<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class MerchantContact extends Model
{

    public $timestamps = false;

    protected $table = 'merchant_contact';
    protected $primaryKey = 'id';
    protected $guarded = [];

}
