<?php

namespace App\Services;

use Exception;

/**
 * Class to manage scrapers
 * 
 * @author Eduardo Lazaro me@edulazaro.com
 */
class ScraperManager implements ScraperManagerInterface
{
    /** @var array Array with existing scrapers */
    private $scrapers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->scrapers = config('scrapers');
    }

    /**
     * Get the requested scraper
     *
     * @param string  $element  The element to scrape
     * @param string  $location The location to scrape
     * @return ScraperInterface
     */
    public function getScraper($element, $location)
    {
        $scraper = isset($this->scrapers[$element][$location]) ? $this->scrapers[$element][$location] : false;

        if (!$scraper) throw new Exception('The scraper "'. $element . ' -> ' . $location . '" is not configured.');

        return app()->make($scraper);
    }
}