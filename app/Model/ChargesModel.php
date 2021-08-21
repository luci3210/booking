<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChargesModel extends Model
{
    protected $table = 'charges';
    protected $primaryKey = 'chrg_id';
    protected $guarded = [];
}
