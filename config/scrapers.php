<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Scraper configuration
    |--------------------------------------------------------------------------
    |
    | Array with data type and pairs of location => scraper.
    |
    */

    'packages' => [
        'videx' => '\App\Services\Scrapers\VidexPackageScraper',
    ],
    'test_elements' => [
        'test_location' => '\Tests\Fake\TestScraper',
    ]
];
