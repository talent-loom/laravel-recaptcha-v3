<?php

namespace Shazeedul\RecaptchaV3\Facades;

use Illuminate\Support\Facades\Facade;

class RecaptchaV3 extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'recaptchaV3';
    }
}
