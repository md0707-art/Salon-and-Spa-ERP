<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;

class ServiceCategorySeeder extends Seeder
{
    public function run(): void
    {
       $categories = [
                       'Haircut',
                       'Hair Styling',
                       'Hair Coloring',
                       'Hair Treatment',
                       'Shaving & Beard Trim',
                       'Facial',
                       'Skin Treatment',
                       'Waxing',
                       'Manicure',
                       'Pedicure',
                       'Nail Art',
                       'Massage Therapy',
                       'Body Scrub',
                       'Aromatherapy',
                       'Makeup',
                       'Bridal Package',
                       'Groom Package',
                       'Spa Package',
                       'Threading',
                       'Detox Treatment',
                       'Anti-Aging Treatment',
                       'Scalp Treatment',
                       'Kids Services',
                       'Couple Spa',
                      ];


        foreach ($categories as $name) {
            ServiceCategory::create(['name' => $name]);
        }
    }
}
