<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $role = Role::findOrCreate('super-admin');
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'manoj@gmail.com',
            'password' => 'password',
        ]);

        $user->assignRole($role);

        $role = Role::findOrCreate('admin');
        $user = User::create([
            'name' => 'Admin',
            'email' => 'manoj.admin@gmail.com',
            'password' => 'password',
        ]);
        $user->assignRole($role);

    }
}
