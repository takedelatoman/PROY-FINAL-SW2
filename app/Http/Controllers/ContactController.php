<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator; // Importa Validator desde el namespace correcto
use App\Mail\ContactMail;
use App\Rules\Captcha; // Importa la regla de validación personalizada Captcha

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        // Validación de campos, incluyendo reCAPTCHA
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'g-recaptcha-response' => ['required', new Captcha], // Usa la regla de validación personalizada Captcha
        ]);

        // Enviar correo
        Mail::to('destination@example.com')->send(new ContactMail($validatedData));

        // Mensaje de éxito
        return redirect()->route('contact.show')->with('success', 'Mensaje enviado con éxito');
    }
}
