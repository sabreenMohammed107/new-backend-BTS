<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DownloadCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $DownloadCenter = [
            [
                'title' => 'Corporate Brochure',
                'description' => 'Dive into a detailed overview of BTS Consultant, including our mission, services, and core values. This brochure provides an in-depth look at how we deliver innovative solutions and support businesses in achieving their goals.',
                'file_size' => '5.45 MB',
                'file_extention' => 'PDF ',
                'active' => true,
                'upload_file' => 'assets/downloads/BTS_Corporate_Brochure.pdf',
                'image' => 'uploads/download_centers/adv6.png',
            ],
            [
                'title' => 'Training Course Catalog',
                'description' => 'Discover a wide range of professional development courses designed to enhance your skills and knowledge. From beginner to advanced levels, this catalog provides detailed descriptions of each course and the value it adds to your career growth.',
                'file_size' => '2.11 MB',
                'file_extention' => 'EXCEL ',
                'active' => true,
                'upload_file' => 'assets/downloads/Training_Course_Catalog.xlsx',
                'image' => 'uploads/download_centers/adv7.png',

            ],
            [
                'title' => 'Certification Guide',
                'description' => 'Learn about the certifications offered by BTS Consultant, including eligibility, application processes, and benefits. This guide helps you understand how our certifications can boost your qualifications and open new opportunities.',
                'file_size' => '4.10 MB',
                'file_extention' => 'PDF ',
                'active' => true,
                'upload_file' => 'assets/downloads/Certification_Guide.pdf',
                'image' => 'uploads/download_centers/adv8.png',

            ],
            [
                'title' => 'Case Studies Collection',
                'description' => 'Explore real-world examples of how our solutions have helped clients achieve measurable success. This collection features detailed accounts of challenges faced, strategies implemented, and outcomes delivered across various industries.',
                'file_size' => '7.39 MB',
                'file_extention' => 'PDF ',
                'active' => true,
                'upload_file' => 'assets/downloads/Case_Studies_Collection.pdf',
                'image' => 'uploads/download_centers/adv1.png',

            ],
            [
                'title' => 'Product Features Manual',
                'description' => 'Gain a thorough understanding of our products, including their functionalities and benefits. This manual provides detailed information to help you maximize the value of our tools and implement them effectively.',
                'file_size' => '2.05 MB',
                'file_extention' => 'EXCEL ',
                'active' => true,
                'upload_file' => 'assets/downloads/Product_Features_Manual.xlsx',
                'image' => 'uploads/download_centers/adv4.png',

            ],
            [
                'title' => 'Annual Performance Report',
                'description' => 'Review an in-depth summary of our achievements, financial performance, and strategic milestones over the past year. This report highlights how BTS Consultant has grown and delivered value to its clients and stakeholders.',
                'file_size' => '2.05 MB',
                'file_extention' => 'EXCEL ',
                'active' => true,
                'upload_file' => 'assets/downloads/Annual_Performance_Report.xlsx',
                'image' => 'uploads/download_centers/adv3.png',

            ],
            [
                'title' => 'Onboarding Handbook',
                'description' => 'Access a comprehensive guide for new team members, covering essential information about company policies, tools, and procedures. This handbook ensures a smooth and informed start to your journey with BTS Consultant.',
                'file_size' => '2.05 MB',
                'file_extention' => 'EXCEL ',
                'active' => true,
                'upload_file' => 'assets/downloads/Onboarding_Handbook.xlsx',
                'image' => 'uploads/download_centers/adv5.png',

            ],
            [
                'title' => 'Event Highlights Portfolio',
                'description' => 'Relive the key moments from our recent conferences and events. This portfolio includes detailed summaries, expert insights, and visuals that capture the energy and value of each event, providing inspiration and ideas for future engagements.',
                'file_size' => '2.05 MB',
                'file_extention' => 'EXCEL ',
                'active' => true,
                'upload_file' => 'assets/downloads/Event_Highlights_Portfolio.xlsx',
                'image' => 'uploads/download_centers/adv2.png',

            ]
        ];
        DB::table('download_centers')->insert($DownloadCenter);
    }
}
