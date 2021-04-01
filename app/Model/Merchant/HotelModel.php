<?php

namespace App\Model\Merchant;

use Illuminate\Database\Eloquent\Model;

class HotelModel extends Model
{
    protected $table = 'hotels';
    protected $fillable = ['id','price','nonight','roomname','roomdesc','roomsize','viewdeck','noguest','nobed','profid','serviceid','temp_status','picimages'];
}
