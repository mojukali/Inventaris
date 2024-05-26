@extends('layouts.app')
@section('content')

<div class="d-flex">
    <h3>Data Barang</h3>
    <a href="{{route ('databarang.create')}}" class="btn btn-md nav__link-btn mt-1 mb-3">
        <i class="bi bi-plus-circle"></i>
        <span class="visually-hidden "> </span>
        Tambah Data Barang
    </a>
</div>        
  <main class="content px-3 py-2">
    <div class="container-fluid">
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">
                                No
                            </th>
                            <th scope="col">
                                Kode Barang
                            </th>
                            <th scope="col">
                                Nama Barang
                            </th>
                            <th scope="col">
                                Merk
                            </th>
                            <th scope="col">
                                Jenis Barang
                            </th>
                            <th scope="col">
                                Jumlah
                            </th>
                            <th scope="col">
                                Harga
                            </th>
                            <th scope="col">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <th scope="row">
                                {{$loop->iteration}}
                            </th>
                            <td>
                                {{$d->kode_barang}}
                            </td>
                            <td>
                                {{$d->nama_barang}}
                            </td>
                            <td>
                                {{$d->merk}}
                            </td>
                            <td>
                                {{$d->jenis_barang}}
                            </td>
                            <td>
                                {{$d->jumlah}}
                            </td>
                            <td>
                                {{$d->harga}}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-grid"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a href="{{ route('dabar.edit' , $d->id) }}" class="dropdown-item "><i class="bi bi-magic me-2"></i> Edit</a></li>
                                      <li>
                                          <form action="{{ route('dabar.destroy', $d->id) }}" method="POST">
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