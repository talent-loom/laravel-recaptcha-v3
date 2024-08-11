
![Logo](https://upload.wikimedia.org/wikipedia/commons/a/ad/RecaptchaLogo.svg)

**Laravel ReCAPTCHA V3** is a very simply-to-use Laravel 9.x | 10.x | 11.x package to embed Google reCAPTCHA in your application.
## What is reCAPTCHA?

Google offers reCAPTCHA v3 and reCAPTCHA Enterprise to help you protect your sites from fraudulent activities, spam, and abuse. To know more about the features of reCAPTCHA and reCAPTCHA Enterprise, [see Comparison of features between reCAPTCHA versions](https://cloud.google.com/recaptcha-enterprise/docs/compare-versions).

You can find further info at [Google reCAPTCHA Developer's Guide](https://developers.google.com/recaptcha/intro)

## reCAPTCHA available versions

At this moment there are 3 versions available (for web applications):

-   **v3**, the latest ([reCAPTCHA v3](https://developers.google.com/recaptcha/docs/v3))
-   **v2 checkbox** or simply reCAPTCHA v2 ([reCAPTCHA v2](https://developers.google.com/recaptcha/docs/display))
-   **v2 invisible** ([Invisible reCAPTCHA](https://developers.google.com/recaptcha/docs/invisible))

## Get your key first!

First of all you have to create your own API keys [here](https://www.google.com/recaptcha/admin)

Follow the instructions and at the end of the process you will find **Site key** and **Secret key**. Keep them close..you will need soon!

## System requirements

| Package version | reCaptcha version | PHP version      | Laravel version |
| --------------- | ----------------- | ---------------- | --------------- |
| v9.0.0          | v3                | 8.0.2 or greater | 9.x             |
| v10.0.0         | v3                | 8.1 or greater   | 10.x            |
| v11.0.0         | v3                | 8.2 or greater   | 11.x            |
## Composer

You can install the package via composer:

```sh
$ composer require talent-loom/laravel-recaptcha-v3
```
## Configuration for LARAVEL 11.x

Laravel 11.x registered providers in `bootstrap/providers.php`:

```php
    return [
        App\Providers\AppServiceProvider::class,
        TalentLoom\RecaptchaV3\RecaptchaV3ServiceProvider::class,
    ];
```

You can use the facade for shorter code. Add `ReCaptchaV3` to your aliases in `config/app.php`:

```php
return [
    ....
    'aliases' => Facade::defaultAliases()->merge([
        'ReCaptchaV3' => TalentLoom\RecaptchaV3\Facades\RecaptchaV3::class,
    ])->toArray(),
];
```
## Publish package

Create `config/recaptchaV3.php` configuration file using the following artisan command:

```sh
$ php artisan vendor:publish --provider="TalentLoom\RecaptchaV3\RecaptchaV3ServiceProvider"
```
## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`RECAPTCHA_V3_SITE_KEY`

`RECAPTCHA_V3_SECRET_KEY`

### Reload config cache file

> **!!! IMPORTANT !!!** Every time you change some configuration run the following shell command:

```sh
$ php artisan config:cache
```

## Implementation

### Add validation in request

```php
use TalentLoom\RecaptchaV3\Rules\RecaptchaV3Rule;

[
    ...
    'recaptcha_v3' => new RecaptchaV3Rule(),
];
```

### Embed in Blade

Insert `js()` script before closing `</head>` tag.

You can also use `ReCaptchaV3::js()`.

```blade
<!DOCTYPE html>
<html>
    <head>
        ...
        {!! ReCaptchaV3::js() !!}
    </head>
```

Now you can use `ReCaptchaV3::execute('action', 'form id')`.

like:

```blade
    <form action="..." method="POST" id="loginForm">
        @csrf
        ....
    </form>
```

```blade
        {!! ReCaptchaV3::execute('login-action', 'loginForm') !!}
        </body>
    </html>
```
## Running Tests

To run tests, run the following command

```bash
  ./vendor/bin/pest
```


## Authors

- [@shazeedul](https://www.github.com/shazeedul)
- [shazeedul.dev](https://shazeedul.dev)


## Support

For support, email syedshazeedul@gmail.


## License

[MIT](https://choosealicense.com/licenses/mit/)

