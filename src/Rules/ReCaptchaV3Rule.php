<?php

namespace Shazeedul\ReCaptchaV3\Src\Rules;

use Illuminate\Validation\Rule;
use Shazeedul\ReCaptchaV3\Facades\ReCaptchaV3;

class ReCaptchaV3Rule implements Rule
{
    public function passes($attribute, $value)
    {
        $response = ReCaptchaV3::validate($value);
        return $response['success'] && $response['score'] >= 0.5; // Customize score threshold as needed
    }

    public function message()
    {
        return 'The reCAPTCHA verification failed.';
    }
}
