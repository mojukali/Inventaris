<?php

// App\Models\Inventaris.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'jumlah',
        'tanggal_pembelian',
        'tanggal_pemakaian',
        'pemakaian',
        'keterangan',
    ];
};
