<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class RoomFaciliModel extends Model
{
    protected $table = 'room_facilities';
    protected $fillable = ['id','name','temp_status'];
}
