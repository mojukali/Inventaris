<?php

namespace App\Exports;

use App\Models\Inventaris;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class InventarisExport implements FromCollection,WithHeadings,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inventaris::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Kode Barang',
            'Nama Barang',
            'Jumlah',
            'Tanggal Pembelian',
            'Tanggal Pemakaian',
            'Pemakaian',
            'Keterangan',
        ];
    }
    public function title() : string{
        return 'Data Inventaris';
    }
}
