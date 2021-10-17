<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PlanModel extends Model
{
    protected $table = 'plans';
    protected $fillable = ['id','plan_name','plan_price','plan_scope','plan_package','temp_status','user_id'];
}
