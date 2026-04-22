<?php

namespace App\Exports;

//use App\Models\Dovriyye;

use App\Services\Dovriyye_analitic;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery; 
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DevriyyeExport implements FromQuery, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $DovriyyeAnalitic;

    public function __construct()
    {
        $this->DovriyyeAnalitic = new Dovriyye_analitic();
    }

    public function query()
    {
        return $this->DovriyyeAnalitic->Debitor();
    }


    public function headings(): array
    {
        return ['ID', 'Hesab', 'Ad', 'Növ', 'Yan 2025', 'Yan 2026', 'Mart Hes.', 'Mart Çıxış'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->hesab,
            $row->ad,
            $row->maliyye_novu,
            $row->borc_yanvar_2025,
            $row->borc_yanvar_2026,
            $row->hesablanma_mart_2026,
            $row->cixis_mart_2026,
        ];
    }



    public function collection()
    {
        // return Dovriyye::all();

    }
}
