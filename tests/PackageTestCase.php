<?php

declare(strict_types=1);

namespace Shazeedul\RecaptchaV3\Test;

use Shazeedul\ReCaptchaV3\Providers\RecaptchaV3ServiceProvider;
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
