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
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Hero Content
        HeroContent::create([
            'title_line1' => 'Software',
            'title_line2' => 'Engineering &',
            'title_line3' => 'Web Systems',
            'description' => 'Software Engineer with experience in developing and maintaining enterprise web applications using Laravel, PHP, JavaScript, MySQL, and PostgreSQL.',
            'typing_texts' => ['Software Engineer', 'Laravel & Web Developer', 'Full Stack Developer', 'System Architect'],
        ]);

        // About Content
        AboutContent::create([
            'bio' => "Software Engineer with experience in developing and maintaining enterprise web applications using Laravel, PHP, JavaScript, MySQL, and PostgreSQL. Skilled in full-stack web development, database design, RESTful API development, system analysis, and legacy system modernization.\n\nExperienced throughout the software development lifecycle (SDLC), from requirements gathering and system design to testing, deployment, and maintenance. Passionate about building secure, scalable, and maintainable software solutions.",
            'projects_count' => 8,
            'experience_years' => 2,
            'expertise_level' => 'Software Engineer',
            'development_type' => 'Laravel & Web Systems',
        ]);

        // Skills
        $skills = [
            // Backend Development
            ['name' => 'Laravel', 'category' => 'backend', 'proficiency' => 95, 'sort_order' => 1],
            ['name' => 'PHP (Vanilla)', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 2],
            ['name' => 'RESTful API Development', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 3],
            ['name' => 'JSON APIs', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 4],
            ['name' => 'Eloquent ORM', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 5],
            ['name' => 'Authentication & Authorization', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 6],
            ['name' => 'Node.js', 'category' => 'backend', 'proficiency' => 85, 'sort_order' => 7],
            ['name' => 'Express', 'category' => 'backend', 'proficiency' => 85, 'sort_order' => 8],
            ['name' => 'NestJS', 'category' => 'backend', 'proficiency' => 80, 'sort_order' => 9],
            ['name' => 'MVC Architecture', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 10],
            ['name' => 'Object-Oriented Programming (OOP)', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 11],

            // Frontend Development
            ['name' => 'Blade', 'category' => 'frontend', 'proficiency' => 90, 'sort_order' => 1],
            ['name' => 'Livewire', 'category' => 'frontend', 'proficiency' => 90, 'sort_order' => 2],
            ['name' => 'Alpine.js', 'category' => 'frontend', 'proficiency' => 85, 'sort_order' => 3],
            ['name' => 'Tailwind CSS', 'category' => 'frontend', 'proficiency' => 90, 'sort_order' => 4],
            ['name' => 'Bootstrap', 'category' => 'frontend', 'proficiency' => 85, 'sort_order' => 5],
            ['name' => 'JavaScript & TypeScript', 'category' => 'frontend', 'proficiency' => 85, 'sort_order' => 6],
            ['name' => 'React & Vue.js', 'category' => 'frontend', 'proficiency' => 75, 'sort_order' => 7],
            ['name' => 'Inertia.js', 'category' => 'frontend', 'proficiency' => 75, 'sort_order' => 8],
            ['name' => 'HTML5 & CSS3', 'category' => 'frontend', 'proficiency' => 90, 'sort_order' => 9],

            // Databases & GIS
            ['name' => 'MySQL', 'category' => 'database', 'proficiency' => 90, 'sort_order' => 1],
            ['name' => 'PostgreSQL', 'category' => 'database', 'proficiency' => 90, 'sort_order' => 2],
            ['name' => 'Relational Database Design', 'category' => 'database', 'proficiency' => 90, 'sort_order' => 3],
            ['name' => 'Database Migration', 'category' => 'database', 'proficiency' => 90, 'sort_order' => 4],
            ['name' => 'Query Optimization', 'category' => 'database', 'proficiency' => 85, 'sort_order' => 5],
            ['name' => 'Geoserver & OpenLayers (GIS)', 'category' => 'database', 'proficiency' => 80, 'sort_order' => 6],

            // Tools & DevOps
            ['name' => 'Git & GitHub', 'category' => 'tools', 'proficiency' => 90, 'sort_order' => 1],
            ['name' => 'GitLab CI/CD', 'category' => 'tools', 'proficiency' => 85, 'sort_order' => 2],
            ['name' => 'Composer', 'category' => 'tools', 'proficiency' => 90, 'sort_order' => 3],
            ['name' => 'Linux (Ubuntu)', 'category' => 'tools', 'proficiency' => 85, 'sort_order' => 4],
            ['name' => 'PHPUnit', 'category' => 'tools', 'proficiency' => 85, 'sort_order' => 5],
            ['name' => 'Jira (Agile / Scrum)', 'category' => 'tools', 'proficiency' => 85, 'sort_order' => 6],
            ['name' => 'Odoo ERP', 'category' => 'tools', 'proficiency' => 80, 'sort_order' => 7],

            // Networking
            ['name' => 'TCP/IP, DNS & BGP', 'category' => 'networking', 'proficiency' => 85, 'sort_order' => 1],
            ['name' => 'Cisco Routing & Switching', 'category' => 'networking', 'proficiency' => 85, 'sort_order' => 2],
            ['name' => 'Wireshark Packet Analysis', 'category' => 'networking', 'proficiency' => 80, 'sort_order' => 3],
            ['name' => 'Cisco Packet Tracer & GNS3', 'category' => 'networking', 'proficiency' => 85, 'sort_order' => 4],
            ['name' => 'Cybersecurity Awareness', 'category' => 'networking', 'proficiency' => 80, 'sort_order' => 5],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Experiences
        Experience::create([
            'title' => 'Software Engineer',
            'company' => 'IT Madani Expert Sdn Bhd',
            'description' => 'Software Engineer developing and maintaining enterprise web applications using Laravel, PHP, MySQL, and PostgreSQL while modernizing legacy systems and building GIS-based platforms.',
            'responsibilities' => [
                'Developed and maintained procurement and contractor management systems for Lembaga Air Perak (LAP) using Vanilla PHP and MySQL while integrating new features into existing legacy workflows.',
                'Designed and developed a Laravel-based Tadika Alumni & Management System from scratch, implementing role-based access control, authentication, reporting modules, and Excel export functionality.',
                'Managed the complete software development lifecycle including requirements gathering, database design, backend development, testing, debugging, deployment, and production support.',
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
            'description' => 'Designed, developed, and maintained scalable backend services using JavaScript, Node.js, Express, and NestJS.',
            'responsibilities' => [
                'Designed, developed, and maintained scalable backend services using JavaScript, Node.js, Express, and NestJS.',
                'Utilized Git, GitHub, and GitLab CI/CD pipelines to streamline collaborative development and deployment workflows.',
                'Utilized Jira actively for sprint planning, backlog refinement, and daily task tracking, increasing overall delivery transparency within a fast-paced Agile/Scrum team environment.',
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
                'Assisted in website development using HTML, CSS, and JavaScript, ensuring responsive and user friendly design.',
            ],
            'start_date' => '2024-09-01',
            'end_date' => '2025-01-31',
            'is_current' => false,
            'type' => 'internship',
            'sort_order' => 3,
        ]);

        // Projects
        Project::create([
            'title' => 'Payung – Insurance Agent Directory & CRM System',
            'slug' => 'payung-insurance-crm',
            'description' => 'Multi-tenant CRM platform built using Laravel 13, Fortify, Jetstream, and Spatie Permission with automated policy expiration reminders and Livewire reactive interfaces.',
            'technologies' => ['Laravel 13', 'Fortify / Jetstream', 'Livewire', 'Flux UI', 'Tailwind CSS', 'MySQL', 'Spatie Permission'],
            'features' => [
                'Built a multi-tenant CRM platform using Laravel 13, Fortify, Jetstream, and Spatie Permission.',
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
            'description' => 'Reverse-engineered a legacy land management system without access to source code and redesigned the application architecture using Laravel, PostgreSQL, and GIS integrations.',
            'technologies' => ['Laravel 12', 'PostgreSQL', 'Reverse Engineering', 'Geoserver', 'OpenLayers', 'Proj4js', 'Laravel Fortify', 'Spatie'],
            'features' => [
                'Reverse-engineered a legacy land management system without access to source code.',
                'Redesigned the application architecture using Laravel and PostgreSQL.',
                'Implemented GIS functionality using Geoserver, OpenLayers, and Proj4js.',
                'Developed secure authentication and audit logging using Laravel Fortify and Spatie packages.',
                'Analyzed complex business workflows and translated them into maintainable Laravel modules.',
            ],
            'is_featured' => true,
            'sort_order' => 2,
        ]);

        Project::create([
            'title' => 'SPEED System & SPEED Contractor System (LAP)',
            'slug' => 'speed-contractor-system-lap',
            'description' => 'Core procurement and contractor management systems for Lembaga Air Perak (LAP) built using Vanilla PHP and MySQL.',
            'technologies' => ['Vanilla PHP', 'MySQL', 'Procurement Workflows', 'Legacy Integration'],
            'features' => [
                'Contributed to the development and rigorous maintenance of core procurement and contractor management systems for Lembaga Air Perak (LAP).',
                'Implemented custom backend modules, complex database integrations, and legacy workflow enhancements using Vanilla PHP.',
                'Assisted in deep troubleshooting, debugging, and maintaining high-availability production systems to ensure operational stability.',
            ],
            'is_featured' => true,
            'sort_order' => 3,
        ]);

        Project::create([
            'title' => 'Tadika Alumni & Management System',
            'slug' => 'tadika-alumni-management-system',
            'description' => 'Laravel-based alumni management platform featuring role-based authentication, reporting modules, and Excel export functionality.',
            'technologies' => ['Laravel 12', 'MySQL', 'Laravel Breeze', 'Tailwind CSS', 'Bootstrap', 'Alpine.js', 'Laravel Excel', 'PHPUnit'],
            'features' => [
                'Developed a complete alumni management platform with role-based authentication.',
                'Designed responsive interfaces using Blade, Tailwind CSS, Bootstrap, and Alpine.js.',
                'Implemented Excel export functionality using Laravel Excel.',
                'Developed CRUD modules, reporting features, and secure authentication.',
                'Created PHPUnit tests to improve application reliability.',
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
                'Implemented custom CRM features including automated sales pipelines, lead tracking, and seamless HRM integration with ZKTeco biometric devices.',
                'Built interactive dashboards and automated workflows to optimize data reporting and maximize client operational efficiency.',
            ],
            'is_featured' => false,
            'sort_order' => 5,
        ]);

        Project::create([
            'title' => 'Website Development (Odoo)',
            'slug' => 'website-development-odoo',
            'description' => 'Custom membership system and website redesign on the Odoo platform to elevate user engagement and streamline client registration.',
            'technologies' => ['Odoo ERP', 'Python', 'HTML/CSS', 'Website Customization'],
            'features' => [
                'Designed and implemented a custom membership system within Odoo to streamline client registration, multi-tier workflows, and client updates.',
                'Redesigned and deployed the company website using the Odoo platform with modern navigation and mobile optimization to elevate overall user engagement.',
            ],
            'is_featured' => false,
            'sort_order' => 6,
        ]);

        Project::create([
            'title' => 'Web-Based Fishing Pond Operations System',
            'slug' => 'fishing-pond-management-system',
            'description' => 'Booking and inventory management platform built using Laravel, HTML, CSS, and JavaScript to handle staff scheduling and customer operations.',
            'technologies' => ['Laravel', 'MySQL', 'HTML5', 'CSS3', 'JavaScript'],
            'features' => [
                'Designed and developed a booking and inventory management platform using Laravel, HTML, CSS, and JavaScript.',
                'Integrated structural database management and backend logic to safely handle complex staff scheduling and real-time customer operations.',
            ],
            'is_featured' => false,
            'sort_order' => 7,
        ]);

        Project::create([
            'title' => 'Automated Plant Watering System',
            'slug' => 'automated-plant-watering-system',
            'description' => 'Arduino-based IoT prototype for real-time soil moisture monitoring and automated water pump control.',
            'technologies' => ['Arduino Microcontroller', 'IoT', 'C/C++', 'Soil Moisture Sensors'],
            'features' => [
                'Developed hardware components including soil moisture sensors, water pumps, and an Arduino microcontroller for real-time data processing and control.',
                'Programmed the Arduino board using C/C++ to orchestrate the operation of sensors, actuators, and communication protocols with the IoT platform.',
            ],
            'is_featured' => false,
            'sort_order' => 8,
        ]);

        // Services
        $services = [
            [
                'title' => 'Enterprise Laravel Development',
                'icon' => 'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4',
                'description' => 'Building secure and scalable web applications using Laravel, Livewire, Blade, Tailwind CSS, RESTful APIs, and relational databases.',
                'sort_order' => 1,
            ],
            [
                'title' => 'System Modernization & Legacy Migration',
                'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
                'description' => 'Reverse-engineering legacy systems without original documentation, recovering critical business logic, and re-architecting modern web applications.',
                'sort_order' => 2,
            ],
            [
                'title' => 'Database Design & Optimization',
                'icon' => 'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                'description' => 'Designing clean relational database schemas (PostgreSQL/MySQL), writing optimized SQL queries, database migrations, and structuring robust data models for web applications.',
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
            'github_url' => 'https://anymz772.github.io/portfolio/',
        ]);
    }
}
