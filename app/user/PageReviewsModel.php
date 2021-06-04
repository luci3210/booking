<?php

namespace App\user;

use Illuminate\Database\Eloquent\Model;

class PageReviewsModel extends Model
{
    //
    protected $table = 'page_reviews';
    const CREATED_AT = 'pr_created_at';
    const UPDATED_AT = 'pr_updated_at';
    protected $primaryKey = 'pr_id';
}
