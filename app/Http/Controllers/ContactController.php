<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function crear(){
		//Visualiza el formulario para enviar mensajes
        return view('estaticos.contacto');
    }

    public function guardar(Request $request){
		//Crea y envía el mensaje
		$messages = [
			'nombre.required' => 'El campo nombre es obligatorio',
			'email.required'  => 'El campo email es obligatorio',
			'mensaje.required'  => 'El campo mensaje es obligatorio'
		];
		
		$request->validate([
			'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
			'mensaje' => 'required',
		], $messages);
		
		$contacto = [];
		$contacto['nombre'] = $request->get('nombre');
		$contacto['email'] = $request->get('email');
		$contacto['mensaje'] = $request->get('mensaje');
		
		Mail::to($contacto['email'])->send(new ContactEmail($contacto));
		
		return redirect()->route('contacto.crear')->with('success', 'El mensaje ha sido enviado');;
    }
}
