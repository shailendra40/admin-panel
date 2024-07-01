<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles using firstOrCreate to avoid duplicates
        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
        $roleEditor = Role::firstOrCreate(['name' => 'editor']);
        $roleSuperAdmin = Role::firstOrCreate(['name' => 'super-admin']); // Create 'super-admin' role

        // Define permissions
        $permissions = [
            'create_categories',
            'edit_categories',
            'delete_categories',
            'create_posts',
            'edit_posts',
            'delete_posts',
            'full_access', // Create 'full-access' permission
        ];

        // Create permissions using firstOrCreate to avoid duplicates
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign all permissions to the admin role
        $roleAdmin->syncPermissions(Permission::all());

        // Assign some permissions to the editor role
        $roleEditor->syncPermissions(['create_posts', 'edit_posts']);
        $roleSuperAdmin->syncPermissions(Permission::all());

        // Find the admin user by email and assign them the 'admin' role
        $adminUser = User::where('email', 'admin1@gmail.com')->first(); // Corrected the column name here
        if ($adminUser) {
            $adminUser->assignRole($roleAdmin);
        }

        // Assign the 'super-admin' role to a specific user
        $superAdminUser = User::where('email', 'admin@gmail.com')->first();
        if ($superAdminUser) {
            $superAdminUser->assignRole($roleSuperAdmin);
        }
    }
}
