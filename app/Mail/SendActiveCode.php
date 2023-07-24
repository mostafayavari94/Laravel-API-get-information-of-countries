<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendActiveCode extends Mailable implements ShouldQueue
{
    public $tries = 5;

    use Queueable, SerializesModels;

    private $token;
    private $cfrom;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $token, String $from)
    {
        $this->token = $token;
        $this->cfrom = $from;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address($this->cfrom, env('MAIL_FROM_NAME')),
            subject: 'Send Active Code',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'mail.send-active-code',
            with: [
                'token' => $this->token,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }

    public function getToken()
    {
        return $this->token;
    }
}
