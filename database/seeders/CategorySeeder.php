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
                'name' => 'Action',
                'slug' => 'action'
            ],
            [
                'name' => 'Adventure',
                'slug' => 'adventure'
            ],
            [
                'name' => 'Comedy',
                'slug' => 'comedy'
            ],
            [
                'name' => 'Drama',
                'slug' => 'drama'
            ],
            [
                'name' => 'Fantasy',
                'slug' => 'fantasy'
            ],
            [
                'name' => 'Horror',
                'slug' => 'horror'
            ],
            [
                'name' => 'Mystery',
                'slug' => 'mystery'
            ],
            [
                'name' => 'Romance',
                'slug' => 'romance'
            ],
            [
                'name' => 'Thriller',
                'slug' => 'thriller'
            ],
            [
                'name' => 'Western',
                'slug' => 'western'
            ],
            [
                'name' => 'Sci-Fi',
                'slug' => 'sci-fi'
            ],
            [
                'name' => 'Animation',
                'slug' => 'animation'
            ],
            [
                'name' => 'Crime',
                'slug' => 'crime'
            ],
            [
                'name' => 'Documentary',
                'slug' => 'documentary'
            ],
            [
                'name' => 'Family',
                'slug' => 'family'
            ],
            [
                'name' => 'History',
                'slug' => 'history'
            ],
            [
                'name' => 'Music',
                'slug' => 'music'
            ],
            [
                'name' => 'Sport',
                'slug' => 'sport'
            ],
            [
                'name' => 'War',
                'slug' => 'war'
            ],
            [
                'name' => 'Biography',
                'slug' => 'biography'
            ],
            [
                'name' => 'Musical',
                'slug' => 'musical'
            ],
            [
                'name' => 'Costume',
                'slug' => 'costume'
            ],
            [
                'name' => 'Psychological',
                'slug' => 'psychological'
            ],
            [
                'name' => 'Sitcom',
                'slug' => 'sitcom'
            ],
            [
                'name' => 'Supernatural',
                'slug' => 'supernatural'
            ],
            [
                'name' => 'Medical',
                'slug' => 'medical'
            ],
            [
                'name' => 'Political',
                'slug' => 'political'
            ],
            [
                'name' => 'Romantic',
                'slug' => 'romantic'
            ],
            [
                'name' => 'Situation',
                'slug' => 'situation'
            ],
            [
                'name' => 'Teen',
                'slug' => 'teen'
            ],
            [
                'name' => 'Travel',
                'slug' => 'travel'
            ],
            [
                'name' => 'Variety',
                'slug' => 'variety'
            ],
            [
                'name' => 'Action-Comedy',
                'slug' => 'action-comedy'
            ],
            [
                'name' => 'Action-Drama',
                'slug' => 'action-drama'
            ]
        ];
        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
