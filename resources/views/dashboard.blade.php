@extends('layouts.app')
@section('content')
        <main class="content px-3 py-2 text-dark">
            <div class="container-fluid">
                <div class="mb-3">
                    <h3 style="color: #233a4a">{{$role}} Dashboard</h3>
                </div>
                <div class="row" >
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0 illustration">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-6" style="color: #233a4a">
                                        <div class="p-3 m-1">
                                            <h4 style="color: #233a4a">Welcome Back, {{$name}}</h4>
                                            <p class="mb-0">Dashboard {{$role}}, {{$name}}</p>
                                        </div>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-4 align-self-end text-end">
                                        @include('svg.Illustration-Helllo')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex" >
                        <div class="card flex-fill border-0 " style="background-color: #233a4a">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start ">
                                        <div class="col-6">
                                        <div class="flex-grow-1 text-light">
                                            <h4 class="mb-2 text-light">$ 78.00</h4>
                                            <p class="mb-2">Total Earnings</p>
                                            <div class="mb-0">
                                                <span class="badge me-2">+9.0%</span>
                                                <span class="">Since Last Month</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                    </div>
                                    <div class="col-4">
                                        @include('svg.Illustration-Building')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    @if(auth()->user()->hasRole('administrator') || auth()->user()->hasRole('operator'))
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card card-dashboard bg-gray text-dark">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <h4 class="a-icon"><i class="bi bi-people-fill"></i></h4>
                                            <div class="ms-5 d-flex flex-column gap-3">
                                                <h5 class="fw-medium">Data User</h5>
                                                <h1 class="fw-bold">{{ $data['users'] }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card card-dashboard bg-gray text-dark">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <h4 class="a-icon"><i class="fa-solid fa-boxes-stacked"></i></h4>
                                            <div class="ms-5 d-flex flex-column gap-3">
                                                <h5 class="fw-medium">Data Barang</h5>
                                                <h1 class="fw-bold">{{ $data['barangs'] }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card card-dashboard bg-gray text-dark">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <h4 class="a-icon"><i class="fa-solid fa-cart-shopping"></i></h4>
                                            <div class="ms-5 d-flex flex-column gap-3">
                                                <h5 class="fw-medium">Data Pembelian</h5>
                                                <h1 class="fw-bold">{{ $data['pembelian'] }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card card-dashboard bg-gray text-dark">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <h4 class="a-icon"> <i class="fa-solid fa-people-carry-box"></i></h4>
                                            <div class="ms-5 d-flex flex-column gap-3">
                                                <h5 class="fw-medium">Data Pemakaian</h5>
                                                <h1 class="fw-bold">{{ $data['pemakaians'] }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(auth()->user()->hasRole('petugas'))
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card card-dashboard bg-gray text-dark">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <h4 class="a-icon"><i class="fa-solid fa-boxes-stacked"></i></h4>
                                            <div class="ms-5 d-flex flex-column gap-3">
                                                <h5 class="fw-medium">Data Barang</h5>
                                                <h1 class="fw-bold">{{ $data['barangs'] }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card card-dashboard bg-gray text-dark">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <h4 class="a-icon"><i class="fa-solid fa-cart-shopping"></i></h4>
                                            <div class="ms-5 d-flex flex-column gap-3">
                                                <h5 class="fw-medium">Data Pembelian</h5>
                                                <h1 class="fw-bold">{{ $data['pembelian'] }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </main>
@endsection