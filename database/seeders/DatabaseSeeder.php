<?php

namespace Database\Seeders;

use App\Models\AboutContent;
use App\Models\ContactInformation;
use App\Models\Experience;
use App\Models\HeroContent;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Hero Content
        HeroContent::create([
            'title_line1' => 'Build',
            'title_line2' => 'Digital',
            'title_line3' => 'Solutions',
            'description' => 'I build scalable web applications, backend systems, and modern digital experiences using Laravel, PHP, JavaScript, and modern web technologies.',
            'typing_texts' => ['Software Engineer', 'Laravel Developer', 'Backend Developer', 'Network Enthusiast'],
        ]);

        // About Content
        AboutContent::create([
            'bio' => "Hi, I'm Muhammad Aiman Hakim.\n\nA software engineer passionate about creating scalable backend systems, elegant web applications, and solving real-world problems using modern technologies.\n\nI enjoy working with Laravel, PHP, MySQL, JavaScript, Tailwind CSS, REST APIs, and cloud technologies while continuously learning new frameworks and best practices.",
            'projects_count' => 10,
            'experience_years' => 2,
            'expertise_level' => 'Laravel Expert',
            'development_type' => 'Full Stack',
        ]);

        // Skills
        $skills = [
            // Backend
            ['name' => 'Laravel', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 1],
            ['name' => 'PHP', 'category' => 'backend', 'proficiency' => 85, 'sort_order' => 2],
            ['name' => 'REST API', 'category' => 'backend', 'proficiency' => 85, 'sort_order' => 3],
            ['name' => 'MySQL', 'category' => 'backend', 'proficiency' => 80, 'sort_order' => 4],
            ['name' => 'PostgreSQL', 'category' => 'backend', 'proficiency' => 75, 'sort_order' => 5],
            ['name' => 'Prisma', 'category' => 'backend', 'proficiency' => 70, 'sort_order' => 6],
            ['name' => 'Node.js', 'category' => 'backend', 'proficiency' => 65, 'sort_order' => 7],

            // Frontend
            ['name' => 'HTML', 'category' => 'frontend', 'proficiency' => 90, 'sort_order' => 1],
            ['name' => 'CSS', 'category' => 'frontend', 'proficiency' => 85, 'sort_order' => 2],
            ['name' => 'JavaScript', 'category' => 'frontend', 'proficiency' => 80, 'sort_order' => 3],
            ['name' => 'Tailwind CSS', 'category' => 'frontend', 'proficiency' => 85, 'sort_order' => 4],
            ['name' => 'Bootstrap', 'category' => 'frontend', 'proficiency' => 75, 'sort_order' => 5],
            ['name' => 'Vue.js', 'category' => 'frontend', 'proficiency' => 60, 'sort_order' => 6],

            // Tools
            ['name' => 'Git', 'category' => 'tools', 'proficiency' => 85, 'sort_order' => 1],
            ['name' => 'Docker', 'category' => 'tools', 'proficiency' => 65, 'sort_order' => 2],
            ['name' => 'Postman', 'category' => 'tools', 'proficiency' => 80, 'sort_order' => 3],
            ['name' => 'VS Code', 'category' => 'tools', 'proficiency' => 90, 'sort_order' => 4],
            ['name' => 'Figma', 'category' => 'tools', 'proficiency' => 60, 'sort_order' => 5],
            ['name' => 'Linux', 'category' => 'tools', 'proficiency' => 70, 'sort_order' => 6],

            // Networking
            ['name' => 'Cisco', 'category' => 'networking', 'proficiency' => 70, 'sort_order' => 1],
            ['name' => 'TCP/IP', 'category' => 'networking', 'proficiency' => 80, 'sort_order' => 2],
            ['name' => 'DNS', 'category' => 'networking', 'proficiency' => 75, 'sort_order' => 3],
            ['name' => 'LAN/WAN', 'category' => 'networking', 'proficiency' => 75, 'sort_order' => 4],
            ['name' => 'Network Security', 'category' => 'networking', 'proficiency' => 65, 'sort_order' => 5],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Experiences
        Experience::create([
            'title' => 'Programmer',
            'company' => 'Madani IT Experts Sdn Bhd',
            'description' => 'Building and maintaining Laravel applications with focus on backend development and database design.',
            'responsibilities' => [
                'Build Laravel applications',
                'Backend Development',
                'Database Design',
                'API Integration',
            ],
            'start_date' => '2024-01-01',
            'is_current' => true,
            'type' => 'job',
            'sort_order' => 1,
        ]);

        Experience::create([
            'title' => 'Internship',
            'company' => 'Novutal Consulting',
            'description' => 'Worked on CRM development and NFC attendance system integration.',
            'responsibilities' => [
                'CRM Development',
                'Odoo',
                'Laravel',
                'NFC Attendance System',
                'Device Integration',
            ],
            'start_date' => '2023-06-01',
            'end_date' => '2023-12-31',
            'type' => 'internship',
            'sort_order' => 2,
        ]);

        // Projects
        Project::create([
            'title' => 'Alumni Management System',
            'slug' => 'alumni-management-system',
            'description' => 'A comprehensive system for managing alumni data, events, and communications.',
            'technologies' => ['Laravel 12', 'MySQL', 'Tailwind CSS', 'Breeze Authentication'],
            'features' => ['Alumni Directory', 'Event Management', 'Communication Tools'],
            'is_featured' => true,
            'sort_order' => 1,
        ]);

        Project::create([
            'title' => 'Family Memories Web App',
            'slug' => 'family-memories-web-app',
            'description' => 'A digital platform for preserving and sharing family memories with secure vault and QR sharing.',
            'technologies' => ['Laravel', 'MySQL', 'Tailwind CSS', 'QR Code'],
            'features' => ['Digital Memory Timeline', 'Secret Vault', 'QR Sharing', 'Love Letters', 'Memory Gallery'],
            'is_featured' => true,
            'sort_order' => 2,
        ]);

        Project::create([
            'title' => 'Procurement Management System',
            'slug' => 'procurement-management-system',
            'description' => 'Government procurement planning system with approval workflow and dashboard.',
            'technologies' => ['Laravel', 'MySQL', 'Bootstrap', 'Chart.js'],
            'features' => ['Procurement Planning', 'Approval Workflow', 'Dashboard', 'Reporting'],
            'is_featured' => true,
            'sort_order' => 3,
        ]);

        // Services
        $services = [
            [
                'title' => 'Laravel Development',
                'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                'description' => 'Custom Laravel applications with clean architecture and best practices.',
                'sort_order' => 1,
            ],
            [
                'title' => 'Backend APIs',
                'icon' => 'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                'description' => 'Robust and scalable RESTful APIs for web and mobile applications.',
                'sort_order' => 2,
            ],
            [
                'title' => 'Database Design',
                'icon' => 'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4',
                'description' => 'Efficient database architecture and optimization for performance.',
                'sort_order' => 3,
            ],
            [
                'title' => 'Website Development',
                'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                'description' => 'Modern, responsive websites with great user experience.',
                'sort_order' => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Testimonials
        Testimonial::create([
            'client_name' => 'Ahmad Faiz',
            'client_position' => 'CEO',
            'client_company' => 'Tech Solutions',
            'content' => 'Aiman delivered an outstanding Laravel application for our company. His attention to detail and clean code architecture exceeded our expectations.',
            'rating' => 5,
            'sort_order' => 1,
        ]);

        Testimonial::create([
            'client_name' => 'Sarah Lee',
            'client_position' => 'Project Manager',
            'client_company' => 'Digital Ventures',
            'content' => 'Working with Aiman was a great experience. He built a robust backend system that scaled perfectly with our growing user base.',
            'rating' => 5,
            'sort_order' => 2,
        ]);

        // Contact Information
        ContactInformation::create([
            'email' => 'aimanhakim.dev@gmail.com',
            'phone' => '+60 12-345-6789',
            'location' => 'Kuala Lumpur, Malaysia',
            'linkedin_url' => 'https://linkedin.com/in/aimanhakim',
            'github_url' => 'https://github.com/aimanhakim',
        ]);
    }
}
