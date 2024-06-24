<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator; // Importa el facade Validator
use GuzzleHttp\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Extiende la validación con Validator::extend()
        Validator::extend('recaptcha', function ($attribute, $value, $parameters, $validator) {
            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret' => env('RECAPTCHA_SECRET_KEY'),
                    'response' => $value,
                    'remoteip' => $_SERVER['REMOTE_ADDR']
                ]
            ]);

            $body = json_decode((string) $response->getBody());
            return $body->success;
        });
    }
}
