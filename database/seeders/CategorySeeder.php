<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Burger','Pizza','Juice','Snack'];
        $arr = [];
        foreach ($categories as $category) {
            $arr[] = [
                "title" => $category,
                "slug" => Str::slug($category),
                // "user_id" => User::where('role','admin')->get()->random()->id,
                "user_id" => 11,
                "created_at" => now(),
                "updated_at" => now(),
            ];          
        }
        Category::insert($arr);
    }
}
