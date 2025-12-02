<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class AdminNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $notificacion;

    /**
     * Create a new message instance.
     */
    public function __construct($notificacion)
    {
        $this->notificacion = $notificacion;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->notificacion->Titulo_Notificacion,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $imagenBase64 = null;
        $mimeType = 'image/jpeg';

        if ($this->notificacion->imgen) {
            try {
                // Intentar acceder al archivo desde el storage
                if (Storage::disk('public')->exists($this->notificacion->imgen)) {
                    $contenido = Storage::disk('public')->get($this->notificacion->imgen);
                    $imagenBase64 = base64_encode($contenido);

                    // Detectar MIME type basado en extensión
                    $extension = strtolower(pathinfo($this->notificacion->imgen, PATHINFO_EXTENSION));
                    $mimeTypes = [
                        'jpg' => 'image/jpeg',
                        'jpeg' => 'image/jpeg',
                        'png' => 'image/png',
                        'gif' => 'image/gif',
                        'webp' => 'image/webp',
                    ];
                    $mimeType = $mimeTypes[$extension] ?? 'image/jpeg';
                }
            } catch (\Exception $e) {
                \Log::error('Error cargando imagen para correo: ' . $e->getMessage());
                $imagenBase64 = null;
            }
        }

        return new Content(
            view: 'emails.admin-notification',
            with: [
                'titulo' => $this->notificacion->Titulo_Notificacion,
                'mensaje' => $this->notificacion->Mensaje_Notificacion,
                'imagen' => $this->notificacion->imgen,
                'imagenBase64' => $imagenBase64,
                'mimeType' => $imagenBase64 ? $mimeType : null,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        if ($this->notificacion->imgen && Storage::disk('public')->exists($this->notificacion->imgen)) {
            try {
                $ruta = Storage::disk('public')->path($this->notificacion->imgen);
                $nombreArchivo = basename($this->notificacion->imgen);

                // Adjuntar la imagen como inline (CID) para que se vea dentro del correo
                $attachments[] = Attachment::fromPath($ruta)
                    ->as($nombreArchivo)
                    ->withMime($this->detectMimeType($this->notificacion->imgen));
            } catch (\Exception $e) {
                \Log::error('Error adjuntando imagen al correo: ' . $e->getMessage());
            }
        }

        return $attachments;
    }

    /**
     * Detectar MIME type basado en la extensión
     */
    private function detectMimeType($ruta): string
    {
        $extension = strtolower(pathinfo($ruta, PATHINFO_EXTENSION));
        $mimeTypes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
        ];
        return $mimeTypes[$extension] ?? 'image/jpeg';
    }
}
