<?php

use TalentLoom\LaravelRecaptchaV3\Facades\RecaptchaV3;

it('initializes facade instanceOf', function () {
    $recaptcha = new RecaptchaV3();

    expect($recaptcha)->toBeInstanceOf(RecaptchaV3::class);
});
