# Laravel 5 SendPush Package
======
A Laravel 5 package for Android and iOS push notification service from http://notify.mobytesac.com.

**Please if you found any bug or you have any enhancement, You're so welcomed to open an Issue or make a pull request.

#### Content
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Commands](#commands)
- [License](#license)

----------


#### Installation

```bash
composer require mobytes/laravel-sendpush
```


Once mobytes/laravel-sendpush is installed, you need to register the Service Provider. To do that open `app/config/app.php` and add the following to the `providers` key.

```php
Mobytes\SendPush\SendPushServiceProvider::class,
```

Next you add this facade to `app/config/app.php`

```php
'SendPush' => Mobytes\SendPush\Facades\SendPush::class,
```

To use this in your L5 application:

```php
use Mobytes\SendPush\Facades\SendPush;
```

----------


#### Configuration

Create `app/config/sendpush.php`  and fill it with your Token and the User Key from http://notify.mobytesac.com/

```php
return [
    'token_user' => 'User Token key',
    'token_app' => 'App Token key',
];
```

----------

#### Usage
Now you can use the package like that:

To Set a message (**Required**)
```php
SendPush::push($title, $message);
```
To Send the Message (**Required**)
```php
SendPush::send();
```
All other information will be found in details here https://notify.mobytesac.com/api


----------
#### Commands

In the version 1.2.0 and above it supports the Artisan Commands but first make sure that you've done the [Configuration](#configuration) correctly.

You can run

    php artisan list
and you'll find

    sendpush
    sendpush:send               SendPush Command

To send a pushover message you'll be able to use it like this way ( **Title and Message are Required** )

    php artisan sendpush:send YourTitle YourMessage
to turn on the debug mode just add

----------


#### License

Copyright (c) 2015 [Dyaa Eldin Moustafa][1] Licensed under the [MIT license][2].


  [1]: https://dyaa.me/
  [2]: https://github.com/dyaa/Laravel-pushover/blob/master/LICENSE
