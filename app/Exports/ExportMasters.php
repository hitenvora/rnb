<?php

namespace App\Exports;

use App\Models\Admin\District;
use App\Models\Master\Master;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

class ExportMasters implements FromCollection, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Master::with('district')->get();
    }

    public function headings(): array
    {
        return [
            'Serial No',
            'WMS Work Head.',
            'Name of Department',
            'Name of Scheme',
            'Name of Project',
            'District',
            'Name of Road, length and width as per F1-F2 with Chainage',
            'Category of road (SH/MDR/ODR/VR)(with highway no.)',
            'Initiated by MLA/MP Name, letter no.',
            'Treatment details',
            'Amount (in Lacs.)',
            'Proposal submitted vide letter no., date, submission office',
            'Project Start Date',
            'Project over All Status'
        ];
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
        return [
            $row->id,
            $row->basic_wms_work_head,
            $row->basic_name_of_department,
            $row->basic_name_scheme,
            $row->basic_name_project,
            $district->name,
            $row->basic_name_of_road,
            $row->basic_category_of_road,
            $row->initiated_name,
            $row->ppd_treatment_detail,
            $row->basic_amount,
            $row->ppd_proposal_submission_office,
            $row->ppd_proposal_submission_office,
            $row->ppd_proposal_submission_office,

        ];
    }
}
