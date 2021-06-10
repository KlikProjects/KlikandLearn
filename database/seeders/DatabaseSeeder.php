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
        User::factory()->create([
            'name' => 'user1',
            'email' => 'user1@user1.com',
            'isAdmin' => false
        ]);
        User::factory()->create([
            'name' => 'user2',
            'email' => 'user2@user2.com',
            'isAdmin' => false
        ]);
        User::factory()->create([
            'name' => 'user3',
            'email' => 'user3@user3.com',
            'isAdmin' => false
        ]);

        //User::factory(10)->create();

        Event::factory(10)->create();
    }
}