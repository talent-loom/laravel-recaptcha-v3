<?php

declare(strict_types=1);

namespace TalentLoom\RecaptchaV3\Test;

use TalentLoom\ReCaptchaV3\Providers\RecaptchaV3ServiceProvider;
use Tests\TestCase;

class PackageTestCase extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            RecaptchaV3ServiceProvider::class,
        ];
    }
}
