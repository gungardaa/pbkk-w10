<?php

namespace Tests\Feature;

use App\Models\AcademicData;
use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminRbacTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolePermissionSeeder::class);
    }

    public function test_admin_can_open_dashboard(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $this->actingAs($admin)->get(route('admin.dashboard.index'))->assertOk();
    }

    public function test_staf_can_open_academic_data_index(): void
    {
        $staf = User::factory()->create();
        $staf->assignRole('staf');

        $this->actingAs($staf)->get(route('academic-data.index'))->assertOk();
    }

    public function test_staf_cannot_delete_academic_data(): void
    {
        $staf = User::factory()->create();
        $staf->assignRole('staf');
        $data = AcademicData::factory()->create();

        $this->actingAs($staf)
            ->delete(route('academic-data.destroy', $data))
            ->assertForbidden();

        $this->assertDatabaseHas('academic_data', ['id' => $data->id]);
    }

    public function test_auto_login_is_404_when_no_user_has_the_role(): void
    {
        $this->get('/auto-login/admin')->assertNotFound();
    }
}
