<?php

namespace Shazeedul\RecaptchaV3\Src\Rules;

use Illuminate\Validation\Rule;
use Shazeedul\RecaptchaV3\Facades\RecaptchaV3;

class RecaptchaV3Rule implements Rule
{
    public function passes($attribute, $value)
    {
        $response = RecaptchaV3::validate($value);
        return $response['success'] && $response['score'] >= 0.5; // Customize score threshold as needed
    }

    public function message()
    {
        return 'The reCAPTCHA verification failed.';
    }
}
