<?php

namespace Tests\Feature;

use Tests\TestCase;
use Exception;
use Artisan;

/**
 * Class to scrape Videx packages
 * 
 * @author Eduardo Lazaro me@edulazaro.com
 */
class ScrapeCommandTest extends TestCase
{
    /**
     * Test the scrape command with a wrong element
     *
     * @return void
     */
    public function testInvalidElement()
    {
        $this->expectException(Exception::class);
        $this->artisan('scraper scrape wrongelement videx');
    }

    /**
     * Test the scrape command with a wrong location
     *
     * @return void
     */
    public function testInvalidLocation()
    {
        $this->expectException(Exception::class);
        $this->artisan('scraper scrape packages wronglocation');
    }

    /**
     * Test the scrape command
     *
     * @return void
     */
    public function testCanScrape()
    {
        Artisan::call('scrape packages videx');
        $result = Artisan::output();
        $this->assertJson($result);
    }
}
