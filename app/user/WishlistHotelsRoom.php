<?php

namespace App\user;

use Illuminate\Database\Eloquent\Model;

class WishlistHotelsRoom extends Model
{
    //
    protected $table = 'wishlist';
    const CREATED_AT = 'wh_created_at';
    const UPDATED_AT = 'wh_updated_at';
    protected $primaryKey = 'wh_id';

    
}
