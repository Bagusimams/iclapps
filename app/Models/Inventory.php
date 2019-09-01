<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'showOnInvBookingMenu', 'isBooked', 'isConditionGood'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $dates =[
        'deleted_at',
    ];

    public function isAvailable()
    {
        if($this->showOnInvBookingMenu == 0)
        {
            return 'No';
        }
        else
        {
            if($this->isBooked == 0)
            {
                return 'No';
            }
            else
            {
                return 'Yes';
            }
        }
    }

    public function getCondition()
    {
        return $this->isConditionGood == 0 ? 'Bad' : 'Good';
    }
}