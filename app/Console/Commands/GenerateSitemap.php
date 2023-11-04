<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
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
        $date = Carbon::now()->format('Y-m-d');
        $file = fopen(public_path().'/sitemap.xml','w');

        $this->info('Writing to sitemap.xml in public folder...');

        fwrite($file, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
        fwrite($file, "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n\n");

        fwrite($file, $this->makeUrlSection('', $date, '1.0'));
        fwrite($file, $this->makeUrlSection('search', $date, '0.9'));
        fwrite($file, $this->makeUrlSection('stations', $date, '0.8'));
        fwrite($file, $this->makeUrlSection('counties', $date, '0.8'));
        fwrite($file, $this->makeUrlSection('cities', $date, '0.8'));

        foreach (Station::all() as $station) {
            fwrite($file, $this->makeUrlSection('stations/'.$station->station_name_slug, $date, '0.6'));
        }
        foreach (County::all() as $county) {
            fwrite($file, $this->makeUrlSection('counties/'.$county->county_slug, $date, '0.5'));
        }
        foreach (City::all() as $city) {
            fwrite($file, $this->makeUrlSection('cities/'.$city->city_slug, $date, '0.5'));
        }

        fwrite($file, "</urlset>");
        
        fclose($file);
        $this->newLine();
        $this->info('Sitemap made successfully!');
    }

    public function makeUrlSection($url_append, $date, $priority){
        return "\t<url>\n\t\t<loc>https://pa-auto-inspections.com/".$url_append."</loc>\n\t\t<lastmod>".$date."</lastmod>\n\t\t<priority>".$priority."</priority>\n\t</url>\n\n";
    }
}

