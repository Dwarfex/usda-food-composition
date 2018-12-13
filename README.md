# USDA Food Composition API client

[![Latest Version](https://img.shields.io/github/release/mortola/usda-food-composition.svg?style=flat-square)](https://github.com/mortola/usda-food-composition/releases)
[![Build Status](https://img.shields.io/travis/mortola/usda-food-composition.svg?style=flat-square)](https://travis-ci.org/mortola/usda-food-composition)
[![Quality Score](https://img.shields.io/scrutinizer/g/mortola/usda-food-composition.svg?style=flat-square)](https://scrutinizer-ci.com/g/mortola/usda-food-composition)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/mortola/usda-food-composition.svg?style=flat-square)](https://scrutinizer-ci.com/g/mortola/usda-food-composition)
[![Total Downloads](https://img.shields.io/packagist/dt/mortola/usda-food-composition.svg?style=flat-square)](https://packagist.org/packages/mortola/usda-food-composition)

Installation
------------

1. [Install Composer](https://getcomposer.org/download/)
2. Execute:

```
$ composer require mortola/usda-food-composition
```

Usage
------------
```php
$usdaFoodCompositionClient = new UsdaFoodCompositionClient();

// NDBno (e.g 11124) is a unique ID assigned to each food in the NDB.
$food = $usdaFoodCompositionClient->food()->get('11124','api_key');

if($food){
    echo $food->getDescription()->getName(); // "Carrots, raw"
    echo $food->getDescription()->getFoodGroup(); // "Vegetables and Vegetable Products"
    echo $food->getFat()->getQuantity()->toUnit('g'); // 0.24
    echo $food->getFat()->getQuantity()->toUnit('mg'); // 240
    
    // All this and much more.
    // Try to experiment the returned object methods.
}
```
Read the USDA Food Composition Database API documentation [here](https://ndb.nal.usda.gov/ndb/doc/apilist/API-FOOD-REPORTV2.md).

License
------------

Licensed under the MIT License. See [License File](LICENSE) for more information about it.