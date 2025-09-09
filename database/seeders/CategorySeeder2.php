<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('catagories')->insert([
            [
                'title' => 'Technology',
                'slug' => Str::slug('Technology'),
                'description' => 'All about technology.',
                'image' => 'tech.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fashion',
                'slug' => Str::slug('Fashion'),
                'description' => 'Latest fashion trends.',
                'image' => 'fashion.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sports',
                'slug' => Str::slug('Sports'),
                'description' => 'Sports news and updates.',
                'image' => 'sports.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
                       [
                'title' => 'gaming',
                'slug' => Str::slug('gaming'),
                'description' => 'gaming news and updates.',
                'image' => 'gaming.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
                       [
                'title' => 'journey',
                'slug' => Str::slug('journey'),
                'description' => 'journey news and updates.',
                'image' => 'journey.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
                       [
                'title' => 'Play',
                'slug' => Str::slug('Play'),
                'description' => 'Play news and updates.',
                'image' => 'Play.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
