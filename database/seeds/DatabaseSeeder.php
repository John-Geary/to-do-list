<?php

use App\Group;
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
        Group::create(['name' => 'General'])->tasks()->createMany([
            ['name' => 'Wash the car'],
            ['name' => 'Do the dishes'],
            ['name' => 'Clean my room'],
        ]);

        Group::create(['name' => 'Groceries'])->tasks()->createMany([
            ['name' => 'Milk'],
            ['name' => 'Eggs'],
            ['name' => 'Bread'],
        ]);
    }
}
