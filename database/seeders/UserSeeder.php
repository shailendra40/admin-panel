<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create the user
        $user = User::create([
            'name' => 'Ashish',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // Retrieve the "super-admin," "admin," and "editor" roles
        $superAdminRole = Role::where('name', 'super-admin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $editorRole = Role::where('name', 'editor')->first();

        if ($superAdminRole && $adminRole && $editorRole && $user) {
            // Assign all three roles to the user
            $user->assignRoles([$superAdminRole, $adminRole, $editorRole]);
        }
    }
}
