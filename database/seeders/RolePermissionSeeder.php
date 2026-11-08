<?php

namespace Database\Seeders;

use App\Models\AcademicData;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'view dashboard',
            'view data',
            'create data',
            'edit data',
            'delete data',
            'manage users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $staff = Role::firstOrCreate(['name' => 'staf']);

        // Admin gets all permissions
        $admin->syncPermissions(Permission::all());

        // Staf gets limited permissions
        $staffPermissions = Permission::whereIn('name', [
            'view dashboard',
            'view data',
            'create data',
        ])->get();
        $staff->syncPermissions($staffPermissions);
    }
}