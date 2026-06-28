<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::insert([
            ['name' => 'Haircut', 'description' => 'Basic haircut for men and women', 'price' => 15, 'duration_minutes' => 30, 'category_id' => 1],
            ['name' => 'Hair Coloring', 'description' => 'Professional hair coloring service', 'price' => 50, 'duration_minutes' => 90, 'category_id' => 1],
            ['name' => 'Hair Styling', 'description' => 'Styling for special occasions', 'price' => 40, 'duration_minutes' => 60, 'category_id' => 1],
            ['name' => 'Manicure', 'description' => 'Nail shaping and polish', 'price' => 20, 'duration_minutes' => 45, 'category_id' => 2],
            ['name' => 'Pedicure', 'description' => 'Foot treatment and polish', 'price' => 25, 'duration_minutes' => 50, 'category_id' => 2],
            ['name' => 'Facial', 'description' => 'Skin cleansing and rejuvenation', 'price' => 30, 'duration_minutes' => 60, 'category_id' => 3],
            ['name' => 'Body Massage', 'description' => 'Relaxing full body massage', 'price' => 60, 'duration_minutes' => 90, 'category_id' => 4],
            ['name' => 'Waxing', 'description' => 'Hair removal with wax', 'price' => 20, 'duration_minutes' => 30, 'category_id' => 5],
            ['name' => 'Makeup', 'description' => 'Professional makeup application', 'price' => 70, 'duration_minutes' => 60, 'category_id' => 6],
            ['name' => 'Bridal Package', 'description' => 'Complete bridal hair and makeup', 'price' => 150, 'duration_minutes' => 180, 'category_id' => 6],
            ['name' => 'Spa Therapy', 'description' => 'Relaxing spa treatments', 'price' => 80, 'duration_minutes' => 120, 'category_id' => 4],
            ['name' => 'Hair Treatment', 'description' => 'Deep conditioning and repair', 'price' => 35, 'duration_minutes' => 60, 'category_id' => 1],
        ]);
    }
}
