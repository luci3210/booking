<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jobs() {

        return $this->belongsToMany('App\Job','users_jobs','user_id','job_id');
    }

    public function hasJob($jobs) {

        if(is_array($jobs)) {

            foreach($jobs as $job) {

                if($this->hasAjob($job)) {

                    return true;
                }
            }
        } else {

            if($this->hasAjob($jobs)) {

                return true;
            }
        }

        return false;
    }

    public function hasAjob($job) {

        if($this->jobs()->where('job',$job)->first()) {

            return true;
        }
    }
}
