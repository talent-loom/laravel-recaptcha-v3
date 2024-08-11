<?php

use Orchestra\Testbench\TestCase;
use TalentLoom\LaravelRecaptchaV3\RecaptchaV3;
use TalentLoom\LaravelRecaptchaV3\Providers\RecaptchaV3ServiceProvider;

// Use the TestCase class provided by Orchestra Testbench
uses(TestCase::class)
    // Register the service provider for the test
    ->beforeEach(function () {
        $this->app->register(RecaptchaV3ServiceProvider::class);
    })
    ->in(__DIR__);

// Define the test case
test('it registers the recaptcha v3 binding in the service container', function () {
    // Resolve the RecaptchaV3 class from the service container
    $recaptcha = app('recaptchaV3');

    // Assert that the instance is of the correct type
    expect($recaptcha)->toBeInstanceOf(RecaptchaV3::class);
});
