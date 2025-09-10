<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Catagory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catagory = Catagory::first() ?? Catagory::create([
            'title' => 'General',
            'slug' => 'general',
            'description' => 'Default category',
            'status' => 1,
        ]);

        // Insert 5-6 dummy blogs
        Blog::insert([
            [
                'title'            => 'First Blog Post',
                'slug'             => 'first-blog-post',
                'content'          => 'This is the content of the first blog post.',
                'image'            => null,
                'catagory_id'      => $catagory->id,
                'status'           => 1,
                'meta_title'       => 'First Blog Meta Title',
                'meta_description' => 'Short description for SEO.',
                'meta_keywords'    => 'blog,first,example',
                'meta_keyphrase'   => 'first blog',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'title'            => 'Second Blog Post',
                'slug'             => 'second-blog-post',
                'content'          => 'Another blog post for testing purposes.',
                'image'            => null,
                'catagory_id'      => $catagory->id,
                'status'           => 1,
                'meta_title'       => 'Second Blog Meta Title',
                'meta_description' => 'Another short description for SEO.',
                'meta_keywords'    => 'blog,second,example',
                'meta_keyphrase'   => 'second blog',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'title'            => 'Laravel Tips and Tricks',
                'slug'             => 'laravel-tips-tricks',
                'content'          => 'Some useful Laravel tips and tricks for developers.',
                'image'            => null,
                'catagory_id'      => $catagory->id,
                'status'           => 1,
                'meta_title'       => 'Laravel Tips',
                'meta_description' => 'SEO meta description about Laravel.',
                'meta_keywords'    => 'laravel,tips,php',
                'meta_keyphrase'   => 'laravel tips',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'title'            => 'SEO Optimization Guide',
                'slug'             => 'seo-optimization-guide',
                'content'          => 'Learn how to optimize your blogs for SEO.',
                'image'            => null,
                'catagory_id'      => $catagory->id,
                'status'           => 1,
                'meta_title'       => 'SEO Optimization',
                'meta_description' => 'Meta description for SEO guide.',
                'meta_keywords'    => 'seo,optimization,blogs',
                'meta_keyphrase'   => 'seo guide',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'title'            => 'Tech News Update',
                'slug'             => 'tech-news-update',
                'content'          => 'Latest updates in the tech world.',
                'image'            => null,
                'catagory_id'      => $catagory->id,
                'status'           => 1,
                'meta_title'       => 'Tech News',
                'meta_description' => 'Short SEO description for tech news.',
                'meta_keywords'    => 'tech,news,updates',
                'meta_keyphrase'   => 'tech news',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ]);
    }
}
