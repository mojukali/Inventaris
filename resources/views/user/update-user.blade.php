@extends('layouts.app')
@section('content')
        <!-- Table Element -->
        <div class="card border-0">
            <div class="card-header">
                <h5 class="card-title">
                    Edit User
                </h5>
                <h6 class="card-subtitle text-muted">
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.user.update' , ['id' => $post->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{ $post->name }}" class="form-control mt-2 mb-1" placeholder="Nama Lengkap">
                    @error('name')
                    <small class="text-danger mb-3">{{ $message }}</small>
                    @enderror
                
                    <input type="text" name="username" value="{{ $post->username }}" class="form-control mt-2 mb-2" placeholder="Username">
                    @error('username')
                    <small class="text-danger mb-3 mt-1">{{ $message }}</small>
                    @enderror
                
                    <input type="email" name="email" value="{{ $post->email }}" class="form-control mt-2 mb-1" placeholder="Email">
                    @error('email')
                    <small class="text-danger mb-3">{{ $message }}</small>
                    @enderror
                
                    <select name="role" id="" class="form-select mb-3">
                        <option disabled selected>Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="operator">Operator</option>
                        <option value="petugas">Petugas</option>
                    </select>
                    @error('role')
                        <small class="text-danger mb-3 d-block">{{ $message }}</small>
                    @enderror
                
                    <a href="{{ route('admin.datauser') }}" class="btn btn-secondary mt-3">Close</a>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
                
            </div>
        </div>
    </div>
@endsection
