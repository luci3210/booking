<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
	protected $table = 'profiles';
	protected $fillable = ['id','plan_id','company','address','email','telno','phonno','website','about','user_id','profilepic','type'];
}
