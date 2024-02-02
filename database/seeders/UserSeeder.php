<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
