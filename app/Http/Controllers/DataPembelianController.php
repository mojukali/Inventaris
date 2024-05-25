<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataBarang;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use App\Models\DataPembelian;
use App\Models\DataPemakaian;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DataPembelianController extends Controller
{
    public function datapembelian(Request $request)
    {
        $databeli = DataPembelian::all();
        $name = Auth::user()->name;
        return view('dashboard/datapembelian',[
            'data' =>$databeli,
            'name' => $name,
        ]);
    }

    public function create(){
        $dabel = DataBarang::all();
        return view('datapembelian.create-datapembelian',[
            'dabel' => $dabel,
        ]);
    }

    public function add_pembelian(Request $request)
    {
        $barang = DataBarang::where('nama_barang',$request ->nama_barang)->first();
        $barang ->jumlah = $barang ->jumlah + $request ->jumlah;

        $datapembelian = ([
            'nama_barang' => $request ->nama_barang,
            'merk' => $barang ->merk,
            'jumlah' => $request ->jumlah,
            'harga' => $barang ->harga,
            'total' => $request ->jumlah * $barang ->harga,
        ]);

        $barang->save();

        if(DataPembelian::create($datapembelian)){
            return redirect()->route('datapembelian')->with('success', "Data Berhasil Disimpan");
        }else{
            return redirect()->back();
        }
    }


    // Update Beli

    public function edit($id){
        $dabel = DataPembelian::findOrFail($id);
        $data = DataBarang::whereNot('nama_barang', $dabel->nama_barang)->get();
        return view('datapembelian.update-datapembelian',[
            'dabel' => $dabel,
            'data' => $data,
        ]);
    }

    public function update_pembelian(Request $request, $id)
    {
        // Retrieve the original DataPembelian record
        $datapembelian = DataPembelian::findOrFail($id);
        $originalJumlah = $datapembelian->jumlah;
    
        // Retrieve the corresponding DataBarang record
        $barang = DataBarang::where('nama_barang', $request->nama_barang)->first();
    
        if ($barang) {
            // Calculate the new stock quantity
            $newJumlah = $barang->jumlah - $originalJumlah + $request->jumlah;
    
            // Update the DataBarang quantity
            $barang->jumlah = $newJumlah;
            $barang->save();
    
            // Update the DataPembelian record
            $datapembelian->nama_barang = $request->nama_barang;
            $datapembelian->jumlah = $request->jumlah;
            $datapembelian->harga = $barang->harga; // Ensure the price can also be updated
            $datapembelian->total = $request->jumlah * $barang->harga; // Calculate the total based on new quantity and price
            $datapembelian->save();
    
            return redirect()->route('datapembelian')->with('success-update', 'Data Pembelian Updated Successfully!');
        } else {
            return redirect()->route('datapembelian')->with('error', 'Data Gagal Disimpan: Barang tidak ditemukan');
        }
    }
    

    public function destroy($id)
{
    // Temukan data pembelian berdasarkan ID
    $dataPembelian = DataPembelian::findOrFail($id);

    // Temukan data barang terkait berdasarkan nama_barang
    $dataBarang = DataBarang::where('nama_barang', $dataPembelian->nama_barang)->first();

    // Validasi apakah data barang ditemukan
    if (!$dataBarang) {
        return redirect()->route('datapembelian')->with('error-delete', 'Data barang tidak ditemukan.');
    }

    // Hitung jumlah barang yang tersedia
    $jumlahBarangTersedia = $dataBarang->jumlah;

    // Jumlah barang yang diperlukan untuk data pemakaian
    $totalPemakaian = DataPemakaian::where('nama_barang', $dataPembelian->nama_barang)->sum('jumlah_pakai');

    // Cek apakah jumlah barang yang tersedia kurang dari jumlah yang dipakai
    if ($jumlahBarangTersedia < $totalPemakaian) {
        return redirect()->route('datapembelian')->with('gagal-create', 'Penghapusan tidak dapat dilakukan karena jumlah barang tidak mencukupi.');
    }

    // Kurangi jumlah barang dengan jumlah yang akan dihapus
    $dataBarang->jumlah -= $dataPembelian->jumlah;
    $dataBarang->save();

    // Hapus data pembelian
    $dataPembelian->delete();

    return redirect()->route('datapembelian')->with('success-delete', 'Data Pembelian berhasil dihapus!');
}



}
