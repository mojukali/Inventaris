@extends('layouts.app')
@section('content')

<div class="d-flex">
    <h3>Data Pemakaian</h3>
    <a href="{{route ('datapemakaian.create')}}" class="btn btn-md nav__link-btn mt-1 mb-3">
        <i class="bi bi-plus-circle"></i>
        <span class="visually-hidden "> </span>
        Tambah Data Pemakaian
    </a>
</div>  
<main class="content px-3 py-2">
    <div class="container-fluid">
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-body">
                <form action="{{ route('datapemakaian') }}" method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                        </div>
                        <div class="col-md-5">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                        </div>
                        <div class="col-md-2">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-primary btn-block">Filter</button>
                        </div>
                    </div>
                </form>

                <a href="{{ route('pemakaian.export', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" class="btn btn-md nav__link-btn mt-1 mb-3">
                    <i class="bi bi-file-earmark-person-fill pe-2"></i>
                    <span class="visually-hidden "> </span>
                    Laporan Pemakaian
                </a>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Barang</th>
                            <th scope="col" class="px-6 py-3">Jumlah Pakai</th>
                            <th scope="col" class="px-6 py-3">Tanggal Pakai</th>
                            <th scope="col" class="px-6 py-3">Pemakaian</th>
                            <th scope="col" class="px-6 py-3">Keterangan</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dakai)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{ $dakai->nama_barang }}</td>
                            <td>{{$dakai->jumlah_pakai}}</td>
                            <td>{{$dakai->tanggal_pakai}}</td>
                            <td>{{$dakai->pemakaian}}</td>
                            <td>{{$dakai->keterangan}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-grid"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a href="{{ route('dakai.edit', $dakai->id) }}" class="dropdown-item"><i class="bi bi-magic me-2"></i> Edit</a></li>
                                      <li>
                                          <form action="{{ route('datapemakaian.destroy', $dakai->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger"><i class="bi bi-person-x me-2 text-danger"></i> Delete</button>
                                          </form>
                                      </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
