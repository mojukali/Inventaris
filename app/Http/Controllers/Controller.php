<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\DataPembelian;
use App\Models\DataPemakaian;
use Spatie\Permission\Models\Role;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {   
        $users = User::count();
        $barangs = DataBarang::count();
        $pembelian = DataPembelian::count();
        $pemakaians = DataPemakaian::count();
        $data = ([
            'users' => $users,
            'barangs' => $barangs,
            'pembelian' => $pembelian,
            'pemakaians' => $pemakaians,
        ]);
        
        $dataU = User::all();
        $dakai = DataPemakaian::all();
        $dabel = DataPembelian::all();
        $role = Auth::user()->role;
        $username = Auth::user()->username;
        $name = Auth::user()->name;
        $user = User::where('username', $username)->first();
        $pengguna = User::all();
        return view('/dashboard',  [
            'role' => $role,
            'dataU' => $dataU,
            'username' => $username,
            'name' => $name,
            'user' => $user,
            'pengguna' => $pengguna,
            'dakai' => $dakai,
            'dabel' => $dabel,
            'data' => $data,
        ]);
    }

    public function logout(){
        $user = Auth::user();
    
        Auth::logout();
    
        return redirect()->route('login')->with('successout','GoodBye,');
    }

    
}
