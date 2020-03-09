<?php

namespace Tests\Unit;

use Tests\TestCase;
use Artisan;
use Exception;

class ScrapeCommandTest extends TestCase
{
    /**
     * Fail sraping if no element and location are provided
     *
     * @return void
     */
    public function testFailScrapeNoElement()
    {
        $this->expectException(Exception::class);
        Artisan::call('scrape');
        $result = Artisan::output();
    }

    /**
     * Fail sraping if no location is providedd
     *
     * @return void
     */
    public function testFailScrapeNoLocation()
    {
        $this->expectException(Exception::class);
        Artisan::call('scrape test_elements');
        $result = Artisan::output();
    }

    /**
     * Fail sraping if scraper does not exist
     *
     * @return void
     */
    public function testFailScrapeNoScraper()
    {
        $output = 'Error: The scraper "test_unexistent_element -> test_location" is not configured.';
        Artisan::call('scrape test_unexistent_element test_location');
        $result = Artisan::output();
        $result = str_replace("\r\n", "", $result);
        $this->assertEquals($output, $result);
    }

    /**
     * Can scrape a valid element and location
     *
     * @return void
     */
    public function testCanScrape()
    {
        $output = '[{"title":"Package 1 title","description":"Package 1 description","price":"£5.00 (inc. VAT) Per month","discount":"None"},';
        $output .= '{"title":"Package 2 title","description":"Package 1 description","price":"£50.00 (inc. VAT) Per year","discount":"Save £10 on the monthly price"}]';

        Artisan::call('scrape test_elements test_location');
        $result = Artisan::output();
        $result = str_replace("\r\n", "", $result);

        $this->assertEquals($output, $result);
    }
}
