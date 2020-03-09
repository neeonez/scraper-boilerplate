# Documentation

## About

This is a template php app to create and run scrapers from the console, returning results in JSON format.

## Requirements

* PHP >= 7.1
* Composer

## Installation

To install this application follow these steps:

* Crate a new folder in your system and access it.
* Unzil the applicaiton file orr or clone the github repo into the crated folder ```git clone git@github.com:neeonez/test-roman.git ./```.
* Install dependences using the command ```php composer.phar install``` or ```php composer install`` and wait until composer installs all dependences.

## How run the application

 To run an available scraper you need to go to the application directory and run the command php ```scraper scrape [element] [location]```. Run just ```scraper scrape``` to get more information about the command.

 You can run the included scraper using the command ```scraper scrape packages videx```, which will scrape packages at the videx [https://videx.comesconnected.com/] (https://videx.comesconnected.com/) url.

## Application structure

This application uses the [Laravel Zero Framework] (https://laravel-zero.com/), which is a light micro-framework based in Laravel specilly designed to create console based PHP applications. The [Goutte] (https://github.com/FriendsOfPHP/Goutte) scraper is included, as it's an easy to use scraping tool which can also emulate the behavior of a web browser.

To add a new scraper you have to edit the **_config/scrapers.php_** file. This file includes an array with pairs of **elements** to scrape and **locations** to scrape.

```php
 'packages' => [
    'videx' => '\App\Services\Scrapers\VidexPackageScraper',
  ],
```
For example, the **_packages_** elment can be scraped at **_videx_** location with the scraper ```\App\Services\Scrapers\VidexPackageScraper```.

The scraper VidexPackageScraper of the previous array is located in the folder **_app/Services/Scrapers/VidexPackageScraper.php_**. You can add another location to the array with the matching scraper designed to scrape the location.

## Execute Unit and Integration tests

To execute both unit and integration tests, open a terminal window and go to the application directory. Then execute the command:

```vendor/bin/phpunit```

Unit tests should correctly pass unless you have a missing PHP extension. Integration tests should run correctly unless you don't have access to the Internet.

The objetive of the integration tests is to know which live scraper are failing so we know which scrapers need to be modified accordingly when a scraper fails.

The objective of unit tests if to test the main application code and not the specific code which will require an external resource to work properly. Because of this, unit tests use a fake test scraper which just returns a fixed result.




