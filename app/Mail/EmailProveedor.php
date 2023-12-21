<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailProveedor extends Mailable
{
    use Queueable, SerializesModels;
    public $datosProveedor;

    /**
     * Create a new message instance.
     */
    public function __construct($datosProveedor)
    {
        $this->datosProveedor = $datosProveedor;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Email Proveedor',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.proveedor.credenciales',
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
    public function build()
    {
        // return $this->view('view.name');
        return $this->view('emails.proveedor.credenciales')
                ->subject('Asunto del Correo');
    }

}
