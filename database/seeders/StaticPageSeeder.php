<?php

namespace Database\Seeders;

use App\Models\StaticPage;
use Illuminate\Database\Seeder;

class StaticPageSeeder extends Seeder
{
    public function run()
    {


        // id=1
        $staticPage = StaticPage::create([
            "section_name" => "Homepage - methodology content",
            "small_description" => "Our Training Methodology",
            "details" =>"BTS Consultant is a global leader in professional training and consulting, empowering individuals and organizations worldwide. With a passionate team, impactful courses, they deliver innovative programs and certified courses tailored to modern business needs, focusing on leadership, teamwork, and personal development.",
            "details2" =>"uploads/methodology/image1.jpg",
            "details3" =>"uploads/methodology/image2.jpg",
            "details4" =>"uploads/methodology/image3.jpg",
            "details5" =>"Competency-Based Training",
            "details6" =>"uploads/methodology/icon1.jpg",
            "details7" =>"Games-Based Training",
            "details8" =>"uploads/methodology/icon2.jpg",
            "details9" =>"Simulation",
            "details10" =>"uploads/methodology/icon3.jpg",
            "details11" =>"Practical",
            "details12" =>"uploads/methodology/icon4.jpg",
            "active" => false,
        ]);

        // id=2
        $staticPage = StaticPage::create([
            "section_name" => "Homepage - accreditation  content",
            "small_description" => "BTS Accreditation ",
            "details" =>"BTS Consultant is a global leader in professional training and consulting, empowering individuals and organizations worldwide. With a passionate team, impactful courses, they deliver innovative programs and certified courses tailored to modern business needs, focusing on leadership, teamwork, and personal development.",
            "details2" =>"see more",
            "details3" =>"",
            "details4" =>"",
            "details5" =>"",
            "details6" =>"",
            "details7" =>"",
            "details8" =>"",
            "details9" =>"",
            "details10" =>"",
            "active" => false,
        ]);

        // id=3
        $staticPage = StaticPage::create([
            "section_name" => "Homepage - contact us  content",
            "small_description" => "Contact Us ",
            "details" =>"BTS Consultant is a global leader in professional training and consulting, empowering individuals and organizations worldwide. With a passionate team, impactful courses, they deliver innovative programs and certified courses tailored to modern business needs, focusing on leadership, teamwork, and personal development.",
            "details2" =>"",
            "details3" =>"",
            "details4" =>"",
            "details5" =>"",
            "details6" =>"",
            "details7" =>"",
            "details8" =>"",
            "details9" =>"",
            "details10" =>"",
            "active" => false,
        ]);

        // id=4
        $staticPage = StaticPage::create([
            "section_name" => "Homepage - testimonial  content",
            "small_description" => "Testimonial",
            "details" =>"BTS Consultant is a global leader in professional training and consulting, empowering individuals and organizations worldwide. With a passionate team, impactful courses, they deliver innovative programs and certified courses tailored to modern business needs, focusing on leadership, teamwork, and personal development.",
            "details2" =>"see all",
            "details3" =>"",
            "details4" =>"",
            "details5" =>"",
            "details6" =>"",
            "details7" =>"",
            "details8" =>"",
            "details9" =>"",
            "details10" =>"",
            "active" => false,
        ]);
         // id=5
         $staticPage = StaticPage::create([
            'section_name' => 'who_we_are',
            'small_description' => 'We are an international engineering & management training and consulting firm.',
            'details' => 'We have built our reputation on providing innovative solutions and customized training programs to assist...',
            'details2' => 'Our programs impact more than 2500 people...',
            'details3' => 'We offer highly professional services that increase productivity and reduce expenses.',
           'details4' => 'https://www.youtube.com/watch?v=k1gjmzr5Cf4',
            'created_at' => now(),
            'updated_at' => now(),
            "active" => false,
        ]);
       // id=6
       StaticPage::create([
        'section_name' => 'bts target',
        'small_description' => 'Our Vision, Our Mission',
        'details' => 'Our Vision',
        'details2' => 'To consistently deliver excellent training courses and seminars.',
        'details3' => 'Our Mission',
        'details4' => 'Empower clients through innovative learning solutions.',
        'details5' => 'Our Service Quality',
        'details6' => 'BTS places customer satisfaction...',
        'details7' => 'Our Values',
        'details8' => 'Commitment to innovation, excellence...',
        'created_at' => now(),
        'updated_at' => now(),
        'active' => true,
    ]);
    // id=7
    StaticPage::create([
        'section_name' => 'public_training',
        'small_description' => 'Public Training',
        'details' => 'Enhance your expertise and advance your career with public training programs...',
        'details2' => 'uploads/public_training/image1.jpg',
        'details3' => 'uploads/public_training/image1.jpg',
        'details4' => 'https://www.youtube.com/watch?v=k1gjmzr5Cf4',
        'created_at' => now(),
        'updated_at' => now(),
        'active' => true,
    ]); // id=8
    StaticPage::create([
        'section_name' => 'in_house_training',
        'small_description' => 'In-House Training',
        'details' => 'Maximize your team’s potential with in-house training programs tailored to your needs...',
        'details2' => 'uploads/in_house_training/image1.jpg',
        'details3' => 'uploads/in_house_training/image1.jpg',
        'details4' => 'uploads/in_house_training/image1.jpg',
        'created_at' => now(),
        'updated_at' => now(),
        'active' => true,
    ]);
     // id=9
    StaticPage::create([
        'section_name' => 'consultancy',
        'small_description' => 'Consultancy',
        'details' => 'Optimize your business performance with expert consultancy services...',
        'details2' => 'uploads/consultancy/image1.jpg',
        'details3' => 'uploads/consultancy/image1.jpg',
        'created_at' => now(),
        'updated_at' => now(),
        'active' => true,
    ]);
     // id=10
    StaticPage::create([
        'section_name' => 'online_courses',
        'small_description' => 'Online Courses',
        'details' => 'Advance your skills anytime, anywhere with online courses...',
        'details2' => 'uploads/online_courses/image1.jpg',
        'details3' => 'uploads/online_courses/image1.jpg',
        'created_at' => now(),
        'updated_at' => now(),
        'active' => true,
    ]);
    // id = 15
    StaticPage::create([
        'id' => 15,
        'section_name' => 'testimonials_page',
        'small_description' => 'WHAT DO OUR DELEGATES AND CLIENTS SAY ABOUT US?',
        'details' => 'We are always delighted to receive positive comments regarding our courses. Here are some of our many testimonials. Feedback from our clients is most important to us. Client feedback enables us to continuously develop and improve our course offerings based on the experiences and opinions of former course participants. In this section, we would like to share some of the feedback that we have received from individuals and companies. We also share regular updates on our social media pages (Facebook, LinkedIn & Twitter) so please check us out if you want to see more recent updates. The first comments have been made by our open-course delegates who have attended our wide range of courses and the last testimonials are from a few of our clients about the experience they had with us with In-House training.',
        'details2' => 'see all',
        'created_at' => now(),
        'updated_at' => now(),
        'active' => true,
    ]);
    }
}
