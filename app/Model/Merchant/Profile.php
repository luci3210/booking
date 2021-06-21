<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table = 'profiles';
	protected $fillable = ['id','plan_id','company','address','email','telno','phonno','website','about','user_id','profilepic','type','id1','account_id'];
}
