<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $replyMessage;
    public $originalMessage;

    public function __construct($name, $replyMessage, $originalMessage)
    {
        $this->name = $name;
        $this->replyMessage = $replyMessage;
        $this->originalMessage = $originalMessage;
    }

    public function build()
    {
        return $this->subject('Reply to Your Contact')
                    ->view('admin.contact_mail_template')
                    ->with([
                        'name' => $this->name,
                        'replyMessage' => $this->replyMessage,
                        'originalMessage' => $this->originalMessage,
                    ]);
    }
}
