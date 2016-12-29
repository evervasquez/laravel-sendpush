Laravel 5 SendPush.net Package
======
[![Build Status](https://travis-ci.org/dyaa/Laravel-pushover.svg?branch=v1.4.0)](https://travis-ci.org/dyaa/Laravel-pushover) [![Latest Stable Version](https://poser.pugx.org/dyaa/pushover/v/stable.png)](https://packagist.org/packages/dyaa/pushover) [![Total Downloads](https://poser.pugx.org/dyaa/pushover/downloads.png)](https://packagist.org/packages/dyaa/pushover) [![Latest Unstable Version](https://poser.pugx.org/dyaa/pushover/v/unstable.png)](https://packagist.org/packages/dyaa/pushover) [![Dependency Status](https://www.versioneye.com/user/projects/5303cf06ec1375065e000003/badge.png)](https://www.versioneye.com/user/projects/5303cf06ec1375065e000003)  [![License](https://poser.pugx.org/dyaa/pushover/license.png)](https://packagist.org/packages/dyaa/pushover)

A Laravel 5 package for Android and iOS push notification service from https://pushover.net/.

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
composer require dyaa/pushover:dev-master
```



Once dyaa/pushover is installed, you need to register the Service Provider. To do that open `app/config/app.php` and add the following to the `providers` key.

```php
'Dyaa\Pushover\PushoverServiceProvider',
```

Next you add this facade to `app/config/app.php`

```php
'Dyaa\Pushover\Facades\Pushover',
```

To use this in your L5 application:

```php
use Dyaa\Pushover\Facades\Pushover;
```

----------


#### Configuration

Create `app/config/pushover.php`  and fill it with your Token and the User Key from https://pushover.net/

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
Pushover::send();
```
All other information will be found in details here https://notify.mobytesac.com/api


----------
#### Commands

In the version 1.2.0 and above it supports the Artisan Commands but first make sure that you've done the [Configuration](#configuration) correctly.

You can run

    php artisan list
and you'll find

    pushover
    pushover:send               Pushover Command

To send a pushover message you'll be able to use it like this way ( **Title and Message are Required** )

    php artisan pushover:send YourTitle YourMessage
to turn on the debug mode just add

----------


#### License

Copyright (c) 2015 [Dyaa Eldin Moustafa][1] Licensed under the [MIT license][2].


  [1]: https://dyaa.me/
  [2]: https://github.com/dyaa/Laravel-pushover/blob/master/LICENSE
