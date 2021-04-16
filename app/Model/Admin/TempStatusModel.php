<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class TempStatusModel extends Model
{
    protected $table = 'temp_status';
    protected $fillable = ['id','status','name'];
}
