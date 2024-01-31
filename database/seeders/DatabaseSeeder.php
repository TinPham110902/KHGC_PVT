<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

      
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Super',
            'email'=>'superadmin@khgc.com',
            'password'=>'Abcd@1234',
            'role'=>'admin'
        ]);

        User::create([
            'first_name' => 'Tin',
            'last_name' => 'Pham',
            'email'=>'tindien123@icloud.com',
            'password'=>'Tinchuaneem123@',
            'role'=>'user'
        ]);
        
        $this->call(PostSeeder::class);

   
    }
}
