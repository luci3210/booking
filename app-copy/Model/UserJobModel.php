<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserJobModel extends Model
{
    protected $table = 'users_jobs';
    protected $fillable = ['id','user_id','job_id'];
}
