<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomBooking extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'role', 'role_id', 'name', 'phone_number', 'email', 'date', 'start_time', 'end_time', 'purpose', 'room_id', 'isApproved'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $dates =[
        'deleted_at',
    ];

    public function isApproved()
    {
        if($this->isApproved == 0)
            return 'On progress';
        elseif($this->isApproved == 1) 
            return 'Approved';
        else
            return 'Rejected';
    }

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }
}