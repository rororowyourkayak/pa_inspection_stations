<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;use 
Illuminate\Support\Facades\Storage;
use Spatie\Sitemap\SitemapGenerator;

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
        if(Storage::disk('public')->exists('sitemap.xml')){
            Storage::disk('public')->deelte('sitemap.xml');
        }
        Storage::disk('public')->put('sitemap.xml', '');
        
        Storage::disk('public')->append('sitemap.xml', '');

        $this->newLine();
        $this->info('Writing to sitemap.xml in public folder');
        $this->newLine();
        $this->info('Sitemap made successfully!');
    }
}
