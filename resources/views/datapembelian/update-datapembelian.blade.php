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
                <form action="{{ route('dabel.update' , ['id' => $dabel->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="nama_barang" class="form-select">
                        <option value="{{ $dabel ->nama_barang }}" {{ $dabel->nama_barang ===  $dabel->nama_barang ? 'selected' : '' }}>{{ $dabel->nama_barang }}</option>
                        @foreach ($data as $d )
                        <option value="{{ $d ->nama_barang }}">{{ $d->nama_barang }}</option>
                        @endforeach
                    </select>
                    @error('nama_barang')
                    <small class="text-danger mb-3">{{ $message }}</small>
                    @enderror
                
                    <input type="text" name="jumlah" class="form-control mt-2 mb-2" placeholder="Jumlah yang dibeli">
                    @error('jumlah')
                    <small class="text-danger mb-3 mt-1">{{ $message }}</small>
                    @enderror
                
                    <a href="{{ route('datapembelian') }}" class="btn btn-secondary mt-3">Gak Jadi</a>
                    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                </form>
                
            </div>
        </div>
    </div>
@endsection
