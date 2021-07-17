<?php

namespace Tests\Feature;

use App\Models\Department;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class DepartmentControllerTest extends TestCase
{
    use WithoutMiddleware, DatabaseMigrations;

    public function test_success_index()
    {
        Department::factory(20)->create();
        $response = $this->get('/departments');

        $response->assertOk();
    }

    public function test_fail_index()
    {
        $response = $this->get('/departments');
        $arrayResponse = json_decode($response->getContent(), true);

        $this->assertEmpty($arrayResponse['data']);
    }
}
