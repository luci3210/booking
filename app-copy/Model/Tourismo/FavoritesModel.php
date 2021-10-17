<?php

namespace App\Model\Tourismo;

use Illuminate\Database\Eloquent\Model;

class FavoritesModel extends Model
{
    //
    protected $table = 'favorites';
    const CREATED_AT = 'fv_created_at';
    const UPDATED_AT = 'fv_updated_at';
    protected $primaryKey = 'fv_id';

}
