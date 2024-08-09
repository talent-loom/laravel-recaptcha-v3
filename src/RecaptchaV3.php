<?php

namespace Shazeedul\RecaptchaV3;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class RecaptchaV3
{
    protected $secretKey;

    public function __construct()
    {
        $this->secretKey = Config::get('recaptchaV3.secret_key');
    }

    public function validate($token, $ip = null)
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $this->secretKey,
            'response' => $token,
            'remoteip' => $ip,
        ]);

        return $response->json();
    }
}
