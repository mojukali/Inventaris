<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $petugas = User::create([
            'name'      => 'El Togar',
            'username' => 'Carno',
            'jenis_kelamin' => 'Laki-laki',
            'email' => 'togar@gmail.com',
            'password'  => '111',
            'role' => 'petugas',
        ]);
        $petugas->assignRole('petugas');

        $operator = User::create([
            'name'      => 'El Kokop',
            'username' => 'Tatang',
            'jenis_kelamin' => 'Perempuan',
            'email' => 'tatanganjir@gmail.com',
            'password'  => '222',
            'role' => 'operator',
        ]);
        $operator->assignRole('operator');

        $administrator = User::create([
            'name'      => 'El Gembul',
            'username' => 'Mamank',
            'jenis_kelamin' => 'Laki-laki',
            'email' => 'azhar@gmail.com',
            'password'  => '333',
            'role' => 'administrator',
        ]);
        $administrator->assignRole('administrator');
    }
}
