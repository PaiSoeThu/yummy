<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          User::factory(10)->create();

        User::factory()->create([
            'name' => 'paingsoethu',
             'email' => 'paingsoethu@gmail.com',
             'password' => Hash::make("paingsoethu"),
             'role' => 'admin'
         ]);

        //  User::factory()->create([
        //     'name' => 'kitkit',
        //      'email' => 'kitkit@gmail.com',
        //      'password' => Hash::make("kitkit"),
        //      'role' => 'admin'
        //  ]);
    }
}
