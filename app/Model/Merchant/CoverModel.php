<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class CoverModel extends Model
{
    protected $table = 'cover';
    protected $fillable = ['profid','product_id','service_post_id','cover'];
}
