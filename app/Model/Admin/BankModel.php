<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class BankModel extends Model
{
    protected $table = 'bank_names';
    protected $fillable = ['id','bank','status'];
}
