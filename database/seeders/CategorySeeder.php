<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Local News','World News','Sports','Food','Travel'];
        $arr = [];
        foreach ($categories as $category) {
            $arr[] = [
                "title" => $category,
                // "user_id" => User::where('role','admin')->get()->random()->id,
                "user_id" => 12,
                "created_at" => now(),
                "updated_at" => now(),
            ];          
        }
        Category::insert($arr);
    }
}
