<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminLogModel extends Model
{
    protected $table = 'admin_logs';
    protected $fillable = ['user_id','page_id','action','page_name'];
}
