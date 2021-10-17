<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class BankAccountModel extends Model
{
    protected $table = 'bank_accounts';
    protected $fillable = ['account_name','account_bank_id','account_number','profid','status'];
}
