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
      <form action="{{ route('datapemakaian.store') }}" method="POST">
         @csrf
         @method('POST')
         <select name="nama_barang" class="form-select" id="">
            @foreach ($dakai as $d)
               <option value="{{ $d->nama_barang }}">{{ $d->nama_barang }}</option>
            @endforeach
         </select>
        @error('nama_barang')
        <small class="text-danger mt-2 mb-1">{{ $message }}</small>
        @enderror
         
        <input type="text" name="jumlah_pakai" class="form-control mt-2 mb-2" placeholder="Jumlah Barang Yang Dipakai">
         @error('jumlah_pakai')
            <small class="text-danger mb-3 mt-1">{{ $message }}</small>
         @enderror
        
         <input type="date" name="tanggal_pakai" class="form-control mt-2 mb-2" placeholder="Tanggal Berapa">
         @error('tanggal_pakai')
            <small class="text-danger mb-3 mt-1">{{ $message }}</small>
         @enderror
        
         <input type="text" name="pemakaian" class="form-control mt-2 mb-2" placeholder="Pemakaian Barang">
         @error('pemakaian')
            <small class="text-danger mb-3 mt-1">{{ $message }}</small>
         @enderror
         
         <input type="text" name="keterangan" class="form-control mt-2 mb-2" placeholder="Keterangan Pemakaian">
         @error('keterangan')
            <small class="text-danger mb-3 mt-1">{{ $message }}</small>
         @enderror
         <a href="{{ route('datapemakaian') }}" class="btn btn-secondary mt-3">Close</a>
         <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </form>
   </div>
</div>
@endsection
