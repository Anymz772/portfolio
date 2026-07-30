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
            'description' => 'Software Engineer passionate about building secure, scalable web applications using Laravel, PHP, JavaScript, and modern web technologies.',
            'typing_texts' => ['Software Engineer', 'Laravel & Web Developer', 'Full Stack Developer', 'System Architect'],
        ]);

        // About Content
        AboutContent::create([
            'bio' => "Software Engineer with hands-on experience in developing and maintaining enterprise web applications using Laravel, PHP, JavaScript, and MySQL/PostgreSQL. Experienced in building full-stack web solutions, modernizing legacy systems, designing relational databases, and delivering secure, scalable applications for public-sector and business environments. Passionate about writing clean, maintainable code and continuously improving software engineering practices.",
            'projects_count' => 7,
            'experience_years' => 2,
            'expertise_level' => 'Software Engineer',
            'development_type' => 'Laravel & Web Systems',
        ]);

        // Skills
        $skills = [
            // Backend
            ['name' => 'Laravel', 'category' => 'backend', 'proficiency' => 95, 'sort_order' => 1],
            ['name' => 'PHP', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 2],
            ['name' => 'RESTful API Development', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 3],
            ['name' => 'Eloquent ORM', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 4],
            ['name' => 'Authentication & Authorization', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 5],
            ['name' => 'Node.js', 'category' => 'backend', 'proficiency' => 85, 'sort_order' => 6],
            ['name' => 'Express', 'category' => 'backend', 'proficiency' => 85, 'sort_order' => 7],
            ['name' => 'NestJS', 'category' => 'backend', 'proficiency' => 80, 'sort_order' => 8],
            ['name' => 'MVC Architecture', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 9],
            ['name' => 'Object-Oriented Programming', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 10],

            // Frontend
            ['name' => 'Blade', 'category' => 'frontend', 'proficiency' => 90, 'sort_order' => 1],
            ['name' => 'Livewire', 'category' => 'frontend', 'proficiency' => 90, 'sort_order' => 2],
            ['name' => 'Tailwind CSS', 'category' => 'frontend', 'proficiency' => 90, 'sort_order' => 3],
            ['name' => 'Bootstrap', 'category' => 'frontend', 'proficiency' => 85, 'sort_order' => 4],
            ['name' => 'Alpine.js', 'category' => 'frontend', 'proficiency' => 85, 'sort_order' => 5],
            ['name' => 'JavaScript', 'category' => 'frontend', 'proficiency' => 85, 'sort_order' => 6],
            ['name' => 'TypeScript', 'category' => 'frontend', 'proficiency' => 80, 'sort_order' => 7],
            ['name' => 'React', 'category' => 'frontend', 'proficiency' => 75, 'sort_order' => 8],
            ['name' => 'Vue.js', 'category' => 'frontend', 'proficiency' => 75, 'sort_order' => 9],
            ['name' => 'Inertia.js', 'category' => 'frontend', 'proficiency' => 75, 'sort_order' => 10],

            // Database
            ['name' => 'MySQL', 'category' => 'database', 'proficiency' => 90, 'sort_order' => 1],
            ['name' => 'PostgreSQL', 'category' => 'database', 'proficiency' => 90, 'sort_order' => 2],
            ['name' => 'Database Design', 'category' => 'database', 'proficiency' => 90, 'sort_order' => 3],
            ['name' => 'Database Migration', 'category' => 'database', 'proficiency' => 90, 'sort_order' => 4],
            ['name' => 'Query Optimization', 'category' => 'database', 'proficiency' => 85, 'sort_order' => 5],

            // Tools
            ['name' => 'Git', 'category' => 'tools', 'proficiency' => 90, 'sort_order' => 1],
            ['name' => 'GitHub', 'category' => 'tools', 'proficiency' => 90, 'sort_order' => 2],
            ['name' => 'GitLab CI/CD', 'category' => 'tools', 'proficiency' => 85, 'sort_order' => 3],
            ['name' => 'Composer', 'category' => 'tools', 'proficiency' => 90, 'sort_order' => 4],
            ['name' => 'Linux (Ubuntu)', 'category' => 'tools', 'proficiency' => 85, 'sort_order' => 5],
            ['name' => 'PHPUnit', 'category' => 'tools', 'proficiency' => 85, 'sort_order' => 6],
            ['name' => 'Jira', 'category' => 'tools', 'proficiency' => 85, 'sort_order' => 7],
            ['name' => 'Odoo ERP', 'category' => 'tools', 'proficiency' => 80, 'sort_order' => 8],

            // Networking
            ['name' => 'TCP/IP & Network Protocols', 'category' => 'networking', 'proficiency' => 85, 'sort_order' => 1],
            ['name' => 'Cisco Routing & Switching (CCNA/CCNP)', 'category' => 'networking', 'proficiency' => 85, 'sort_order' => 2],
            ['name' => 'Cybersecurity & CTF Challenges', 'category' => 'networking', 'proficiency' => 80, 'sort_order' => 3],
            ['name' => 'Wireshark Packet Analysis', 'category' => 'networking', 'proficiency' => 80, 'sort_order' => 4],
            ['name' => 'Cisco Packet Tracer & GNS3', 'category' => 'networking', 'proficiency' => 85, 'sort_order' => 5],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Experiences
        Experience::create([
            'title' => 'Software Engineer',
            'company' => 'IT Madani Expert Sdn Bhd',
            'description' => 'Developing and maintaining enterprise web applications using Laravel, PHP, MySQL, and PostgreSQL while modernizing legacy systems and building scalable business solutions.',
            'responsibilities' => [
                'Involved in development and maintenance of procurement and contractor management systems using Vanilla PHP for Lembaga Air Perak (LAP).',
                'Designed and developed a nationwide Tadika Alumni & Management System using Laravel, MySQL, Laravel Breeze, and Maatwebsite Excel.',
                'Performed reverse engineering on a legacy public-sector PLGS system by analysing existing database structures and business workflows to support redevelopment using Laravel and PostgreSQL.',
                'Managed full SDLC including database design, system analysis, debugging, automated testing, and deployment.',
            ],
            'start_date' => '2026-01-01',
            'is_current' => true,
            'type' => 'job',
            'sort_order' => 1,
        ]);

        Experience::create([
            'title' => 'Junior Software Engineer',
            'company' => 'Carsome (K-Youth Program)',
            'description' => 'Designed, developed, and maintained scalable backend microservices using Node.js, Express, and NestJS.',
            'responsibilities' => [
                'Designed, developed, and maintained scalable backend services using JavaScript, Node.js, Express, and NestJS.',
                'Leveraged Git, GitHub, and GitLab CI/CD pipelines to streamline sprint development and automated testing environments.',
                'Utilized Jira actively for sprint planning, backlog refinement, and daily Agile/Scrum task tracking.',
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
                'Developed and enhanced CRM and HRM modules in Odoo (lead management, sales tracking, ZKTeco biometric attendance).',
                'Designed workflow diagrams and system documentation to improve usability and training.',
                'Assisted in website development using HTML, CSS, and JavaScript ensuring responsive design.',
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
            'description' => 'Dual-facing directory and CRM portal with multi-tenant role security, Livewire 4.3 reactive UI, and automated background policy expiration alerts.',
            'technologies' => ['Laravel 13.7 (PHP 8.3)', 'Laravel Fortify/Jetstream', 'Livewire 4.3', 'Flux UI', 'Tailwind CSS 4.0', 'MySQL', 'Spatie'],
            'features' => [
                'Role-Based Access Control using Spatie Permission',
                'Real-Time Customer Lead Routing & Quotation Interface',
                'Automated Policy Expiration Notifications using Laravel Scheduler',
                'Bulk Data Ingestion & Spreadsheet Migration Engine',
            ],
            'is_featured' => true,
            'sort_order' => 1,
        ]);

        Project::create([
            'title' => 'PLGS System Modernization & Re-engineering',
            'slug' => 'plgs-system-modernization',
            'description' => 'Reverse-engineered critical legacy public-sector PLGS system without original source code. Architected modernized base system with Laravel and PostgreSQL.',
            'technologies' => ['Laravel 12 (PHP 8.2)', 'Postgres 18', 'Reverse Engineering', 'Bootstrap 5', 'Spatie ACL', 'Geoserver / OpenLayers'],
            'features' => [
                'Legacy Database Analysis & Business Logic Recovery',
                'Fine-Grained Spatie Access Control & Audit Trails',
                'Modernized Responsive Interface with Dayone Spruko',
                'Optional GIS Coordinate System Integrations',
            ],
            'is_featured' => true,
            'sort_order' => 2,
        ]);

        Project::create([
            'title' => 'Tadika Alumni & Management System',
            'slug' => 'tadika-alumni-management-system',
            'description' => 'Laravel-based alumni management platform featuring role-based authentication, reporting modules, and Excel export functionality.',
            'technologies' => ['Laravel 12 (PHP 8.2)', 'MySQL', 'Laravel Breeze', 'Tailwind CSS', 'Alpine.js', 'Maatwebsite/Excel', 'PHPUnit'],
            'features' => [
                'Role-Based Access Control (Admin & Alumni)',
                'Dynamic Reporting & Maatwebsite Excel Export',
                'PHPUnit Automated Testing Workflow',
                'Responsive UI using Blade, Alpine.js and Tailwind CSS',
            ],
            'is_featured' => true,
            'sort_order' => 3,
        ]);

        Project::create([
            'title' => 'SPEED System & SPEED Contractor System (LAP)',
            'slug' => 'speed-contractor-system-lap',
            'description' => 'Core procurement and contractor management systems for Lembaga Air Perak (LAP).',
            'technologies' => ['Vanilla PHP', 'MySQL', 'Procurement Workflows', 'Legacy Integration'],
            'features' => [
                'Procurement & Contractor Management Workflows',
                'Custom Vanilla PHP Backend Modules',
                'Database Integration with Existing Enterprise Legacy Systems',
                'High-Availability Production Stability Maintenance',
            ],
            'is_featured' => true,
            'sort_order' => 4,
        ]);

        Project::create([
            'title' => 'CRM & Biometric Attendance Module (Odoo)',
            'slug' => 'crm-biometric-attendance-odoo',
            'description' => 'Custom Odoo CRM & HRM features including automated sales pipelines and ZKTeco biometric device integration.',
            'technologies' => ['Odoo ERP', 'Python', 'ZKTeco Biometric', 'HRM & CRM'],
            'features' => [
                'Automated Sales Pipelines & Lead Tracking',
                'ZKTeco Biometric Device HRM Integration',
                'Interactive Data Reporting Dashboards',
                'Custom Membership & Client Update Workflows',
            ],
            'is_featured' => false,
            'sort_order' => 5,
        ]);

        Project::create([
            'title' => 'Web-Based Fishing Pond Operations System',
            'slug' => 'fishing-pond-management-system',
            'description' => 'Booking and inventory management platform using Laravel, handling staff scheduling and customer operations.',
            'technologies' => ['Laravel', 'MySQL', 'HTML5', 'CSS3', 'JavaScript'],
            'features' => [
                'Booking & Inventory Management Engine',
                'Complex Staff Scheduling Management',
                'Real-Time Customer Operation Workflows',
                'Structured Database Architecture',
            ],
            'is_featured' => false,
            'sort_order' => 6,
        ]);

        Project::create([
            'title' => 'Automated Plant Watering System',
            'slug' => 'automated-plant-watering-system',
            'description' => 'Arduino-based IoT prototype for real-time soil moisture monitoring and automated water pump control.',
            'technologies' => ['Arduino Microcontroller', 'IoT', 'C/C++', 'Soil Moisture Sensors'],
            'features' => [
                'Soil Moisture Sensor Hardware Integration',
                'Automated Water Pump Actuator Control',
                'C/C++ Arduino Board Programming',
                'IoT Platform Data Communication',
            ],
            'is_featured' => false,
            'sort_order' => 7,
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
            'linkedin_url' => 'https://linkedin.com/in/hakimnizam772',
            'github_url' => 'https://github.com/hakimnizam772',
        ]);
    }
}
