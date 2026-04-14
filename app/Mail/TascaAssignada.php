<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TascaAssignada extends Mailable
{
    use Queueable, SerializesModels;

    public $alumne;
    public $tasca;

    public function __construct($alumne, $tasca)
    {
        $this->alumne = $alumne;
        $this->tasca = $tasca;
    }

    public function build()
    {
        return $this->subject("Nova Tasca Assignada")
                    ->view('emails.tasca_assignada');
    }
}