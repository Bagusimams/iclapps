<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WinterSchoolPre extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'lecturer_id', 'winter_school_id', 'pic', 'ensure', 'confirm', 'escort', 'reintroduce', 'meet', 'make', 'monitor', 'remind'
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

    public function winter_school()
    {
        return $this->belongsTo('App\Models\WinterSchool');
    }
}