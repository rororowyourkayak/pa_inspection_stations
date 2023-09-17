<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Station;

class CacheStations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stations:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache the stations data.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        cache()->put('stations', Station::all());
    }
}
