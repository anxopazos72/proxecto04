<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;
	 
	public $contacto;
	 
    public function __construct($contacto)
    {
        $this->contacto = $contacto;
    }

    public function build()
    {
        return $this
		->from('barciela@archicompostela.org', 'Parroquia de Barciela-Sigüeiro')
        ->to('barciela@archicompostela.org', 'Parroquia de Barciela-Sigüeiro')
        ->subject('Contacto desde Blog parroquial')
        ->view('estaticos.mail');
    }
}
