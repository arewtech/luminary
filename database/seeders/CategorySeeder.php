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
                'name' => 'Programming',
                'slug' => 'programming'
            ],
            [
                'name' => 'Design',
                'slug' => 'design'
            ],
            [
                'name' => 'Networking',
                'slug' => 'networking'
            ],
            [
                'name' => 'Database',
                'slug' => 'database'
            ],
            [
                'name' => 'Operating System',
                'slug' => 'operating-system'
            ],
            [
                'name' => 'Web Development',
                'slug' => 'web-development'
            ],
            [
                'name' => 'Mobile Development',
                'slug' => 'mobile-development'
            ],
            [
                'name' => 'Desktop Development',
                'slug' => 'desktop-development'
            ],
            [
                'name' => 'Game Development',
                'slug' => 'game-development'
            ],
            [
                'name' => 'Software Development',
                'slug' => 'software-development'
            ],
            [
                'name' => 'Hardware',
                'slug' => 'hardware'
            ],
            [
                'name' => 'Artificial Intelligence',
                'slug' => 'artificial-intelligence'
            ],
            [
                'name' => 'Machine Learning',
                'slug' => 'machine-learning'
            ],
            [
                'name' => 'Deep Learning',
                'slug' => 'deep-learning'
            ],
            [
                'name' => 'Data Science',
                'slug' => 'data-science'
            ],
            [
                'name' => 'Internet of Things',
                'slug' => 'internet-of-things'
            ],
            [
                'name' => 'Cloud Computing',
                'slug' => 'cloud-computing'
            ],
            [
                'name' => 'Big Data',
                'slug' => 'big-data'
            ],
            [
                'name' => 'Cyber Security',
                'slug' => 'cyber-security'
            ],
            [
                'name' => 'Blockchain',
                'slug' => 'blockchain'
            ],
            [
                'name' => 'Quantum Computing',
                'slug' => 'quantum-computing'
            ],
            [
                'name' => 'Augmented Reality',
                'slug' => 'augmented-reality'
            ],
            [
                'name' => 'Virtual Reality',
                'slug' => 'virtual-reality'
            ],
            [
                'name' => 'Mixed Reality',
                'slug' => 'mixed-reality'
            ],
        ];
        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
