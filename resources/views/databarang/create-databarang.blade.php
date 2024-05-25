@extends('layouts.app')
@section('content')
<div class="card border-0">
   <div class="card-header">
       <h5 class="card-title">
           Tambah Data Pemakaian
       </h5>
       <h6 class="card-subtitle text-muted">
       </h6>
   </div>
   <div class="card-body">
    <form action="{{ route('databarang.store') }}" method="POST">
        @csrf
        @method('POST')
        <input type="text" name="kode_barang" class="form-control mt-2 mb-2" placeholder="Kode Barang //Ex : N01">
        @error('kode_barang')
           <small class="text-danger mb-3 mt-1">{{ $message }}</small>
        @enderror
         
        <input type="text" name="nama_barang" class="form-control mt-2 mb-2" placeholder="Nama Barang">
         @error('nama_barang')
            <small class="text-danger mb-3 mt-1">{{ $message }}</small>
         @enderror
        
         <input type="text" name="merk" class="form-control mt-2 mb-2" placeholder="Merk Barang">
         @error('merk')
            <small class="text-danger mb-3 mt-1">{{ $message }}</small>
         @enderror
        
         <input type="text" name="jenis_barang" class="form-control mt-2 mb-2" placeholder="Jenis Barang">
         @error('jenis_barang')
            <small class="text-danger mb-3 mt-1">{{ $message }}</small>
         @enderror
         
         <input type="hidden" name="jumlah" class="form-control mt-2 mb-2" placeholder="Jumlah Barang">
         @error('jumlah')
            <small class="text-danger mb-3 mt-1">{{ $message }}</small>
         @enderror
         
         <input type="text" name="harga" class="form-control mt-2 mb-2" placeholder="Harga Barang">
         @error('harga')
            <small class="text-danger mb-3 mt-1">{{ $message }}</small>
         @enderror
         <a href="{{ route('databarang') }}" class="btn btn-secondary mt-3">Close</a>
         <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </form>
   </div>
</div>
@endsection
