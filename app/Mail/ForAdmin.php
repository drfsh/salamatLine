<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $date;
    public $allView;
    public $buy;
    public $newUser;
    public $newProduct;
    public $newComment;
    public function __construct($allView,$buy,$newUser,$newProduct,$newComment)
    {
        $this->date = Verta()->format('Y/m/d'); ;
        $this->allView = $allView;
        $this->buy = $buy;
        $this->newUser = $newUser;
        $this->newProduct = $newProduct;
        $this->newComment = $newComment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.forAdmin')->subject("$this->date گزارش سلامت لاین ");
    }
}
