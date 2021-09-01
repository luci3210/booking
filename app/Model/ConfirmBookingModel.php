<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ConfirmBookingModel extends Model
{
    protected $table = 'charges_date';
    protected $primaryKey = 'chrg_id';
    protected $fillable = ['chg_ps_id','chg_prf_id','chg_confirm_no','chg_date','chg_created_at','chg_updated_at'];

    protected $guarded = [];
}
