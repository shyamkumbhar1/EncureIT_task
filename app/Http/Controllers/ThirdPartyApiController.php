<?php

namespace App\Http\Controllers;

use App\Exports\IdsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class ThirdPartyApiController extends Controller
{
    public function fetchDataAndStoreInExcel()
    {
        try {
            // Make request to API and get JSON response
            $response = Http::get('https://opencontext.org/query/Asia/Turkey/Kenan+Tepe.json');
            $data = $response->json();

            // Extract relevant data from JSON
            $records = $data['records'];

            // Write data to Excel
            $filePath = storage_path('app/excel/kenan_tepe_data.xlsx');
            Excel::create('kenan_tepe_data', function($excel) use ($records) {
                $excel->sheet('Sheet1', function($sheet) use ($records) {
                    $sheet->fromArray($records);
                });
            })->store('xlsx', storage_path('app/excel'));

            // Log the file path
            Log::info('Excel file created at: ' . $filePath);
        } catch (\Exception $e) {
            // Log any errors
            Log::error('Error occurred: ' . $e->getMessage());
        }
    }

    public function exportToExcel()
    {
        $data = collect([
            ["id" => 1, "name" => "Alice"],
            ["id" => 2, "name" => "Bob"],
            ["id" => 3, "name" => "Charlie"],
            ["id" => 3, "name" => "Charlie"],
            ["id" => 3, "name" => "Charlie"],
            ["id" => 3, "name" => "Charlie"],
            ["id" => 3, "name" => "Charlie"],
            // Add more data as needed
        ]);

        $uniqueId = $data->pluck('id')->unique()->values()->toArray();

        $formattedData = [];
        foreach ($uniqueId as $id) {
            $formattedData[] = ["id" => $id];
        }

        Excel::store(new IdsExport($formattedData), 'exports/users.xlsx');

        return  "Unique IDs exported to unique_ids.xlsx";
    }
}



