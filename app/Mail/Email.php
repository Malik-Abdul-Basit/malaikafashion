<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mail',$this->data)
            ->from($this->data['SenderEmail'], $this->data['SenderName'])
            ->cc($this->data['MailAttach'], $this->data['MailAttachName'])
            ->replyTo($this->data['SenderEmail'], $this->data['SenderName'])
            ->subject($this->data['MailSubject'])
            ->to($this->data['ToEmail']);
    }
}
