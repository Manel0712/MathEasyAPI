<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Qualificacio extends Mailable
{
    use Queueable, SerializesModels;

    public $professor;
    public $tasca;

    public function __construct($professor, $tasca)
    {
        $this->professor = $professor;
        $this->tasca = $tasca;
    }

    public function build()
    {
        return $this->subject($this->professor->Nom . " ha donat retroacció per a la tasca\n" . $this->tasca->Nom)
                    ->view('emails.qualificacio');
    }
}