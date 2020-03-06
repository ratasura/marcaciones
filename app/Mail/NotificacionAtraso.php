<?php

namespace App\Mail;

use App\Funcionario;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificacionAtraso extends Mailable
{
    use Queueable, SerializesModels;

    // variables para obtener lo que envia el constructor

    public $funcionario, $fecha, $texto;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Funcionario $funcionario, $fecha, $texto)
    {
        $this->funcionario = $funcionario;
        $this->fecha=$fecha;
        $this->texto=$texto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('correos.notificacion');
    }
}
