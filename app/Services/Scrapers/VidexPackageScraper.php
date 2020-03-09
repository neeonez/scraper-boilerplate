<?php

namespace App\Services\Scrapers;

use Goutte\Client;
use App\Data\Package;
use App\Services\ScraperInterface;
use Symfony\Component\HttpClient\HttpClient;

/**
 * Class to scrape Videx packages
 * 
 * @author Eduardo Lazaro me@edulazaro.com
 */
class VidexPackageScraper implements ScraperInterface
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
        // Ge the page
        $crawler = $this->client->request('GET', 'https://videx.comesconnected.com/');

        $packages = [];

        // Parse the requested page
        $packages = $crawler->filter('.package')->each(function ($node) {

            $title = $node->filter('h3')->text();
            $description = $node->filter('.package-name')->text();

            $price = $node->filter('.package-price')->text();

            $ammount = $node->filter('.package-price .price-big')->text();
            $currency = preg_replace( '/[0-9\.]/', '', $ammount );
            $ammount = (float) preg_replace( '/[^0-9\.]/', '', $ammount );

            $discount = $node->filter('.package-price p');
            $discount = $discount->count() ? $discount->text() : '';

            // Create e new package
            $package = new Package($title, $description, $price, $ammount, $currency, $discount);

            return $package;    
        });

        // Order the packages by price
        usort($packages, function($packageA, $packageB) {
            return $packageA->getAmmount() < $packageB->getAmmount();
        });

        // Get an array with the packages
        $packagesArr = [];
        foreach ($packages as $package) {
            $packagesArr[] = $package->toArray();
        }

        return $packagesArr;
    }
}