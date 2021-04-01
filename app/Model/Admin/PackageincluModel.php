<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PackageincluModel extends Model
{
    protected $table = 'package_inclusion';
    protected $fillable = ['id','name','temp_status'];
}
