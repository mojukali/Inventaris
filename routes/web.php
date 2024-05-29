<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataPemakaianController;
use App\Http\Controllers\DataPembelianController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\DataBarang;
use App\Models\DataPemakaian;
use App\Models\DataPembelian;
use App\Models\Inventaris;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
// Route::get('/dashboard', [UserController::class, 'dashboard'])->name('pengguna');
Route::get('/navbar', [Controller::class, 'navbar'])->name('navbar');

// Logout
Route::get('/logout', [Controller::class, 'logout'])->name('logout');

// 404 Not Found
Route::fallback(function () {
    return view('error.Error-404');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Inventaris
Route::get('/inventaris', [InventarisController::class, 'inventaris'])->name('inventaris');
Route::get('/inventaris/download', [InventarisController::class, 'export'])->name('inventaris.export');


// CRUD User
Route::group(['prefix' => 'administrator', 'middleware' => ['auth', 'role:administrator'], 'as' => 'admin.'], function(){
    Route::get('/datauser', [UserController::class, 'datauser'])->name('datauser');
    Route::get('/datauser-create', [UserController::class, 'create'])->name('create-user');
    Route::post('/datauser-create/add', [UserController::class, 'store'])->name('user.store');
    Route::get('/datauser/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/datauser/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/datauser/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/datauser/download', [UserController::class, 'export'])->name('user.export');
});



// CRUD Data Pembelian
Route::get('/datapembelian', [DataPembelianController::class, 'datapembelian'])->name('datapembelian');
Route::get('/datapembelian/create', [DataPembelianController::class, 'create'])->name('datapembelian.create');
Route::post('/datapembelian/create/add', [DataPembelianController::class, 'add_pembelian'])->name('datapembelian.store');
Route::get('/datapembelian/edit/{id})', [DataPembelianController::class, 'edit'])->name('dabel.edit');
Route::put('/datapembelian/update/{id}', [DataPembelianController::class, 'update_pembelian'])->name('dabel.update');
Route::delete('/datapembelian/delete/{id}', [DataPembelianController::class, 'destroy'])->name('datapembelian.destroy');

// Crud Pemakaian
Route::group(['middleware' => ['auth', 'verified', 'role:administrator|operator']], function () {
    Route::get('/datapemakaian', [DataPemakaianController::class, 'datapemakaian'])->name('datapemakaian');
    Route::get('/datapemakaian/create', [DataPemakaianController::class, 'create'])->name('datapemakaian.create');
    Route::post('/datapemakaian/create/add', [DataPemakaianController::class, 'add_pemakaian'])->name('datapemakaian.store');
    Route::get('/datapemakaian/edit/{id}', [DataPemakaianController::class, 'edit'])->name('dakai.edit');
    Route::put('/datapemakaian/update/{id}', [DataPemakaianController::class, 'update_pemakaian'])->name('dakai.update');
    Route::delete('/datapemakaian/delete/{id}', [DataPemakaianController::class, 'destroy'])->name('datapemakaian.destroy');
    Route::get('/datapemakaian/download', [DataPemakaianController::class, 'export'])->name('pemakaian.export');
});


// Route::put('users/update/{id}',[UserController::class, 'update'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('users.update');

//CRUD Barang
Route::get('/databarang', [DataBarangController::class, 'databarang'])->name('databarang');
Route::get('/databarang/create', [DataBarangController::class, 'create'])->name('databarang.create');
Route::post('/databarang/create/add', [DataBarangController::class, 'add_databarang'])->name('databarang.store');
Route::get('/databarang/edit/{id}', [DataBarangController::class, 'edit'])->name('dabar.edit');
Route::put('/databarang/update/{id}',[DataBarangController::class, 'update'])->name('barang.update');
Route::delete('/databarang/delete/{id}', [DataBarangController::class, 'destroy'])->name('dabar.destroy');


require __DIR__.'/auth.php';
