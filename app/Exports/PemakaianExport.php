<?php

namespace App\Exports;

use App\Models\DataPemakaian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithLimit;
use Maatwebsite\Excel\Concerns\WithTitle;

class PemakaianExport implements FromCollection,WithHeadings,WithTitle
{
    protected $start_date;
    protected $end_date;

    public function __construct($start_date = null, $end_date = null)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
    {
        $query = DataPemakaian::query();

        if ($this->start_date && $this->end_date) {
            $query->whereBetween('tanggal_pakai', [$this->start_date, $this->end_date]);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Barang',
            'Jumlah Pakai',
            'Tanggal Pemakaian',
            'Pemakaian',
            'Keterangan',
        ];
    }
    public function title() : string{
        return 'Data Pemakaian';
    }


}
