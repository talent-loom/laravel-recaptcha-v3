<?php

namespace TalentLoom\LaravelRecaptchaV3\Tests\Providers;

use Orchestra\Testbench\TestCase;
use TalentLoom\LaravelRecaptchaV3\RecaptchaV3;
use TalentLoom\LaravelRecaptchaV3\Providers\RecaptchaV3ServiceProvider;

class RecaptchaV3ServiceProviderTest extends TestCase
{
    /**
     * Register the service provider for the test.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            RecaptchaV3ServiceProvider::class,
        ];
    }

    /** @test */
    public function it_registers_the_recaptcha_v3_binding_in_the_service_container()
    {
        // Resolve the RecaptchaV3 class from the service container
        $recaptcha = $this->app->make('recaptchaV3');

        // Assert that the instance is of the correct type
        $this->assertInstanceOf(RecaptchaV3::class, $recaptcha);
    }
}
