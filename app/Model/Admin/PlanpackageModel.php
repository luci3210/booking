<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PlanpackageModel extends Model
{
    protected $table = 'plan_package';
    protected $fillable = ['package','temp_status'];
}
