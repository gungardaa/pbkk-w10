<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SmokeTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_dashboard_renders_with_layout(): void
    {
        $this->seed(RolePermissionSeeder::class);
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $response = $this->actingAs($admin)->get(route('admin.dashboard.index'));
        $response->assertOk();
        $response->assertSee('Admin Dashboard');
        $response->assertSee('Total Pengguna');
    }

    public function test_academic_data_index_renders(): void
    {
        $this->seed(RolePermissionSeeder::class);
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        \App\Models\AcademicData::factory()->create();

        $response = $this->actingAs($admin)->get(route('academic-data.index'));
        $response->assertOk();
        $response->assertSee('Data Akademik');
    }

    public function test_404_page_renders_without_error(): void
    {
        $response = $this->get('/nonexistent-path-xyz');
        $response->assertStatus(404);
    }

    public function test_auto_login_redirects_when_seeded(): void
    {
        $this->seed(RolePermissionSeeder::class);
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $response = $this->get('/auto-login/admin');
        $response->assertRedirect(route('admin.dashboard.index'));
    }
}
