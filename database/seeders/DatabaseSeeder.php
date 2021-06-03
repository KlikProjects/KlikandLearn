<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'root',
            'email' => 'root@root.com',
            'isAdmin' => true
        ]);

        User::factory(10)->create();

        Event::factory(10)->create();
    }
}