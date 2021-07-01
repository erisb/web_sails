<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class demoEmail extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $nama;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Password Reset')
                    ->view('auth.mailText');
    }
}
