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
  // Post::factory(10)->create();

   Post::create([
    'thumbnail' => 'abc',
    'description'=>'fake',
    'title' => 'fgewwef',
    'status' => '0',
]);

Post::create([
    'thumbnail' => 'abc2',
    'description'=>'fake2',
    'title' => 'fgewwef2',
    'status' => '1',
]);

    }
}
