<?php

namespace Database\Seeders;

use App\Models\AcademicData;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Create academic data with Faker
        $this->call([RolePermissionSeeder::class]);

        // Generate 50 academic data records using Faker
        AcademicData::factory()->count(50)->create();

        // Create demo Admin account
        $adminUser = \App\Models\User::firstOrCreate(
            ['email' => 'admin@demo.local'],
            [
                'name' => 'Admin Demo',
                'password' => bcrypt('password123'), // password will be hashed
            ]
        );
        $adminUser->assignRole('admin');

        // Create demo Staf account
        $stafUser = \App\Models\User::firstOrCreate(
            ['email' => 'staf@demo.local'],
            [
                'name' => 'Staf Demo',
                'password' => bcrypt('password123'),
            ]
        );
        $stafUser->assignRole('staf');
    }
}