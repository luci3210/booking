<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class IncomeWithdrawModel extends Model
{
    public $timestamps = false;

    protected $table = 'income_withdrawals';
    protected $primaryKey = 'iw_id';
    protected $guarded = [];
    
}