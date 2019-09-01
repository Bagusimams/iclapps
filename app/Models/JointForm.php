<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JointForm extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'student_id', 'full_name', 'passport_number', 'passport_expiry_date', 'birth_date', 'gender', 'phone_number', 'email', 'address', 'whatsapp', 'id_number', 'school_id', 'major_id', 'class', 'gpa', 'toefl', 'semester', 'batch', 'university_joint_id', 'semester_applied', 'father_name', 'father_occupation', 'father_phone_number', 'father_email', 'father_postal_address', 'mother_name', 'mother_occupation', 'mother_phone_number', 'mother_email', 'mother_postal_address', 'file_passport', 'file_toefl', 'file_transcript', 'file_financial', 'is_form_complete', 'file_admission_letter', 'file_ticket', 'file_visa', 'is_ticket_complete', 'file_payment', 'is_payment_complete', 'status', 'final_report', 'lecturer_id', 'lecturer_second_week_report', 'lecturer_mid_report', 'lecturer_final_report'
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

    public function lecturer()
    {
        return $this->belongsTo('App\Models\Lecturer');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }

    public function major()
    {
        return $this->belongsTo('App\Models\Major');
    }

    public function university_joint()
    {
        return $this->belongsTo('App\Models\UniversityJoint');
    }
}