<?php

namespace App\Services;

/**
 * Interface to define a scrape manager
 * 
 * @author Eduardo Lazaro me@edulazaro.com
 */
interface ScraperManagerInterface
{
    /**
     * Get the requested scraper
     *
     * @param string  $element  The element to scrape
     * @param string  $location The location to scrape
     * @return ScraperInterface
     */
    public function getScraper($element, $location);
}