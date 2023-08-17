# Prestashop Config
Ever dreamed of a Laravel-like config folder for your PrestaShop module where you can put you module's static configs? Well this package has got you covered!

## Installation

1. Install the package
```bash
composer require dartmoon/prestashop-config
```

2. Create a folder named `config` in the root of your module.

## Usage

You can now organize your configs inside the `config` folder of your module as follows.

E.g. Let's create a config file named `ftp.config` inside the `config` folder with the following content.

```php
<?php 

return [
    'host' => 'localhost',
    'port' => 21,
    'user' => 'pippo'
    'password' => 'pluto'
];
```

Inside your module you can retrieve the config values as follows

```php
use Dartmoon\Config\Facades\Config;

// Without a default value
$host = Config::get('ftp.host');

// Using a default value
$port = Config::get('ftp.port', 21);
```

## License

This project is licensed under the MIT License - see the LICENSE.md file for details