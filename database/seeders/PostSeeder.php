<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
  Post::factory(5)->create();

//    Post::create([
    
//     'description'=>'fake',
//     'title' => 'Chào các bạn',
//     'content' => 'sfjsfijsdfpojs',
//     'status' => '0',
// ]);

// Post::create([
    
//     'description'=>'fake2',
//     'title' => 'xin chào các bạn',
//     'content' => 'sfjsfijsdfpojs',
//     'status' => '1',
// ]);

    }
}
