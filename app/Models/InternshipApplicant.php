<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternshipApplicant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'student_id', 'internship_program_id', 'status', 'cv_location'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $dates =[
        'deleted_at',
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function internship_program()
    {
        return $this->belongsTo('App\Models\InternshipProgram');
    }

    public function status()
    {
        if($this->status == 0)
            return 'On progress';
        elseif($this->status == 1) 
            return 'Accepted';
        else
            return 'Rejected';
    }
}