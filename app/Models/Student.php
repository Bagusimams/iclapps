<?php

namespace App\Models;

use App\Notifications\StudentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'batch_year', 'nim', 'name', 'school_id', 'major_id', 'phone_number', 'email', 'password', 'username'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at', 'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StudentResetPassword($token));
    }

    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }

    public function major()
    {
        return $this->belongsTo('App\Models\Major');
    }
}
