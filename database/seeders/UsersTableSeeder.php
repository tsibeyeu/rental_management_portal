<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::create([
            'name' => 'omishtu',
            'email' => 'omishtu@gmail.com',
            'password' => bcrypt('omishtu123'),
            'phone_number'=>'123456789',
            

       ]);
    }
}
