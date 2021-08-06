<?php

namespace Tests\Feature;

use App\Models\Worker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class WorkerControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions, WithoutMiddleware;

    const DOMAIN = '/api/workers';
    public function test_success_index()
    {
        Worker::factory(20)->create();
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
}
