<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts= File::get(database_path('dummy_data.json'));

        foreach(json_decode($posts) as $post)
        {
          Post::create([
            'title'=> $post->title,
            'body'=> $post->body,
            'category'=> $post->category,
          ]);
        }
    }
}
