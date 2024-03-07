<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use League\Csv\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Csv;

class StoreCsvController extends Controller
{
    public function importCsv(Request $request)
    {
        if ($request->hasFile('csv_file')) {
            $file = $request->file('csv_file');
            $filePath = $file->storeAs('csv', 'imported.csv', 'public');

            // Read the file content and convert to UTF-8 using iconv
            $fileContent = iconv('ISO-8859-1', 'UTF-8', Storage::disk('public')->get($filePath));

            // Process the file content, skipping the header and empty lines
            $csvLines = explode("\n", $fileContent);
            $csvData = [];

            foreach ($csvLines as $line) {
                // Skip empty lines
                if (empty(trim($line))) {
                    continue;
                }

                // Skip the header line
                if (!isset($headerSkipped)) {
                    $headerSkipped = true;
                    continue;
                }

                // Extract CSV data from the line
                $row = str_getcsv($line);

                Product::create([
                    'mobile_name' => $row[0],
                    'Cpu_spsecfication' => $row[1],
                    'Gpu_spsecfication' => $row[2],
                    'battery_spsecfication' => $row[3],
                    'Front_camera_spsecfication' => $row[4],
                    'Back_camera_spsecfication' => $row[5],
                    'Screen_Size' => $row[6],
                    'Type_of_charge' => $row[7],
                    'Price' => $row[8],
                    'imge' => $row[9],
                    'company_id' => $row[10],
                    'category_id' => $row[11],
                    'offer_id' => $row[12]
                ]);
            }


            return response()->json(['message' => 'CSV file imported successfully']);
        } else {
            return response()->json(['error' => 'No file provided'], 400);
        }
    }
}
