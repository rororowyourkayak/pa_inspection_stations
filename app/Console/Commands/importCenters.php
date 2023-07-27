<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\CentersImport;
use Maatwebsite\Excel\Facades\Excel;

class importCenters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import-centers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import centers from file into database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Excel::import(new CentersImport, storage_path('pa_inspection_pg_1_excel.xlsx'));
    }
}
