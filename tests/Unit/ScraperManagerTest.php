<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\ScraperManager;
use App\Services\Scrapers\ScraperInterface;
use Tests\Fake\TestScraper;
use Exception;

class ScraperManagerdTest extends TestCase
{
    /**
     * Should not get the unexistent requested scraper
     *
     * @return void
     */
    public function testFailGetScraper()
    {
        $this->expectException(Exception::class);
        $scraperManager = app()->make(ScraperManager::class);
        $scraper = $scraperManager->getScraper('wrong_elements', 'wrong_location' );
        $this->assertInstanceOf(ScraperInterface::class, $scraper);
    }

    /**
     * Get the requested scraper
     *
     * @return void
     */
    public function testCanGetScraper()
    {
        $scraperManager = app()->make(ScraperManager::class);
        $scraper = $scraperManager->getScraper('test_elements', 'test_location' );
        $this->assertInstanceOf(TestScraper::class, $scraper);
    }
}
