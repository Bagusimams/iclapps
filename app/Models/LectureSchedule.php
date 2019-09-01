<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LectureSchedule extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'role', 'role_id', 'subject', 'code', 'sks', 'lecturer_id', 'class', 'day', 'date', 'start_time', 'end_time', 'room_id', 'status', 'mode'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $dates =[
        'deleted_at',
    ];

    public function lecturer()
    {
        return $this->belongsTo('App\Models\Lecturer');
    }

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    public function convertStatus()
    {
        switch ($this->status) {
            case '0':
                return 'Not checked';
                break;

            case '1':
                return 'Approved';
                break;

            case '2':
                return 'Rejected';
                break;

            case '3':
                return 'Permanent';
                break;

            case '4':
                return 'Temporary';
                break;
        }
    }

    public function convertMode()
    {
        if($this->mode == 'per') return 'Permanent';
        else return 'Temporary';
    }
}