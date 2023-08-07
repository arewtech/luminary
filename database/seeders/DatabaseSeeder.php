<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Book::factory(30)->create();

        \App\Models\User::factory()->create([
            'name' => 'joko hulahula',
            'username' => 'joko',
            'email' => 'joko@gmail.com',
            'role' => 'operator',
            'status' => 'active',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'kim so hyun',
            'username' => 'kim',
            'email' => 'kim@gmail.com',
            'role' => 'user',
            'status' => 'active',
        ]);

        $this->call([
            CategorySeeder::class,
            // BookSeeder::class,
        ]);
    }
}
