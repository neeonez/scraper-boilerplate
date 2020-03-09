<?php

namespace Tests\Fake;

use Goutte\Client;
use App\Data\Package;
use App\Services\ScraperInterface;
use Symfony\Component\HttpClient\HttpClient;

/**
 * Class to scrape Videx packages
 * 
 * @author Eduardo Lazaro me@edulazaro.com
 */
class TestScraper implements ScraperInterface
{
    /** @var Client Array The web scraper */
    private $client;

    /**
     * Constructor
     */
    public function __construct(){
        $this->client = new Client(HttpClient::create(['timeout' => 60]));
    }

    /**
     * Run the scraper
     * 
     * @return Package
     */
    public function scrape()
    {
        return [
            [
                'title' => 'Package 1 title',
                'description' => 'Package 1 description',
                'price' => '£5.00 (inc. VAT) Per month',
                'discount' => 'None'
            ],
            [
                'title' => 'Package 2 title',
                'description' => 'Package 1 description',
                'price' => '£50.00 (inc. VAT) Per year',
                'discount' => 'Save £10 on the monthly price'
            ]
        ];
    }
}