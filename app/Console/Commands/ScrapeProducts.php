<?php

namespace App\Console\Commands;

use App\Services\ScrapingService;
use Illuminate\Console\Command;

class ScrapeProducts extends Command
{
    protected $signature = 'scrape:products {source? : Source du scraping (ex: beautyset)}';
    protected $description = 'Scrape les produits depuis les sources définies';

    public function __construct(private ScrapingService $scrapingService)
    {
        parent::__construct();
    }

    public function handle()
    {
        $source = $this->argument('source') ?? 'beautyset';
        
        $this->info("Début du scraping depuis $source...");
        
        try {
            match($source) {
                'beautyset' => $this->scrapingService->scrapeBeautyset(),
                default => throw new \Exception("Source non supportée: $source")
            };
            
            $this->info('Scraping terminé avec succès !');
            
        } catch (\Exception $e) {
            $this->error("Erreur lors du scraping : " . $e->getMessage());
            return 1;
        }
    }
} 