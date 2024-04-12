<?php

namespace App\Http\Controllers;

use App\Exports\IdsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importExcel (){
        $data = collect([
            ["id" => 1, "name" => "Alice"],
            ["id" => 2, "name" => "Bob"],


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
