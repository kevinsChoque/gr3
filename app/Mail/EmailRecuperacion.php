<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailRecuperacion extends Mailable
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
            subject: 'CORREO DE RECUPERACION DE CONTRASEÑA',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.proveedor.recuperacion',
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
        return $this->view('emails.proveedor.recuperacion')
                ->subject('Asunto del Correo');
    }

}
