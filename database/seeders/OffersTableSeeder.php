<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OffersTableSeeder extends Seeder
{
    public function run()
    {
        $offers = [
            [
                'title' => 'Customized Training Programs',
                'description' => 'Our bespoke training solutions are tailored to address unique organizational challenges, empowering teams with relevant skills to drive measurable results.',
                'active' => true,
            ],
            [
                'title' => 'Certified Courses for Professionals',
                'description' => 'Gain industry-recognized certifications through courses designed to enhance technical expertise and foster career advancement in competitive fields.',
                'active' => true,
            ],
            [
                'title' => 'Strategic Consulting Services',
                'description' => 'Partner with our experts to develop actionable strategies that optimize processes, align goals, and achieve sustainable growth for your business.',
                'active' => true,
            ],
            [
                'title' => 'Continuous Support for Growth',
                'description' => 'We provide ongoing mentorship and resources, ensuring long-term success and adaptability in an ever-changing market landscape.',
                'active' => true,
            ],
            [
                'title' => 'Leadership Development Programs',
                'description' => 'Equip leaders with essential skills through immersive workshops and coaching, enhancing decision-making and team management capabilities.',
                'active' => true,
            ],
            [
                'title' => 'Technology-Driven Solutions',
                'description' => 'Leverage cutting-edge technologies to streamline workflows, boost productivity, and achieve operational excellence in a digital-first world.',
                'active' => true,
            ],
            [
                'title' => 'Industry-Specific Workshops',
                'description' => 'Attend specialized workshops designed for industries such as healthcare, energy, and IT, offering practical solutions and industry insights.',
                'active' => true,
            ],
            [
                'title' => 'Performance Assessment Tools',
                'description' => 'Utilize advanced tools and methodologies to evaluate team and organizational performance, identifying areas for growth and improvement.',
                'active' => true,
            ],
            [
                'title' => 'Global Networking Opportunities',
                'description' => 'Expand your professional horizons with exclusive access to international networks, fostering collaboration and knowledge exchange with industry leaders.',
                'active' => true,
            ],
        ];

        DB::table('offers')->insert($offers);
    }
}
