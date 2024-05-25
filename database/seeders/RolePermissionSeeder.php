<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        Role::updateOrCreate(['name' => 'administrator']);
        Role::updateOrCreate(['name' => 'operator']);
        Role::updateOrCreate(['name' => 'petugas']);
    }
}

