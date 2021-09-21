<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table = 'profiles';
	protected $primaryKey = 'id';
    protected $guarded = [];	
}
