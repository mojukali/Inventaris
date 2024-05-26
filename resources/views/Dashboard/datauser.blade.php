@extends('layouts.app')
@section('content')

<div class="d-flex">
    <h3 style="color: #233a4a">Data User</h3>
    <a href="{{route ('admin.create-user')}}" class="btn btn-md nav__link-btn mt-1 mb-3">
        <i class="bi bi-plus-circle"></i>
        <span class="visually-hidden "> </span>
        Tambah Akun
    </a>
</div>        
<main class="content px-3 py-2">
    <div class="container-fluid">
        <!-- Table Element -->
        <div class="card border-0 ">
            <div class="card-body">
                <a href="{{route ('admin.user.export')}}" class="btn btn-md nav__link-btn mt-1 mb-3">
                    <i class="bi bi-file-earmark-person-fill pe-2"></i>
                    <span class="visually-hidden "> </span>
                    Unduh
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">
                                No
                            </th>
                            <th scope="col">
                                Nama
                            </th>
                            <th scope="col">
                                Username
                            </th>
                            <th scope="col">
                                Jenis Kelamin
                            </th>
                            <th scope="col">
                                Email
                            </th>
                            <th scope="col">
                                Role
                            </th>
                            <th scope="col">
                                Action
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($pengguna as $detail)
                        <tr>
                            <th scope="row">
                                {{$loop->iteration}}
                            </th>
                            <td>
                                {{$detail->name}}
                            </td>
                            <td>
                                {{$detail->username}}
                            </td>
                            <td>
                                {{$detail->jenis_kelamin}}
                            </td>
                            <td>
                                {{$detail->email}}
                            </td>
                            <td>
                                {{$detail->role}}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-grid"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a href="{{ route('admin.user.edit' , $detail->id) }}" class="dropdown-item "><i class="bi bi-magic me-2"></i> Edit</a></li>
                                      <li>
                                          <form action="{{ route('admin.user.destroy', $detail->id) }}" method="POST">
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