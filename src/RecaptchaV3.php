<?php

namespace Shazeedul\RecaptchaV3;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class RecaptchaV3
{
    protected $siteKey;
    protected $secretKey;

    public function __construct()
    {
        $this->siteKey = Config::get('recaptchaV3.site_key');
        $this->secretKey = Config::get('recaptchaV3.secret_key');
    }

    public function validate($token, $ip = null)
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $this->secretKey,
            'response' => $token,
            'remoteip' => $ip,
        ]);

        return $response->json();
    }

    public function js()
    {
        if (!$this->siteKey) {
            return '';
        }
        return <<<HTML
            <script src="https://www.google.com/recaptcha/api.js?render={$this->siteKey}"></script>
        HTML;
    }

    public function execute($action = '', $formId = '')
    {
        if (!$this->siteKey) {
            return '';
        }
        return <<<HTML
            <script type="text/javascript">
                document.getElementById('$formId').addEventListener('submit', function(event) {
                    event.preventDefault();
                    grecaptcha.ready(function() {
                        grecaptcha.execute('{$this->siteKey}', {action: '$action'}).then(function(token) {
                            var recaptchaResponse = document.createElement('input');
                            recaptchaResponse.type = 'hidden';
                            recaptchaResponse.name = 'recaptcha_v3';
                            recaptchaResponse.value = token;
                            document.getElementById('$formId').prepend(recaptchaResponse);
                            document.getElementById('$formId').submit();
                        });
                    });
                });
            </script>
        HTML;
    }
}
