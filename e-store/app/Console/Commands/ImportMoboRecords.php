<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mobolist;
class ImportMoboRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:Mobo-records';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import records from a Mobo file';

    /**
     * Execute the console command.
     */
    public function handle() {

        #$filename = base_path('public/GSM_final.csv');
        $filename=base_path('public/MOBO_final.csv');
        if (!file_exists($filename)) {
            $this->error('CSV file not found!'); return;
        }
        $file = fopen($filename, 'r');
        $header = fgetcsv($file);
        // Read the header row
        while (($row = fgetcsv($file)) !== false) {
           // Process each row and import the record
          // Example: create a new model instance and save it
          Mobolist::create(array_combine($header, $row));
        }
        fclose($file);
        $this->info('Import completed successfully!');
      }
}
