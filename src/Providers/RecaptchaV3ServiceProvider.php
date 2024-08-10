<?php

namespace TalentLoom\RecaptchaV3\Providers;

use Illuminate\Support\ServiceProvider;
use TalentLoom\RecaptchaV3\RecaptchaV3;

class RecaptchaV3ServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('recaptchaV3', function ($app) {
            return new RecaptchaV3();
        });

        $this->mergeConfigFrom(
            __DIR__ . '/../Config/recaptchaV3.php',
            'recaptchaV3'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../Config/recaptchaV3.php' => config_path('recaptchaV3.php'),
        ]);
    }
}
