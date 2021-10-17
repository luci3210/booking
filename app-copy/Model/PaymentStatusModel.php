<?php

namespace App\user;

use Illuminate\Database\Eloquent\Model;

class PaymentStatusModel extends Model
{
    
    protected $table = 'status_payment';
    protected $primaryKey = 'ps_id';
    protected $guarded = [];

    const CREATED_AT = 'ps_created_at';
    const UPDATED_AT = 'ps_updated_at';
    
}
