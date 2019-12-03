# Arena of Valor API

This is an inofficial PHP API wrapper for the mobile game "Arena of Valor". Currently it supports fetching Heroes, Hero Details and Images.

## Requirements

This package requires >= PHP 7.2. Version below PHP 7.2 will never 
be supported.

## Installation

`composer require mobaguides/arena-of-valor-api`

## Usage

### Factory

Use the Factory to create `ApiFetcher` objects. 

````php
use MobaGuides\ArenaOfValorApi\Fetchers\Hero;
use MobaGuides\ArenaOfValorApi\Fetchers\Image;

ArenaOfValorApi::make(Hero::class);
````

### Fetchers

Fetchers are Classes that extend `MobaGuides\ArenaOfValorApi\Fetchers\ApiFetcher`.
You can also create your own Fetchers and instantiate them through the factory. Just let them inherit from this class.

#### Fetch All Heroes

````php
use MobaGuides\ArenaOfValorApi\ArenaOfValor;
use MobaGuides\ArenaOfValorApi\Fetchers\Hero;

$hero = ArenaOfValor::make(Hero::class);
var_dump($hero->all());
````

#### Fetch Hero Details

````php
use MobaGuides\ArenaOfValorApi\ArenaOfValor;
use MobaGuides\ArenaOfValorApi\Fetchers\Hero;

$hero = ArenaOfValor::make(Hero::class);
var_dump($hero->detail(106));
````

#### Find Image

The Image map is fetched one time only and calls on the same
Image Fetcher instance will only make one HTTP request. Subsequent
method calls on the same instance will use the cached image map. 

````php
use MobaGuides\ArenaOfValorApi\ArenaOfValor;
use MobaGuides\ArenaOfValorApi\Fetchers\Image;

$image = ArenaOfValor::make(Image::class);
var_dump($image->find('HeroHead001.png'));
````

#### Find Hero Profile Image

````php
use MobaGuides\ArenaOfValorApi\ArenaOfValor;
use MobaGuides\ArenaOfValorApi\Fetchers\Image;

$image = ArenaOfValor::make(Image::class);
var_dump($image->heroAvatar(1)); // Hero Avatar of Miya
````
