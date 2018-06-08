# Ding Error Notifier

## Requirements
- PHP 7.0+
- Laravel 5.5+

# Installation

1. Install the package by running this command in your terminal/cmd:
```bash
composer require lidelin/ding-error-notifier
```

2. Because we use the [ding-notice](https://github.com/wowiwj/ding-notice), so we should configure ding-notice
```bash
php artisan vendor:publish --provider="DingNotice\DingNoticeServiceProvider"
``` 

3. add below configs in app/ding.php
```php
return [
    ...

    'error-notifier' => [
        'enabled' => env('DING_ERROR_NOTIFIER_ENABLED', true),

        'token' => env('DING_ERROR_NOTIFIER_DING_TOKEN', ''),

        'timeout' => env('DING_ERROR_NOTIFIER_DING_TIME_OUT', 2.0)
    ],
];
```
