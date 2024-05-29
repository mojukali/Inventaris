@extends('layouts.app')
@section('content')

<div class="d-flex">
    <h3>Laporan Data Inventaris</h3>
  </div>          
  <main class="content px-3 py-2">
    <div class="container-fluid">
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-body">
                <table class="table">
                    <a href="{{route ('inventaris.export')}}" class="btn btn-md nav__link-btn mt-1 mb-3">
                        <i class="bi bi-file-earmark-person-fill pe-2"></i>
                        <span class="visually-hidden "> </span>
                        Laporan Data
                    </a>
                    <thead>
                        <tr>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Tanggal Pembelian</th>
                            <th scope="col">Tanggal Pemakaian</th>
                            <th scope="col">Pemakaian</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventaris as $item)
                            <tr>
                                <td>{{ $item['kode_barang'] }}</td>
                                <td>{{ $item['nama_barang'] }}</td>
                                <td>{{ $item['jumlah'] }}</td>
                                <td>{{ $item['tanggal_pembelian'] }}</td>
                                <td>{{ $item['tanggal_pemakaian'] }}</td>
                                <td>{{ $item['pemakaian'] }}</td>
                                <td>{{ $item['keterangan'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                    {{-- <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
</main>
@endsection