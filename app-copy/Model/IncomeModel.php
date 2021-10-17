<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class IncomeModel extends Model
{
    protected $table = 'income';
    protected $primaryKey = 'mi_id';
    protected $guarded = [];

}
