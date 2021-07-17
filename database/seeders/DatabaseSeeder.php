<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Worker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Department::factory(10)
            ->has(Worker::factory()->count(10))
            ->create();
    }
}
