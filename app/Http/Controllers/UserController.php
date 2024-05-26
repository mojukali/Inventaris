<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{

    public function assignRolesToUser(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $roles = $request->input('roles'); // Array of roles to assign
        $user->syncRoles($roles); // Sync roles with the given array

        return redirect()->back()->with('success', 'Roles assigned successfully.');
    }



    public function datauser(){
        $pengguna = User::all();
        $name = Auth::user()->name;
        // Assign the 'administrator' role to a user
        return view('Dashboard.datauser', [
            'pengguna' => $pengguna,
            'name' => $name,
        ]);
    }

    //Create Session

    public function create()
    {
        $user = Auth::user()->name;
        $role = Auth::user()->role;
        $post = User::all();
        $name = Auth::user()->name;
        return view('user.create-user',[
            'user' => $user,
            'post' => $post,
            'role' => $role,
            'name' => $name,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:4',
            'username' => 'required|unique:users',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'password' => 'required|min:3',
            'role' =>'required',
        ]);
        $data = ([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => $request->password,
            'role' => $request->role,
        ]);
        if($user = User::create($data)){
            if($request->role ==='administrator'){
                $user->assignRole('administrator');
            }elseif($request->role === 'operator'){
                $user->assignRole('operator');
            }elseif($request->role === 'petugas'){
                $user->assignRole('petugas');
            }
            return redirect()->route('admin.datauser')->with('success', "Data Berhasil Disimpan!");
        }else{
            return redirect()->back();
        }
    }

    // Update session

    public function edit(string $id)
    {
        //get post by ID
        $post = User::findOrFail($id);
        $name = Auth::user()->name;
        $data = User::whereNot('role', $post->role)->get();
        //render view with post
        return view('user.update-user', [
            'post' => $post,
            'data' => $data,
            'name' => $name,
        ]);
    }
    
    
    public function update(Request $request, $id)
{
    // Log incoming request data
    \Log::info('Update request data:', $request->all());

    // Validate form
    $this->validate($request, [
        'name' => 'required|min:4',
        'username' => 'required',
        'email' => 'required|email',
        'role' => 'required|in:administrator,operator,petugas', // Ensures role is one of the predefined values
    ]);

    // Find the user
    $post = User::findOrFail($id);

    // Update user data
    $post->name = $request->name;
    $post->username = $request->username;
    $post->email = $request->email;
    $post->role = $request->role;
    $post->save();

    // Log the updated user data
    \Log::info('Updated user data:', $post->toArray());

    // Sync roles if needed (assuming you're using Spatie Laravel Permission package)
    $post->syncRoles([$request->role]);

    // Log the user's roles after sync
    \Log::info('User roles after sync:', $post->roles->pluck('name')->toArray());

    // Redirect back with success message
    return redirect()->route('admin.datauser')->with(['success-update' => 'Data Berhasil Diubah!']);
}

public function destroy($id)
{
    $post = User::findOrFail($id);
    $post->delete();

    return redirect()->route('admin.datauser')->with('success-delete', 'User deleted successfully!');
}

public function export() 
{
    return Excel::download(new UsersExport, 'users.xlsx');
}



}

