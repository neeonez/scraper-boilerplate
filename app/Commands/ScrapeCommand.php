<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Services\ScraperManagerInterface;
use App\Helpers\JsonParser;

/**
 * Command to scrape content
 * 
 * @author Eduardo Lazaro me@edulazaro.com
 */
class ScrapeCommand extends Command
{
    /** @var string The signature of the command */
    protected $signature = 'scrape {element}{location}';

    /** @var string The description of the command */
    protected $description = 'scrape [element] [location]: Scrape the selected element in the requested location';

    /** @var ScraperManagerInterface The scraper manager to use. */
    protected $sraperManager;

    /**
     * Constructor
     *
     * @var ScraperManagerInterface $sraperManager
     */
    public function __construct(ScraperManagerInterface $sraperManager)
    {
        $this->sraperManager = $sraperManager;
        parent::__construct();
    }

    /**
     * Execute the console command
     *
     * @return string
     */
    public function handle()
    {
        try {

            $element = $this->argument('element');
            $location = $this->argument('location');

            $data = $this->sraperManager->getScraper($element, $location)->scrape();
            $jsonData = JsonParser::encode($data);

            $this->info($jsonData);

        } catch (\Exception  $e) {
            $this->info('Error: ' . $e->getMessage());
        }
    }
}
