<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
	protected $table = 'product';
    protected $fillable = ['name','description'];
}
