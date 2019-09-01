<?php

namespace App\Models;

use App\Notifications\StaffResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password', 'username'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at', 'password', 'remember_token',
    ];

    protected $dates =[
        'deleted_at',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StaffResetPassword($token));
    }
}
