<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpSendMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    var $attributes;

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $attributes =  $this->attributes;

        return $this->to($this->attributes['email'])
            ->subject('ZEDEO - OTP LOGIN')
            ->view('emails.otp',
                compact('attributes'));

    }
}
