
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Simple package to get and logged last login activity/activities

[![Latest Version on Packagist](https://img.shields.io/packagist/v/irius-digital/last-login-activity.svg?style=flat-square)](https://packagist.org/packages/irius-digital/last-login-activity)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/irius-digital/last-login-activity/run-tests?label=tests)](https://github.com/irius-digital/last-login-activity/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/irius-digital/last-login-activity/Check%20&%20fix%20styling?label=code%20style)](https://github.com/irius-digital/last-login-activity/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/irius-digital/last-login-activity.svg?style=flat-square)](https://packagist.org/packages/irius-digital/last-login-activity)

Simple package where you can save user login activity (my first time to create a package) apologies.

## Installation

You can install the package via composer:

```bash
composer require irius-digital/last-login-activity
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="last-login-activity-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="last-login-activity-config"
```

This is the contents of the published config file:

```php
return [
    'save_last_login' => [
        'enabled' => env('SAVE_LAST_LOGIN', true),
    ],
];
```

## Usage
Add this to your EventServiceProvider.php
```php
use Illuminate\Auth\Events\Login;
use IriusDigital\LastLoginActivity\Events\LastActivityEvent;


protected $listen = [
        Login::class => [
            LastActivityEvent::class,
        ],
    ];
```

Add to your user model
```php
use IriusDigital\LastLoginActivity\Traits\LoginActivities;

class User extends Authenticatable
{
    ...
    use LoginActivities;
    
```

Then you can access your user model with
```php
    $user->latestLoggedIp
    
    $user->loginActivities
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Aron Quiray](https://github.com/irius-digital)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
