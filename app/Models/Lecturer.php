<?php

namespace App\Models;

use App\Notifications\LecturerResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturer extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'code', 'nip', 'name', 'email', 'password', 'username'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at', 'password', 'remember_token',
    ];
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new LecturerResetPassword($token));
    }
}
