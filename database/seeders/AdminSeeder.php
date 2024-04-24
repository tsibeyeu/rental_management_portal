<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role; // Import the Role model here

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       
       $user= User::create([
            'first_name' => 'tsion',
            'second_name' => 'beyene',
            'email' => 'tsion@gmail.com',
            'password' => bcrypt('valerie123'),
            'phone_number'=>'123456789',
            

       ]);
       $user->assignRole('admin','user');
    }
}
