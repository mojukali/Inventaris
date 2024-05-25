<?php

namespace Database\Seeders;

use App\Models\DataPemakaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataPemakaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brg1 = DataPemakaian::updateOrCreate([
            'nama_barang' => 'Cat 6',
            'jumlah_pakai' => '2',
            'tanggal_pakai' => '2024-04-17',
            'pemakaian' => 'Pemasangan Router',
            'keterangan' => 'Sedang Digunakan',

        ]);
        $brg2 = DataPemakaian::updateOrCreate([
            'nama_barang' => 'Cat 5',
            'jumlah_pakai' => '4',
            'tanggal_pakai' => '2024-05-02',
            'pemakaian' => 'Jaringan',
            'keterangan' => 'Ada',

        ]);
    }
}
