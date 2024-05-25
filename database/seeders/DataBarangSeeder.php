<?php

namespace Database\Seeders;

use App\Models\DataBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brg1 = DataBarang::updateOrCreate([
            'kode_barang' => 'N01',
            'nama_barang' => 'Cat 6',
            'merk' => 'Kaku',
            'jenis_barang' => 'Kabel',
            'jumlah' => '6',
            'harga' => '12000',
        ]);
        $brg2 = DataBarang::updateOrCreate([
            'kode_barang' => 'N02',
            'nama_barang' => 'Cat 5',
            'merk' => 'Kaku',
            'jenis_barang' => 'Kabel',
            'Jumlah' => '8',
            'harga' => '9000',
        ]);
    }
}
