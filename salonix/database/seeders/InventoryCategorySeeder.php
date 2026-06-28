<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InventoryCategory;

class InventoryCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Hair Care',
            'Skin Treatment',
            'Nail Care',
            'Hygiene',
            'Hair Styling',
            'General Supplies',
            'Waxing Kit',
            'Tools',
            'Makeup Products',
            'Spa Oils',
            'Tools & Accessories',
            'Manicure & Pedicure',
            'Body Treatment',
        ];

        foreach ($categories as $name) {
            InventoryCategory::create(['name' => $name]);
        }
    }
}
