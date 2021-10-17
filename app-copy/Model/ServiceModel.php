<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
	protected $table = 'products';
	protected $primaryKey = 'id';
	protected $guarded = [];
    // protected $fillable = ['id','name','description','temp_status','user_id','icon_id'];
}
