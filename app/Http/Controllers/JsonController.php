<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function parseJson()
    {
        // Path to the JSON file
        $filePath = storage_path('app/data/api.json');

        // Check if the file exists
        if (file_exists($filePath)) {
            // Read the file contents
            $json = file_get_contents($filePath);

            // Decode JSON string into associative array
            $data = json_decode($json, true);

            // Initialize an array to store the ids
            $ids = array();

            // Call the recursive function to find and collect all ids
            $this->findIds($data, $ids);

            // Output the ids
            echo "IDs:<br>";
            foreach ($ids as $id) {
                echo $id . "<br>";
            }
        } else {
            echo "JSON file not found.";
        }
    }

    // Function to recursively find and collect all ids
    private function findIds($data, &$ids) {
        foreach ($data as $key => $value) {
            if ($key === 'id') {
                // Add the id value to the ids array
                $ids[] = $value;
            } elseif (is_array($value)) {
                // If the value is an array, recursively call findIds
                $this->findIds($value, $ids);
            }
        }
    }
}
