<?php

namespace App\user;

use Illuminate\Database\Eloquent\Model;

class StatusPaymentModel extends Model
{
    //

    protected $table = 'status_payment';
    const CREATED_AT = 'ps_created_at';
    const UPDATED_AT = 'ps_updated_at';
    protected $primaryKey = 'ps_id';
}
