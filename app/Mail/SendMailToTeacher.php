<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailToTeacher extends Mailable
{
    use Queueable, SerializesModels;

    public $studentName;
    public $studentGrade;
    public $currentClass;
    public $newClass;
    public $effectiveDate;
    public $teacherName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($studentName, $studentGrade, $currentClass, $newClass, $effectiveDate, $teacherName)
    {
        //Assign Values
        $this->studentName = $studentName;
        $this->studentGrade = $studentGrade;
        $this->currentClass = $currentClass;
        $this->newClass = $newClass;
        $this->effectiveDate = $effectiveDate;
        $this->teacherName = $teacherName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.send')
                    ->subject('Notification of Student Class Change')
                    ->with([
                        'studentName' => $this->studentName,
                        'studentGrade' =>$this->studentGrade,
                        'currentClass' => $this->currentClass,
                        'newClass' => $this->newClass,
                        'effectiveDate' => $this->effectiveDate,
                        'teacherName' => $this->teacherName,
                    ]);
    }
}
