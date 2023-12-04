<?php

namespace App\Exports;

use App\Models\Admin\District;
use App\Models\Master\Master;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

class ExportMasters implements FromCollection, WithHeadings, WithStyles
{
    protected $customVariable, $customHeadings;

    public function __construct($customVariable, $customHeadings)
    {
        $this->customVariable = $customVariable;
        $this->customHeadings = $customHeadings;
    }

    public function collection()
    {
        // dd($this->customHeadings);
        // return Master::select($this->customVariable)->with('district')->get();
        $master =  Master::select($this->customVariable)->with('district')->get();
        // dd($master);
        $phpArray = [];
        foreach($master as $i => $ms){
            // $obj['id'] = $i + 1;
            $obj['district_id'] = $ms->district->name;
            $phpArray[] = $obj;
        }

        // Convert the PHP array to a Laravel collection
        $laravelCollection = collect($phpArray);

        
        return $laravelCollection;
    }

    public function headings(): array
    {
        $headings = [];

        foreach ($this->customVariable as $column) {
            // Convert column names to user-friendly headings
            // $headings[] = ucfirst(str_replace('_', ' ', $column));
            $headings[] =  $this->customHeadings[$column];
        }

        return $headings;
    }

    public function styles($sheet)
    {
        return [
            'A1:Z1' => [
                'font' => [
                    'bold' => true, // Make the headings bold
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, // Add a thin border around the headings
                    ],
                ],
            ],
        ];
    }

    public function map($row): array
    {
        $district = District::where('id', $row->district_id)->select('id', 'name')->first();

        // Map all selected columns
        $data = [];
        
        foreach ($this->customVariable as $column) {
            // if ($column == 'id') {
            //     $data['Sr.No'] = $incrementingId++;
            //     // $data['id'] = $incrementingId++;
            // }
            // if ($column == 'district_id') {
            //     $data['Basic - Received Proposal - District'] = $district->name;
            //     // $data['district_id'] = $district->name;
            // }
            $data[] = $row->$column;
        }

        return $data;
    }
}
