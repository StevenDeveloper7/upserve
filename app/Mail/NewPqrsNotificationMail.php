<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Pqrs; // Importa tu modelo PQRS

class NewPqrsNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pqrs; // Para pasar la información de la PQRS a la vista del correo

    public function __construct(Pqrs $pqrs)
    {
        $this->pqrs = $pqrs;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva PQRS Recibida: ' . $this->pqrs->asunto,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.pqrs.admin_notification', // Apunta a la vista Blade creada
        );
    }

    public function attachments(): array
    {
        return [];
    }
}