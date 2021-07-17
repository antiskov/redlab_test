<?php

namespace Tests\Feature;

use App\Models\Department;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DepartmentControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions, WithoutMiddleware;

    const DOMAIN = '/api/departments';
    public function test_success_index()
    {
        Department::factory(20)->create();
        $response = $this->get(self::DOMAIN);
        $response->assertOk();

        $arrayResponse = json_decode($response->getContent(), true);
        $this->assertNotEmpty($arrayResponse['data']);
    }

    public function test_fail_index()
    {
        $response = $this->get(self::DOMAIN);
        $arrayResponse = json_decode($response->getContent(), true);

        $this->assertEmpty($arrayResponse['data']);
    }

    public function test_success_store()
    {
        $response = $this->post(self::DOMAIN, ['name' => 'test_name2']);
        $response->assertCreated();

        $arrayResponse = json_decode($response->getContent(), true);
        $this->assertNotEmpty($arrayResponse['data']);
    }

    public function test_fail_store()
    {
        $department = Department::factory()->create();

        $response = $this->post(self::DOMAIN, ['name' => $department->name], ['accept' => 'application/json']);
        $response->assertStatus(422);
    }

    public function test_success_update()
    {
        $department = Department::factory()->create();
        $updateName = 'update_name';
        $response = $this->put(self::DOMAIN.'/'.$department->id, ['name' => $updateName]);
        $response->assertOk();

        $arrayResponse = json_decode($response->getContent(), true);
        $this->assertNotEmpty($arrayResponse['data']);
    }

    public function test_fail_update()
    {
        $department = Department::factory()->create();
        $response = $this->put(self::DOMAIN.'/'.$department->id, ['name' => $department->name], ['accept' => 'application/json']);
        $response->assertStatus(422);
    }
}
