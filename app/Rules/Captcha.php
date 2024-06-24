<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use GuzzleHttp\Client;

class Captcha implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Validación de reCAPTCHA usando Guzzle HTTP Client
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $value,
                'remoteip' => $_SERVER['REMOTE_ADDR']
            ]
        ]);

        // Decodificar la respuesta JSON
        $body = json_decode((string) $response->getBody());

        // Retorna true si la validación fue exitosa
        return $body->success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El reCAPTCHA no ha sido validado correctamente.';
    }
}
