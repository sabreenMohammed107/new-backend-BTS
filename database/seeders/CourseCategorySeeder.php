<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CourseCategory;

class CourseCategorySeeder extends Seeder
{
    public function run(): void
    {
        CourseCategory::create([
            'category_en_name' => 'Business & Management',
            'category_en_description' => 'Professional development courses in business and management',
            'active' => 1,
        ]);

        CourseCategory::create([
            'category_en_name' => 'Information Technology',
            'category_en_description' => 'IT and software development courses',
            'active' => 1,
        ]);

        CourseCategory::create([
            'category_en_name' => 'Healthcare & Medical',
            'category_en_description' => 'Medical and healthcare training courses',
            'active' => 1,
        ]);
    }
}
