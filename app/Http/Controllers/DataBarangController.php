<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataPembelian;
use App\Models\DataPemakaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class DataBarangController extends Controller
{
    public function databarang(Request $request)
    {
        $role = Auth::user()->role;
        $data = DataBarang::all();
        return view('Dashboard/databarang',compact('data'),[
            'role' => $role,

        ]);
    }

    public function create()
    {
        $dabar = DataBarang::all();
        return view('databarang.create-databarang',[
            'dabar' => $dabar,
        ]);
    }

    public function add_databarang( Request $request)
    {
        $addbarang = ([
        'kode_barang' => $request->kode_barang,
        'nama_barang' => $request->nama_barang,
        'merk' => $request->merk,
        'jenis_barang' => $request->jenis_barang,
        'jumlah' => 0,
        'harga' =>$request->harga,
        ]);

        if(DataBarang::create($addbarang)){
            return redirect()->route('databarang')->with('success', "Data Berhasil Disimpan");
        }else{
            return redirect()->back();
        }
    }

    public function edit( $id)
    {
        $dabar = DataBarang::findOrFail($id);
        return view('databarang.update-databarang',[
            'dabar' => $dabar,
        ]);
    }

    public function update(Request $request, string $id)
{

    $dataBarang = DataBarang::findOrFail($id);

    // Validasi input harga
    $this->validate($request, [
        'harga' => 'required|integer',
    ]);


    $dataBarang->update([
        'harga' => $request->harga,
    ]);

    $dataPembelian = DataPembelian::where('nama_barang', $dataBarang->nama_barang)->get();
    foreach ($dataPembelian as $pembelian) {
        $pembelian->harga = $dataBarang->harga;
        $pembelian->total = $pembelian->jumlah * $dataBarang->harga;
        $pembelian->save();
    }

    return redirect()->route('databarang')->with('success-update', 'Data barang ' . $dataBarang->nama_barang . ' berhasil diperbarui!');
}



public function destroy(string $id)
{
    // Temukan barang berdasarkan ID
    $dataBarang = DataBarang::findOrFail($id);
    
    // Dapatkan nama barang yang akan dihapus
    $namaBarang = $dataBarang->nama_barang;

    // Hapus data pembelian yang terkait dengan nama barang
    DataPembelian::where('nama_barang', $namaBarang)->delete();

    // Hapus data pemakaian yang terkait dengan nama barang
    DataPemakaian::where('nama_barang', $namaBarang)->delete();

    // Hapus data barang itu sendiri
    $dataBarang->delete();

    // Redirect dengan pesan sukses
    return redirect()->route('databarang')->with('success-delete', 'Data berhasil dihapus');
}

}
