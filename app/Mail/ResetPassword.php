<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /** @var string the address to send the email */
    protected $to_address;

    /** @var float the winnings they won */
    protected $verificationCode;

    public function __construct($to_address, $verificationCode)
    {
        $this->to_address = $to_address;
        $this->verificationCode = $verificationCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->to_address)
            ->subject('Your Verification Code!')
            ->view('emails.ResetPassword')
            ->with(
                [
                    'verificationCode' => $this->verificationCode
                ]
            );
    }

    
}
