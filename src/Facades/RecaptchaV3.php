<?php

namespace TalentLoom\LaravelRecaptchaV3\Facades;

use Illuminate\Support\Facades\Facade;

class RecaptchaV3 extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'recaptchaV3';
    }

    public static function js()
    {
        return app('recaptchaV3')->js();
    }

    public static function execute($action, $formId)
    {
        return app('recaptchaV3')->execute($action, $formId);
    }
}
