<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class IdsExport implements  FromArray, WithHeadings
{
    protected $formattedData;

    public function __construct(array $formattedData)
    {
        $this->formattedData= $formattedData;
    }

    public function array(): array
    {
        return $this->formattedData;
    }


    public function headings(): array
    {
        return [
            'ID', // Add other headers if needed
        ];
    }


}
