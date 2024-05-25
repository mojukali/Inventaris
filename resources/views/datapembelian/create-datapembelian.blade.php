@extends('layouts.app')
@section('content')
<div class="card border-0">
   <div class="card-header">
       <h5 class="card-title">
           Tambah Data Pembelian
       </h5>
       <h6 class="card-subtitle text-muted">
       </h6>
   </div>
   <div class="card-body">
      <form action="{{ route('datapembelian.store') }}" method="POST">
         @csrf
         @method('POST')
         <select name="nama_barang" class="form-select" id="">
            @foreach ($dabel as $d)
               <option value="{{ $d->nama_barang }}">{{ $d->nama_barang }}</option>
            @endforeach
         </select>
        @error('nama_barang')
        <small class="text-danger mt-2 mb-1">{{ $message }}</small>
        @enderror
         {{-- <input type="text" name="merk" class="form-control mt-2 mb-2" placeholder="Merk Barang">
         @error('merk')
            <small class="text-danger mb-3 mt-1">{{ $message }}</small>
         @enderror --}}
         <input type="text" name="jumlah" class="form-control mt-2 mb-2" placeholder="Jumlah yang dibeli">
         @error('jumlah')
            <small class="text-danger mb-3 mt-1">{{ $message }}</small>
         @enderror
         {{-- <input type="text" name="harga" class="form-control mt-2 mb-2" placeholder="Harga Barang">
         @error('harga')
            <small class="text-danger mb-3 mt-1">{{ $message }}</small>
         @enderror --}}
         <a href="{{ route('datapembelian') }}" class="btn btn-secondary mt-3">Close</a>
         <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </form>
   </div>
</div>
@endsection
