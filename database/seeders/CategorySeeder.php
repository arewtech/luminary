<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Fiksi',
                'slug' => 'fiksi',
            ],
            [
                'name' => 'Non Fiksi',
                'slug' => 'non-fiksi',
            ],
            [
                'name' => 'Komik',
                'slug' => 'komik',
            ],
            [
                'name' => 'Novel',
                'slug' => 'novel',
            ],
            [
                'name' => 'Biografi',
                'slug' => 'biografi',
            ],
            [
                'name' => 'Ensiklopedia',
                'slug' => 'ensiklopedia',
            ],
            [
                'name' => 'Kamus',
                'slug' => 'kamus',
            ],
            [
                'name' => 'Panduan',
                'slug' => 'panduan',
            ],
            [
                'name' => 'Puisi',
                'slug' => 'puisi',
            ],
            [
                'name' => 'Cerpen',
                'slug' => 'cerpen',
            ],
            [
                'name' => 'Cerita Anak',
                'slug' => 'cerita-anak',
            ],
            [
                'name' => 'Cerita Rakyat',
                'slug' => 'cerita-rakyat',
            ],
            [
                'name' => 'Cerita Pendek',
                'slug' => 'cerita-pendek',
            ],
            [
                'name' => 'Cerita Seru',
                'slug' => 'cerita-seru',
            ],
            [
                'name' => 'Cerita Horor',
                'slug' => 'cerita-horor',
            ],
            [
                'name' => 'Cerita Misteri',
                'slug' => 'cerita-misteri',
            ],
            [
                'name' => 'Cerita Fantasi',
                'slug' => 'cerita-fantasi',
            ],
            [
                'name' => 'Cerita Humor',
                'slug' => 'cerita-humor',
            ],
            [
                'name' => 'Cerita Inspiratif',
                'slug' => 'cerita-inspiratif',
            ],
            [
                'name' => 'Cerita Motivasi',
                'slug' => 'cerita-motivasi',
            ],
        ];
        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
