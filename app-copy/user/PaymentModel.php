<?php

namespace App\user;

use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    //
    protected $table = 'payments';
    const CREATED_AT = 'pm_created_at';
    const UPDATED_AT = 'pm_updated_at';
    protected $primaryKey = 'pm_id';
}
