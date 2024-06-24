<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class FactureMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $url;
   

    /**
     * Create a new message instance.
     */
    public function __construct(Array $data)
    {
        $this->data = $data;
        $this->url = Storage::url('image/ccra.png');
        
       ;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->data['subject'] ,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'welcome',
            with:([
                        'subject' => $this->data['subject'],
                        'mailMessage' => $this->data['mailMessage'],
                        'href' => $this->data['href'],
                        'url'   =>$this->url,
                    ])
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
