<?php

namespace App\Jobs;

use App\Mail\VerificacionEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $codigo;
    protected $mensaje;
    protected $destinatario;

    public function __construct($codigo, $mensaje, $destinatario)
    {
        $this->codigo = $codigo;
        $this->mensaje = $mensaje;
        $this->destinatario = $destinatario;
    }

    public function handle()
    {
        try {
            Mail::to($this->destinatario)->send(new VerificacionEmail($this->codigo, $this->mensaje));
        } catch (\Exception $e) {
            error_log('Error al enviar el correo: ' . $e->getMessage());
        }
    }
}
