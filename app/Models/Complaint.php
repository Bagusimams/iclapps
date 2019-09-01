<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'role', 'role_id', 'name', 'identity_number', 'school_id', 'major_id', 'phone_number', 'email', 'date', 'comment', 'complaint_type', 'reason', 'isDone'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $dates =[
        'deleted_at',
    ];

    public function isDone()
    {
        if($this->isDone == 0)
            return 'On progress';
        elseif($this->isDone == 1) 
            return 'Solved';
        else
            return 'Rejected';
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