<?php

namespace Shazeedul\RecaptchaV3\Rules;

use Illuminate\Contracts\Validation\Rule;
use Shazeedul\RecaptchaV3\Facades\RecaptchaV3;

class RecaptchaV3Rule
{
    public function __invoke($attribute, $value, $fail)
    {
        $response = RecaptchaV3::validate($value);
        if (!$response['success'] || $response['score'] < 0.5) { // Customize score threshold as needed
            $fail('The reCAPTCHA verification failed.');
        }
    }
}
