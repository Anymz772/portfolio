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
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Truncate existing tables to avoid duplicate entries when re-seeding
        User::truncate();
        HeroContent::truncate();
        AboutContent::truncate();
        Skill::truncate();
        Experience::truncate();
        Project::truncate();
        Service::truncate();
        Testimonial::truncate();
        ContactInformation::truncate();

        // Admin User
        User::create([
            'name' => 'Aiman Hakim',
            'email' => 'aiman@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Hero Content (Grounded & Professional)
        HeroContent::create([
            'title_line1' => 'Software',
            'title_line2' => 'Engineering &',
            'title_line3' => 'Web Systems',
            'description' => 'Software Engineer with practical experience in developing and maintaining enterprise web applications using Laravel, PHP, MySQL, and PostgreSQL.',
            'typing_texts' => ['Software Engineer', 'Laravel & Web Developer', 'Backend Developer', 'Full Stack Developer'],
        ]);

        // About Content
        AboutContent::create([
            'bio' => "Software Engineer with experience in developing and maintaining enterprise web applications using Laravel, PHP, JavaScript, MySQL, and PostgreSQL. Skilled in web application development, database design, system analysis, and legacy system modernization.\n\nExperienced throughout the software development lifecycle (SDLC), from requirements gathering and system design to testing, deployment, and maintenance. Passionate about building secure, scalable, and maintainable software solutions.",
            'projects_count' => 8,
            'experience_years' => 2,
            'expertise_level' => 'Software Engineer',
            'development_type' => 'Laravel & Web Systems',
        ]);

        // Skills
        $skills = [
            // Backend Development
            ['name' => 'Laravel', 'category' => 'backend', 'sort_order' => 1],
            ['name' => 'PHP (Vanilla / 8.x)', 'category' => 'backend', 'sort_order' => 2],
            ['name' => 'Eloquent ORM', 'category' => 'backend', 'sort_order' => 3],
            ['name' => 'Authentication & Authorization (Breeze/Spatie)', 'category' => 'backend', 'sort_order' => 4],
            ['name' => 'MVC Architecture', 'category' => 'backend', 'sort_order' => 5],
            ['name' => 'Object-Oriented Programming (OOP)', 'category' => 'backend', 'sort_order' => 6],
            ['name' => 'Node.js & Express', 'category' => 'backend', 'sort_order' => 7],
            ['name' => 'NestJS', 'category' => 'backend', 'sort_order' => 8],

            // Frontend Development
            ['name' => 'Blade Templates', 'category' => 'frontend', 'sort_order' => 1],
            ['name' => 'Livewire', 'category' => 'frontend', 'sort_order' => 2],
            ['name' => 'Tailwind CSS', 'category' => 'frontend', 'sort_order' => 3],
            ['name' => 'Alpine.js', 'category' => 'frontend', 'sort_order' => 4],
            ['name' => 'Bootstrap 5', 'category' => 'frontend', 'sort_order' => 5],
            ['name' => 'JavaScript', 'category' => 'frontend', 'sort_order' => 6],
            ['name' => 'HTML5 & CSS3', 'category' => 'frontend', 'sort_order' => 7],

            // Databases & GIS
            ['name' => 'MySQL', 'category' => 'database', 'sort_order' => 1],
            ['name' => 'PostgreSQL', 'category' => 'database', 'sort_order' => 2],
            ['name' => 'Relational Database Design', 'category' => 'database', 'sort_order' => 3],
            ['name' => 'Database Migrations & Seeding', 'category' => 'database', 'sort_order' => 4],
            ['name' => 'Geoserver & OpenLayers (GIS)', 'category' => 'database', 'sort_order' => 5],

            // Tools & DevOps
            ['name' => 'Git & GitHub', 'category' => 'tools', 'sort_order' => 1],
            ['name' => 'GitLab CI/CD', 'category' => 'tools', 'sort_order' => 2],
            ['name' => 'Composer', 'category' => 'tools', 'sort_order' => 3],
            ['name' => 'Linux (Ubuntu)', 'category' => 'tools', 'sort_order' => 4],
            ['name' => 'PHPUnit Testing', 'category' => 'tools', 'sort_order' => 5],
            ['name' => 'Jira (Agile / Scrum)', 'category' => 'tools', 'sort_order' => 6],
            ['name' => 'Odoo ERP', 'category' => 'tools', 'sort_order' => 7],

            // Networking
            ['name' => 'TCP/IP, DNS & BGP', 'category' => 'networking', 'sort_order' => 1],
            ['name' => 'Cisco Routing & Switching', 'category' => 'networking', 'sort_order' => 2],
            ['name' => 'Wireshark Packet Analysis', 'category' => 'networking', 'sort_order' => 3],
            ['name' => 'Cisco Packet Tracer & GNS3', 'category' => 'networking', 'sort_order' => 4],
            ['name' => 'Cybersecurity Awareness', 'category' => 'networking', 'sort_order' => 5],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Experiences
        Experience::create([
            'title' => 'Software Engineer',
            'company' => 'IT Madani Expert Sdn Bhd',
            'description' => 'Software Engineer developing and maintaining enterprise web applications using Laravel, PHP, MySQL, and PostgreSQL while modernizing legacy systems.',
            'responsibilities' => [
                'Developed and maintained procurement and contractor management systems for Lembaga Air Perak (LAP) using Vanilla PHP and MySQL while integrating new features into existing legacy workflows.',
                'Designed and developed a Laravel-based Tadika Alumni & Management System, implementing role-based access control, authentication, reporting modules, and Excel export functionality.',
                'Managed key parts of the software development lifecycle including database design, backend development, testing, debugging, and deployment support.',
                'Performed reverse engineering on a legacy PLGS system without source code by analyzing live PostgreSQL databases and existing business workflows.',
                'Contributed to the redevelopment of the PLGS platform using Laravel, PostgreSQL, Geoserver, OpenLayers, and Proj4js to support modern GIS-based land management.',
            ],
            'start_date' => '2026-01-01',
            'is_current' => true,
            'type' => 'job',
            'sort_order' => 1,
        ]);

        Experience::create([
            'title' => 'Junior Software Engineer',
            'company' => 'Carsome (K-Youth Program)',
            'description' => 'Designed, developed, and maintained backend services using JavaScript, Node.js, Express, and NestJS.',
            'responsibilities' => [
                'Designed, developed, and maintained backend services using JavaScript, Node.js, Express, and NestJS.',
                'Utilized Git, GitHub, and GitLab CI/CD pipelines to streamline collaborative development and deployment workflows.',
                'Participated actively in sprint planning, backlog refinement, and daily task tracking within a fast-paced Agile/Scrum team environment.',
            ],
            'start_date' => '2025-05-01',
            'end_date' => '2025-10-31',
            'is_current' => false,
            'type' => 'job',
            'sort_order' => 2,
        ]);

        Experience::create([
            'title' => 'Internship',
            'company' => 'Novutal Consulting Sdn Bhd',
            'description' => 'Developed CRM and HRM modules in Odoo, including lead management, sales tracking, and biometric attendance integration.',
            'responsibilities' => [
                'Developed and enhanced CRM and HRM modules in Odoo (lead management, sales tracking, biometric attendance).',
                'Designed workflow diagrams and system documentation to improve usability and training.',
                'Assisted in website development using HTML, CSS, and JavaScript, ensuring responsive design.',
            ],
            'start_date' => '2024-09-01',
            'end_date' => '2025-01-31',
            'is_current' => false,
            'type' => 'internship',
            'sort_order' => 3,
        ]);

        // Projects
        Project::create([
            'title' => 'Payung – Insurance Agent Directory & CRM',
            'slug' => 'payung-insurance-crm',
            'description' => 'Multi-tenant CRM platform built with Laravel 12, Fortify, and Jetstream, featuring automated policy expiration schedulers and reactive Livewire UI.',
            'technologies' => ['Laravel', 'Livewire', 'Tailwind CSS', 'MySQL', 'Flux UI'],
            'features' => [
                'Built a multi-tenant CRM platform using Laravel, Fortify, Jetstream, and Spatie Permission.',
                'Developed responsive interfaces using Livewire, Flux UI, and Tailwind CSS.',
                'Implemented automated schedulers for insurance policy expiration reminders.',
                'Built secure Excel import pipelines for bulk customer and policy data migration.',
                'Designed role-based authentication and authorization with multi-factor authentication support.',
            ],
            'is_featured' => true,
            'sort_order' => 1,
        ]);

        Project::create([
            'title' => 'PLGS System Modernization & Re-engineering',
            'slug' => 'plgs-system-modernization',
            'description' => 'Modernized a legacy land management system by analyzing live database structures and re-architecting the application using Laravel, PostgreSQL, and GIS mapping.',
            'technologies' => ['Laravel', 'PostgreSQL', 'OpenLayers', 'Geoserver', 'Spatie'],
            'features' => [
                'Analyzed live database structures for a legacy land management system without original source access.',
                'Re-architected the application using Laravel and PostgreSQL.',
                'Implemented GIS functionality using Geoserver, OpenLayers, and Proj4js.',
                'Developed secure authentication and audit logging using Laravel Fortify and Spatie packages.',
                'Translated complex business workflows into maintainable Laravel modules.',
            ],
            'is_featured' => true,
            'sort_order' => 2,
        ]);

        Project::create([
            'title' => 'SPEED System (LAP)',
            'slug' => 'speed-contractor-system-lap',
            'description' => 'Procurement and contractor management systems developed for Lembaga Air Perak (LAP), implementing custom backend modules and legacy database workflows.',
            'technologies' => ['Vanilla PHP', 'MySQL', 'Database Migration'],
            'features' => [
                'Contributed to procurement and contractor management systems for Lembaga Air Perak (LAP).',
                'Implemented custom backend modules and legacy database workflow enhancements using Vanilla PHP.',
                'Assisted in troubleshooting, debugging, and maintaining production systems for operational stability.',
            ],
            'is_featured' => true,
            'sort_order' => 3,
        ]);

        Project::create([
            'title' => 'Tadika Alumni & Management System',
            'slug' => 'tadika-alumni-management-system',
            'description' => 'Laravel-based alumni management platform featuring role-based authentication, reporting modules, and Excel export functionality.',
            'technologies' => ['Laravel', 'MySQL', 'Laravel Breeze', 'Tailwind CSS', 'Bootstrap', 'Alpine.js', 'Laravel Excel', 'PHPUnit'],
            'features' => [
                'Developed an alumni management platform with role-based authentication.',
                'Designed responsive interfaces using Blade, Tailwind CSS, Bootstrap, and Alpine.js.',
                'Implemented Excel export functionality using Laravel Excel.',
                'Developed CRUD modules, reporting features, and secure authentication.',
                'Created PHPUnit tests to verify core features.',
            ],
            'is_featured' => true,
            'sort_order' => 4,
        ]);

        Project::create([
            'title' => 'CRM & Biometric Attendance Module (Odoo)',
            'slug' => 'crm-biometric-attendance-odoo',
            'description' => 'Custom Odoo CRM & HRM features including automated sales pipelines, lead tracking, and ZKTeco biometric device integration.',
            'technologies' => ['Odoo ERP', 'Python', 'ZKTeco Biometric', 'HRM & CRM'],
            'features' => [
                'Implemented custom CRM features including automated sales pipelines, lead tracking, and biometric attendance device integration.',
                'Built data reporting dashboards to assist daily business operations.',
            ],
            'is_featured' => false,
            'sort_order' => 5,
        ]);

        Project::create([
            'title' => 'Website Development (Odoo)',
            'slug' => 'website-development-odoo',
            'description' => 'Custom membership system and website redesign on the Odoo platform.',
            'technologies' => ['Odoo ERP', 'Python', 'HTML/CSS'],
            'features' => [
                'Designed and implemented a membership workflow within Odoo to streamline client registrations.',
                'Redesigned and deployed the company website using Odoo with mobile optimization.',
            ],
            'is_featured' => false,
            'sort_order' => 6,
        ]);

        Project::create([
            'title' => 'Web-Based Fishing Pond Operations System',
            'slug' => 'fishing-pond-management-system',
            'description' => 'Booking and operations management platform built using Laravel, HTML, CSS, and JavaScript.',
            'technologies' => ['Laravel', 'MySQL', 'HTML5', 'CSS3', 'JavaScript'],
            'features' => [
                'Designed and developed a booking platform using Laravel, HTML, CSS, and JavaScript.',
                'Implemented database schema and business logic for staff scheduling and customer records.',
            ],
            'is_featured' => false,
            'sort_order' => 7,
        ]);

        Project::create([
            'title' => 'Automated Plant Watering System',
            'slug' => 'automated-plant-watering-system',
            'description' => 'Arduino-based IoT prototype for real-time soil moisture monitoring and automated water pump control.',
            'technologies' => ['Arduino', 'IoT', 'C/C++', 'Sensors'],
            'features' => [
                'Developed hardware components including soil moisture sensors, water pumps, and an Arduino microcontroller.',
                'Programmed the board using C/C++ to read sensor inputs and trigger pump automation.',
            ],
            'is_featured' => false,
            'sort_order' => 8,
        ]);

        // Services (Grounded & Aligned)
        $services = [
            [
                'title' => 'Enterprise Laravel Development',
                'icon' => 'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4',
                'description' => 'Building secure and responsive web applications using Laravel, Livewire, Blade, Tailwind CSS, Spatie role security, and relational databases.',
                'sort_order' => 1,
            ],
            [
                'title' => 'System Modernization & Legacy Migration',
                'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                'description' => 'Reverse-engineering legacy systems without original documentation, recovering critical business logic, and re-architecting modern web applications.',
                'sort_order' => 2,
            ],
            [
                'title' => 'Database Design & Management',
                'icon' => 'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                'description' => 'Designing clean relational schemas in PostgreSQL and MySQL, managing automated migrations, and structuring reliable data models for web applications.',
                'sort_order' => 3,
            ],
            [
                'title' => 'Custom Web & Business Applications',
                'icon' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7',
                'description' => 'Building tailored web portals, CRM systems, role-based admin panels, and automated Excel reporting tools designed to streamline daily business operations.',
                'sort_order' => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Contact Information
        ContactInformation::create([
            'email' => 'hakimnizam772@gmail.com',
            'phone' => '011-51468013',
            'location' => 'Sungai Siput (U), Perak',
            'portfolio_url' => 'https://aimanhakim.homes/',
            'github_url' => 'https://github.com/anymz772',
        ]);
    }
}
