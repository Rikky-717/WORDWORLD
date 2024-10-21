<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Word;
use Database\Factories\WordFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            WordSeeder::class,
            UserSeeder::class
        ]);

        \App\Models\User::factory(3)->create();
        \App\Models\Word::factory(100)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
