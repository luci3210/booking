<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class MyplanModel extends Model
{
    protected $table = 'myplans';
    protected $fillable = ['id','user_id','plan_auth','plan_key','plan_name','plan_price','plan_list','paid_curency','expired','temp_status','terms','validity'];
}
