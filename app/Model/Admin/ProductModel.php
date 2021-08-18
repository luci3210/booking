<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
	protected $table = 'products';
	protected $primaryKey = 'id';
	protected $guarded = [];
    protected $fillable = ['id','name','description','temp_status','user_id','icon_id'];
}
