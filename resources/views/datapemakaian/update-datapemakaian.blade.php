@extends('layouts.app')
@section('content')
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-header">
                <h5 class="card-title">
                    Edit Data Pembeli
                </h5>
                <h6 class="card-subtitle text-muted">
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('dakai.update' , ['id' => $dakai->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="nama_barang" class="form-select">
                        <option value="{{ $dakai ->nama_barang }}" {{ $dakai->nama_barang ===  $dakai->nama_barang ? 'selected' : '' }}>{{ $dakai->nama_barang }}</option>
                        @foreach ($data as $d )
                        <option value="{{ $d ->nama_barang }}">{{ $d->nama_barang }}</option>
                        @endforeach
                    </select>
                    @error('nama_barang')
                    <small class="text-danger mb-3">{{ $message }}</small>
                    @enderror
                
                    <input type="text" name="jumlah_pakai" value="{{ $dakai->jumlah_pakai}}" class="form-control mt-2 mb-2" placeholder="Jumlah yang dipakai">
                    @error('jumlah_pakai')
                    <small class="text-danger mb-3 mt-1">{{ $message }}</small>
                    @enderror
                    
                    <input type="date" name="tanggal_pakai" value="{{ $dakai->tanggal_pakai}}" class="form-control mt-2 mb-2" placeholder="tanggal pemakaian">
                    @error('tanggal_pakai')
                    <small class="text-danger mb-3 mt-1">{{ $message }}</small>
                    @enderror
                    
                    <input type="text" name="pemakaian" value="{{ $dakai->pemakaian}}" class="form-control mt-2 mb-2" placeholder="Pemakaian">
                    @error('pemakaian')
                    <small class="text-danger mb-3 mt-1">{{ $message }}</small>
                    @enderror

                    <input type="text" name="keterangan" value="{{ $dakai->keterangan}}" class="form-control mt-2 mb-2" placeholder="Keterangan">
                    @error('keterangan')
                    <small class="text-danger mb-3 mt-1">{{ $message }}</small>
                    @enderror
                
                    <a href="{{ route('datapemakaian') }}" class="btn btn-secondary mt-3">Gak Jadi</a>
                    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                </form>
                
            </div>
        </div>
    </div>
@endsection
