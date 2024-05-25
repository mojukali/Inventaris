<?php

// App\Http\Controllers\InventarisController.php
namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use App\Exports\InventarisExport;
use Maatwebsite\Excel\Facades\Excel;

class InventarisController extends Controller
{
    public function inventaris()
{
    $barang = DataBarang::with(['pembelian' => function ($query) {
        $query->latest();
    }, 'pemakaian'])->get();

    $inventaris = $barang->map(function ($item) {
        return [
            'kode_barang' => $item->kode_barang,
            'nama_barang' => $item->nama_barang,
            'jumlah' => $item->jumlah,
            'tanggal_pembelian' => $item->pembelian->isEmpty() ? '-' : $item->pembelian->first()->created_at->format('Y-m-d'),
            'tanggal_pemakaian' => $item->pemakaian->pluck('tanggal_pakai')->isEmpty() ? '-' : $item->pemakaian->pluck('tanggal_pakai')->implode('-'),
            'pemakaian' => $item->pemakaian->isEmpty() ? '-' : $item->pemakaian->pluck('pemakaian')->implode(', '),
            'keterangan' => $item->pemakaian->isEmpty() ? '-' : $item->pemakaian->pluck('keterangan')->implode(', '),
        ];
    });

    return view('dashboard.inventaris', compact('inventaris'));
}



    public function export() 
{
    // Simpan data inventaris ke database
    $this->saveInventarisToDatabase();

    // Unduh file Excel
    return Excel::download(new InventarisExport, 'inventaris.xlsx');
}

private function saveInventarisToDatabase()
{
    // Ambil data inventaris
    $barang = DataBarang::with(['pembelian' => function ($query) {
        $query->latest()->take(1);
    }, 'pemakaian'])->get();

    // Simpan data inventaris ke database
    foreach ($barang as $item) {
        // Tetapkan tanggal pembelian ke tanggal saat ini jika tidak tersedia
        $tanggal_pembelian = $item->pembelian->isEmpty() ? now() : $item->pembelian->first()->created_at;

        Inventaris::updateOrCreate(
            ['kode_barang' => $item->kode_barang],
            [
                'nama_barang' => $item->nama_barang,
                'jumlah' => $item->jumlah,
                'tanggal_pembelian' => $tanggal_pembelian->format('Y-m-d'),
                'tanggal_pemakaian' => $item->pemakaian->pluck('tanggal_pakai')->isEmpty() ? null : $item->pemakaian->pluck('tanggal_pakai')->implode('-'),
                'pemakaian' => $item->pemakaian->isEmpty() ? null : $item->pemakaian->pluck('pemakaian')->implode(', '),
                'keterangan' => $item->pemakaian->isEmpty() ? null : $item->pemakaian->pluck('keterangan')->implode(', '),
            ]
        );
    }
}

}
