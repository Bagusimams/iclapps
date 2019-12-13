<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

use App\Models\Student;

class PerScheduleChange extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance. 
     *
     * @return void
     */

    public $student;

    public function __construct(Student $student)
    {
        $this->student = $student;

        // $time = Carbon::createFromFormat('H:i:s', date('H:i:s'));

        // $this->user->url = "http://potensiana.com/confirmEmail/" . Crypt::encryptString($this->user->id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('[ICAO] Permanent Schedule Application')->view('email.per-schedule-change');
    }
}
