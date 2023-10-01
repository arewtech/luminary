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
        Book::factory()->create([
            'title' => 'The Hobbit',
            'slug' => 'the-hobbit',
        ]);

        Book::factory()->create([
            'title' => 'The Lord of the Rings',
            'slug' => 'the-lord-of-the-rings',
        ]);

        Book::factory()->create([
            'title' => 'The Silmarillion',
            'slug' => 'the-silmarillion',
        ]);

        Book::factory()->create([
            'title' => 'The Children of Húrin',
            'slug' => 'the-children-of-hurin',
        ]);

        Book::factory()->create([
            'title' => 'The Fall of Gondolin',
            'slug' => 'the-fall-of-gondolin',
        ]);

        Book::factory()->create([
            'title' => 'Unfinished Tales',
            'slug' => 'unfinished-tales',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'John BBC',
            'username' => 'john',
            'email' => 'john@luminary.com',
            'role' => 'admin',
            'status' => 'active',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Operator Luminary',
            'username' => 'operator',
            'email' => 'operator@luminary.com',
            'role' => 'operator',
            'status' => 'active',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Kim Jong Un',
            'username' => 'kim',
            'email' => 'kim@gmail.com',
            'role' => 'user',
            'status' => 'active',
        ]);

        $this->call([
            CategorySeeder::class,
        ]);
    }
}