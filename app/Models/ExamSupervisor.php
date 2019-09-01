<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamSupervisor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'role', 'role_id', 'name', 'nim', 'batch_year', 'phone_number', 'email', 'english_score', 'type', 'certificate_file', 'status'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $dates =[
        'deleted_at',
    ];

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
        }
    }

    public function role()
    {
        if($this->role == 'Student')
        {
            return Student::find($this->role_id);
        }
    }
}