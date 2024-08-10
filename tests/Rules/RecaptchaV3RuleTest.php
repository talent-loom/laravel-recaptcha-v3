<?php

use Illuminate\Support\Facades\Facade;
use TalentLoom\LaravelRecaptchaV3\Facades\RecaptchaV3;
use TalentLoom\LaravelRecaptchaV3\Rules\RecaptchaV3Rule;

beforeEach(function () {
    // Clear any resolved instances of facades
    Facade::clearResolvedInstance('recaptchaV3');
});

it('initializes rule instanceOf', function () {
    $rule = new RecaptchaV3Rule();

    expect($rule)->toBeInstanceOf(RecaptchaV3Rule::class);
});

it('validates recaptcha token successfully', function () {
    // Mock the RecaptchaV3 facade
    // Facade::clearResolvedInstance('recaptchaV3');
    RecaptchaV3::shouldReceive('validate')
        ->once()
        ->with('valid-token')
        ->andReturn([
            'success' => true,
            'score' => 0.9, // Score above the threshold
        ]);

    $rule = new RecaptchaV3Rule();

    // Test the 'passes' method
    $result = $rule->passes('recaptcha_v3', 'valid-token');

    expect($result)->toBeTrue();
});

it('fails recaptcha validation due to low score', function () {
    // Mock the RecaptchaV3 facade
    // Facade::clearResolvedInstance('recaptchaV3');
    RecaptchaV3::shouldReceive('validate')
        ->once()
        ->with('low-score-token')
        ->andReturn([
            'success' => true,
            'score' => 0.3, // Score below the threshold
        ]);

    $rule = new RecaptchaV3Rule();

    // Test the 'passes' method
    $result = $rule->passes('recaptcha_v3', 'low-score-token');

    expect($result)->toBeFalse();
});

it('fails recaptcha validation due to verification failure', function () {
    // Mock the RecaptchaV3 facade
    // Facade::clearResolvedInstance('recaptchaV3');
    RecaptchaV3::shouldReceive('validate')
        ->once()
        ->with('invalid-token')
        ->andReturn([
            'success' => false,
            'score' => 0.0,
        ]);

    $rule = new RecaptchaV3Rule();

    // Test the 'passes' method
    $result = $rule->passes('recaptcha_v3', 'invalid-token');

    expect($result)->toBeFalse();
});
