# Laravl Extra Collection

[![Latest Version on Packagist](https://img.shields.io/packagist/v/emrul1875/laravel-extra-collection.svg?style=flat-square)](https://packagist.org/packages/emrul1875/laravel-extra-collection)
<!-- 
[![Total Downloads](https://img.shields.io/packagist/dt/emrul1875/laravel-extra-collection.svg?style=flat-square)](https://packagist.org/packages/emrul1875/laravel-extra-collection) -->
This is a package of Laravel Collection which can be used with laravel existing collection. You are welcome to give new idea or contribute in repository. Let's make our lives much more easier.

## Installation

You can install the package via composer:

```bash
composer require emrul1875/laravel-extra-collection
```

## Usage

The package is auto-discovered!

Add the service provider to `config/app.php`

```php
// Usage description here
Emrul1875\LaravelExtraCollection\LaravelExtraCollectionServiceProvider::class
```

### Collections

prependValue

```php
<?php

$collection = collect([
    [
        'name' => 'John',
        'balance' => 100,
        'image' => '/uploads/image54543534.png'
    ],
    [
        'name' => 'Jonny',
        'balance' => 200
        'image' => '/uploads/image54543534.png'
    ]
]);

$updatedCollection = $collection->prependValue(["balance" => "USD ", "image": "https://dummyurl.com"]);

/*
     [
        'name' => 'John',
        'balance' => "USD 100",
        'image' => 'https://dummyurl.com/uploads/image54543534.png'
    ],
    [
        'name' => 'Jonny',
        'balance' => "USD 200",
        'image' => 'https://dummyurl.com/uploads/image54543534.png'
    ]
*/

```
### MIT