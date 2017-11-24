# ShapeGen (Shape Generator)

Generates 2D shapes (circles, ellipses, diamonds, squares, rectangles, triangles) in different sizes.

## Requirements

PHP 7.0 and later.

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
$ composer require dimitrievski/shapegen
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
<?php

require __DIR__ . '/vendor/autoload.php';
```

## Getting Started

Simple usage looks like:

```php
<?php

$shapeGen = new \ShapeGen\ShapeGen();
echo $shapeGen->generate("diamond");
//    X
//  XXXXX
//XXXXXXXXX
//  XXXXX
//    X
```

To generate a shape with different size, pass an additional argument - number of lines.
This argument must be an odd number between 5 and 49. The default is 5.

```php
<?php

$shapeGen = new \ShapeGen\ShapeGen();
echo $shapeGen->generate("diamond", 9);
//        X
//      XXXXX
//    XXXXXXXXX
//  XXXXXXXXXXXXX
//XXXXXXXXXXXXXXXXX
//  XXXXXXXXXXXXX
//    XXXXXXXXX
//      XXXXX
//        X
```

To generate a shape with different filling, pass one more argument - filling character.
This argument must be a string. The default is X.

```php
<?php

$shapeGen = new \ShapeGen\ShapeGen();
echo $shapeGen->generate("diamond", 9, "D");
//        D
//      DDDDD
//    DDDDDDDDD
//  DDDDDDDDDDDDD
//DDDDDDDDDDDDDDDDD
//  DDDDDDDDDDDDD
//    DDDDDDDDD
//      DDDDD
//        D
```

To create new shapes, use the shape factory like:

```php
<?php

$shapeFactory = new \ShapeGen\ShapeFactory();
$diamond = $shapeFactory->create("diamond");

//set different size and filling
$diamond->setLines(15);
$diamond->setFilling("-");

echo $diamond->generate();
//              -
//            -----
//          ---------
//        -------------
//      -----------------
//    ---------------------
//  -------------------------
//-----------------------------
//  -------------------------
//    ---------------------
//      -----------------
//        -------------
//          ---------
//            -----
//              -
```

## Development

Install dependencies:

``` bash
$ composer install
```

## Tests

Install dependencies as mentioned above (which will resolve [PHPUnit](http://packagist.org/packages/phpunit/phpunit)), then you can run the test suite:

```bash
$ ./vendor/bin/phpunit tests/
```