<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\EVent;
use App\Models\Vision;
use App\Models\Mission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => 'admin123',
        ]);

        Post::factory(10)->create();
        Vision::factory()->create();
        Mission::factory()->create();
        Event::factory(10)->create();
    }
}
