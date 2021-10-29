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

`prependValue`

```php
<?php
The `prependValue()` method receive 3 parameter. First 2 parameter is mandatory and 3rd parameter is optional. First parameter receive an array or string. If your collection is sequential array you can pass string as a first parameter otherwise pass an array. The array should contain key and value pair where key will be the property name of collection which should be changed and value should be the text that needs to prepend with value. You can pass true or false in thrid parameter. By default it is false. If you pass true it will skip all property which has null value. 

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

$updatedCollection = $collection->prependValue(["balance" => "USD ", "image": "https://dummyurl.com"], true);

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


`appendValue`

The `appendValue()` method receive 3 parameter. First 2 parameter is mandatory and 3rd parameter is optional. First parameter receive an array or string. If your collection is sequential array you can pass string as a first parameter otherwise pass an array. The array should contain key and value pair where key will be the property name of collection which should be changed and value should be the text value that needs to append with value. You can pass true or false in thrid parameter. By default it is false. If you pass true it will skip all property which has null value. 

```php
<?php

$collection = collect([
    [
        'name' => 'John',
        'currency' => 'FCFA',
        'balance' => 100,
    ],
    [
        'name' => 'Jonny',
        'currency' => 'FCFA',
        'balance' => 400
    ]
]);

$updatedCollection = $collection->appendValue(["balance" => " FCFA"]);

/*
    [
        'name' => 'John',
        'currency' => 'FCFA',
        'balance' => '100 FCFA',
    ],
    [
        'name' => 'Jonny',
        'currency' => 'FCFA',
        'balance' => '400 FCFA'
    ]
*/

```

`concatValue`

The `concatValue()` method receive 3 parameter. First 2 parameter is mandatory and 3rd parameter is optional. First parameter receive new property name that should be added in the collection. Second parameter receives array of field name which exist in collection. Third parameter receives delimiter (commad ',' or space ' '). 

```php
<?php

$collection = collect([
    [
        'title' => 'Mr.'
        'firstname' => 'John',
        'lastname' => 'Doe'
    ],
    [
        'title' => 'Mr.'
        'firstname' => 'Johny',
        'lastname' => 'Doe'
    ]
]);

$updatedCollection = $collection->concatValue("fullname", ["title", "firstname", "lastname"], " ");

/*
    [
        'title' => 'Mr.'
        'firstname' => 'John',
        'lastname' => 'Doe',
        'fullname' => 'Mr. John Doe'
    ],
    [
        'title' => 'Mr.'
        'firstname' => 'Johny',
        'lastname' => 'Doe',
        'fullname' => 'Mr. Johny Doe'
    ]
*/

```
### MIT