<?php

namespace Database\Seeders;

use App\Models\DataPembelian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataPembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brg1 = DataPembelian::updateOrCreate([
            'nama_barang' => 'Cat 6',
            'merk' => 'Kaku',
            'jumlah' => '8',
            'harga' => '12000',
            'total' => '96000'

        ]);
        $brg2 = DataPembelian::updateOrCreate([
            'nama_barang' => 'Cat 5',
            'merk' => 'Kaku',
            'Jumlah' => '12',
            'harga' => '9000',
            'total' => '108000'
        ]);
    }
}
