<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Tramesa extends Mailable
{
    use Queueable, SerializesModels;

    public $tasca;

    public function __construct($tasca)
    {
        $this->tasca = $tasca;
    }

    public function build()
    {
        return $this->subject("Tramesa realitzada")
                    ->view('emails.tramesa');
    }
}