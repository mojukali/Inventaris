<?php

namespace Database\Seeders;

use App\Models\Inventaris;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brg1 = Inventaris::updateOrCreate([
            'kode_barang' => 'N01',
            'nama_barang' => 'Cat 6',
            'Jumlah' => '17',
            'tanggal_pembelian' => '2024-03-28',
            'tanggal_pemakaian' => '2024-04-17',
            'pemakaian' => '2',
            'keterangan' => 'Sedang Digunakan',
        ]);
        $brg2 = Inventaris::updateOrCreate([
            'kode_barang' => 'N02',
            'nama_barang' => 'Cat 5',
            'Jumlah' => '23',
            'tanggal_pembelian' => '2024-04-19',
            'tanggal_pemakaian' => '2024-05-02',
            'pemakaian' => '4',
            'keterangan' => 'Ada',
        ]);
    }
}
