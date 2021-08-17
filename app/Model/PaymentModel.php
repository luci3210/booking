<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'pm_id';
    // protected $fillable = ['pm_id','pm_payment_status','pm_page_id'];
    protected $guarded = [];
}
