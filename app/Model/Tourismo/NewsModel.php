<?php

namespace App\Model\Tourismo;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    //
    protected $table = 'news';
    const CREATED_AT = 'news_created_at';
    const UPDATED_AT = 'news_updated_at';
    protected $primaryKey = 'news_id';
}
