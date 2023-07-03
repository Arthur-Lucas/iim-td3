# iim-td3

[![Last version](https://img.shields.io/packagist/v/alucas/iim-td3?maxAge=3600)](https://packagist.org/packages/alucas/iim-td3)

## Installation

```bash
composer require alucas/iim-td3
```

```bash
composer install
```

## How to use ? 

```php

use Alucas\td3\Scrapper;

// Initialize the scrapper
$scrapper = new Scrapper();

// get all characters (pagination, 60 per array)
$clones = $scrapper->getAllcharacters();

```

## Architercture :

```php
Class Clone :
    - name: string
    - description: string
    - imageLink: string

```

## Local test & linters :

```bash
php vendor/bin/phpstan analyse src --level=max
```

```bash
php vendor/bin/php-cs-fixer fix src --rules=@PSR12
```

```bash
php vendor/bin/phpunit tests
```