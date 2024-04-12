<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Exports\IdsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class ThirdPartyApiController extends Controller
{

    public function getData()
    {
        $url = 'https://opencontext.org/query/Asia/Turkey/Kenan+Tepe.json';

           if ($url) {
             $json = file_get_contents($url);
             $data = json_decode($json, true);
             $ids = array();
             $this->findIds($data, $ids);

         } else {
             echo "url  not found.";
         }

         $data = collect($ids);

        $uniqueId = $data->unique()->values()->toArray();



        $formattedData = [];
        foreach ($uniqueId as $id) {
            $formattedData[] = ["id" => $id];
        }
        //   dd( $formattedData);

        Excel::store(new IdsExport($formattedData), 'exports/users.xlsx');

        return  "Unique IDs exported to unique_ids.xlsx";

    }

     private function findIds($data, &$ids) {
        foreach ($data as $key => $value) {
            if ($key === 'id') {
                $ids[] = $value;
            } elseif (is_array($value)) {
                $this->findIds($value, $ids);
            }
        }
    }

    public function exportToExcel()
    {
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



