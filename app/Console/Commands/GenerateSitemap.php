<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use App\Models\County;
use App\Models\City;
use App\Models\Station;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        $this->info('Crawling...');
        //SitemapGenerator::create('http://127.0.0.1:8000/')->writeToFile(public_path().'sitemap.xml');
        $map = Sitemap::create();
        $map -> add(County::all());
        $map -> writeToFile(public_path().'/sitemap.xml');
        $this->newLine();
        $this->info('Writing to sitemap.xml in public folder');
        $this->newLine();
        $this->info('Sitemap made successfully!');
    }
}

