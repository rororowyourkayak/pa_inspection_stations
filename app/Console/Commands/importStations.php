<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\StationsImport;
use Maatwebsite\Excel\Facades\Excel;

class importStations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import-stations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Stations from file into database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Excel::import(new StationsImport, storage_path('pa_inspection_pg_1_excel.xlsx'));
    }
}
