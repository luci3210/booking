<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    
                
    protected $table = 'jobs';
    protected $fillable = ['id','job','description'];

    public function users() {

        return $this->belongsToMany('App\User','users_jobs','job_id','user_id');
    }

    public function users_admin() {

        return $this->belongsToMany('App\Admin','users_jobs','job_id','user_id');
    }

}
