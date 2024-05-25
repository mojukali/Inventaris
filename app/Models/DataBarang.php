<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;

    protected $table = 'data_barang';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'merk',
        'jenis_barang',
        'jumlah',
        'harga',
    ];

    public function pembelian()
    {
        return $this->hasMany(DataPembelian::class, 'nama_barang', 'nama_barang');
    }

    public function pemakaian()
    {
        return $this->hasMany(DataPemakaian::class, 'nama_barang', 'nama_barang');
    }
}
