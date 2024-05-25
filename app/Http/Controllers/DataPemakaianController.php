<?php

namespace App\Http\Controllers;

use App\Models\DataPemakaian;
use Illuminate\Http\Request;
use App\Models\DataBarang;
use Illuminate\Support\Facades\Auth;

class DataPemakaianController extends Controller
{
    public function datapemakaian(Request $request)
    {   
        $data = DataPemakaian::all();
        $name = Auth::user()->name;
        return view('dashboard/datapemakaian',compact('data'),[
            'name' => $name,
        ]);
    }

    public function create(){
        $dakai = DataBarang::all();
        return view('datapemakaian.create-datapemakaian',[
            'dakai' => $dakai,
        ]);
    }

    public function add_pemakaian(Request $request)
    {
        $barang = DataBarang::where('nama_barang',$request ->nama_barang)->first();
        if($barang ->jumlah >= $request->jumlah_pakai){
            $barang ->jumlah = $barang ->jumlah - $request ->jumlah_pakai;
            $datapemakaian = ([
                'nama_barang' => $request ->nama_barang,
                'jumlah_pakai' => $request ->jumlah_pakai,
                'tanggal_pakai' => $request ->tanggal_pakai,
                'pemakaian' => $request ->pemakaian,
                'keterangan' => $request ->keterangan,
            ]);
    
            $barang->save();
    
            if(DataPemakaian::create($datapemakaian)){
                return redirect()->route('datapemakaian')->with('success', "Data Berhasil Disimpan");
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->route('datapemakaian')->with('gagal-create', "Data Gagal Disimpan");
        }
    }

    public function edit($id){
        $dakai = DataPemakaian::findOrFail($id);
        $data = DataBarang::whereNot('nama_barang', $dakai->nama_barang)->get();
        return view('datapemakaian.update-datapemakaian',[
            'dakai' => $dakai,
            'data' => $data,
        ]);
    }

    public function update_pemakaian(Request $request, $id)
{
    // Retrieve the original DataPemakaian record
    $dakai = DataPemakaian::findOrFail($id);
    $originalJumlahPakai = $dakai->jumlah_pakai;

    // Retrieve the corresponding DataBarang record
    $barang = DataBarang::where('nama_barang', $request->nama_barang)->first();

    if ($barang) {
        // Calculate the new stock quantity
        $newJumlah = $barang->jumlah + $originalJumlahPakai - $request->jumlah_pakai;

        if ($newJumlah >= 0) {
            // Update the DataBarang quantity
            $barang->jumlah = $newJumlah;
            $barang->save();

            // Update the DataPemakaian record
            $dakai->nama_barang = $request->nama_barang;
            $dakai->jumlah_pakai = $request->jumlah_pakai;
            $dakai->tanggal_pakai = $request->tanggal_pakai;
            $dakai->pemakaian = $request->pemakaian;
            $dakai->keterangan = $request->keterangan;
            $dakai->save();

            return redirect()->route('datapemakaian')->with('success-update', 'Data Pemakaian Updated Successfully!');
        } else {
            return redirect()->route('datapemakaian')->with('gagal-create', 'Data Gagal Disimpan: Jumlah barang tidak mencukupi');
        }
    } else {
        return redirect()->route('datapemakaian')->with('gagal-create', 'Data Gagal Disimpan: Barang tidak ditemukan');
    }
}


    public function destroy(string $id)
    {
    $dakai= DataPemakaian::findOrFail($id);
    $barang = DataBarang::where('nama_barang',$dakai->nama_barang)->first();
    $barang->jumlah = $barang ->jumlah + $dakai ->jumlah_pakai;
    $barang->save();
    $dakai->delete();

    return redirect()->route('datapemakaian')->with('success-delete', 'Data Pemakaian deleted successfully!');
    }
}
