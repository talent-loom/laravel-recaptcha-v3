<?php

use Illuminate\Support\Facades\Config;
use TalentLoom\LaravelRecaptchaV3\RecaptchaV3;

it('initializes RecaptchaV3 with default config', function () {
    Config::shouldReceive('get')
        ->with('recaptchaV3.site_key')
        ->andReturn('test-site-key');

    Config::shouldReceive('get')
        ->with('recaptchaV3.secret_key')
        ->andReturn('test-secret-key');

    $recaptcha = new RecaptchaV3();

    expect($recaptcha)->toBeInstanceOf(RecaptchaV3::class);
});
