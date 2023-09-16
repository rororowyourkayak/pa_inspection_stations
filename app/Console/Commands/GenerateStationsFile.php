<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Station;

class GenerateStationsFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stations:generate';

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
        touch('C:\Users\rosha\pcp\pa_inspection\inspection\config\stations.php');
        $file = fopen('C:\Users\rosha\pcp\pa_inspection\inspection\config\stations.php', "w");
        foreach(Station::all() as $s){
            fwrite($file, $s . ",\n");
        }
        fclose($file);
    }
}
