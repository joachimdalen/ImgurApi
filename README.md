# ImgurApi

Laravel wrapper around the Imgur api.

## Contents

- [Installation](#installation)
- [Configuration](#configuration)

## Installation

1. In order to install, just add the following to your composer.json. Then run `composer update`:

```json
"joachimdalen/imgur-api": "1.0.0"
```

2. Open your `config/app.php` and add the following to the `providers` array:

```php
JoachimDalen\ImgurApi\ImgurApiServiceProvider::class,
```

3. In the same `config/app.php` add the following to the `aliases` array:

```php
'ImgurApi'   => JoachimDalen\ImgurApi\Facades\ImgurApi::class,
```

4. Run the command below to publish the package config file `config/imgur.php`:

```shell
php artisan vendor:publish
```
## Configuration
Follow the instruction on creating an [Imgur Application](https://apidocs.imgur.com/) and fill in your `client_id` and `client_secret` in `config/imgur.php`