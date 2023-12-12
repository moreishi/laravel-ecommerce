<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Clothing & Apparel",
            "Footwear & Shoes",
            "Electronics & Gadgets",
            "Games & Toys",
            "Veterinary & Pet Items",
            "Stationery",
            "Hand & Power Tools",
            "Tupperware",
            "Furniture",
            "Sports Products"];

        
        foreach($categories as $item) {
            Category::create([
                'name' => $item,
                'slug' => Str::slug($item)
            ]);
        }

    }
}
