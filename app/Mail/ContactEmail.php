<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
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
        //dd($this->data['UserMessage']);

        return $this->view('emails.contact_mail',$this->data)
            ->from($this->data['SiteEmail'], $this->data['SiteName'])
            //->cc($this->data['MailAttach'], $this->data['MailAttachName'])
            ->replyTo($this->data['SenderEmail'], $this->data['SenderName'])
            ->subject($this->data['MailSubject'])
            ->to($this->data['ToEmail']);
    }

}
