<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index(): Response
    {
        $projects = [
            [
                'name' => 'HRMS - Human Resource Management System',
                'description' => 'Comprehensive HR management platform with employee tracking, payroll processing, leave management, and performance analytics. Built for scalability and efficiency.',
                'techStack' => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'Tailwind CSS'],
                'githubUrl' => 'https://github.com/imajayupadhyay',
                'detailUrl' => null,
            ],
            [
                'name' => 'Lead Management System',
                'description' => 'Advanced CRM solution for tracking leads, managing sales pipelines, and automating follow-ups. Features real-time analytics and reporting dashboards.',
                'techStack' => ['Laravel', 'Livewire', 'PostgreSQL', 'Chart.js', 'Alpine.js'],
                'githubUrl' => 'https://github.com/imajayupadhyay',
                'detailUrl' => null,
            ],
            [
                'name' => 'Learning Portal',
                'description' => 'Interactive e-learning platform with course management, video streaming, progress tracking, and certification system. Supports multiple user roles and permissions.',
                'techStack' => ['Laravel', 'Vue.js', 'AWS S3', 'FFmpeg', 'MySQL'],
                'githubUrl' => 'https://github.com/imajayupadhyay',
                'detailUrl' => null,
            ],
            [
                'name' => 'E-Commerce Website',
                'description' => 'Full-featured online store with product catalog, shopping cart, payment gateway integration, order tracking, and admin dashboard for inventory management.',
                'techStack' => ['Laravel', 'React', 'Stripe', 'Redis', 'Docker'],
                'githubUrl' => 'https://github.com/imajayupadhyay',
                'detailUrl' => null,
            ],
            [
                'name' => 'Cloud Infrastructure Dashboard',
                'description' => 'Unified monitoring and management dashboard for multi-cloud infrastructure. Provides real-time metrics, cost analysis, and resource optimization recommendations.',
                'techStack' => ['Python', 'Flask', 'AWS SDK', 'Azure SDK', 'MongoDB', 'D3.js'],
                'githubUrl' => 'https://github.com/imajayupadhyay',
                'detailUrl' => null,
            ],
            [
                'name' => 'DevOps CI/CD Pipeline',
                'description' => 'Automated deployment pipeline with containerization, testing, and monitoring. Implements GitOps principles for infrastructure as code.',
                'techStack' => ['Jenkins', 'Docker', 'Kubernetes', 'Terraform', 'GitHub Actions'],
                'githubUrl' => 'https://github.com/imajayupadhyay',
                'detailUrl' => null,
            ],
            [
                'name' => 'API Gateway & Microservices',
                'description' => 'Scalable microservices architecture with API gateway, service discovery, load balancing, and distributed tracing for enterprise applications.',
                'techStack' => ['Node.js', 'Express', 'Kong', 'RabbitMQ', 'PostgreSQL', 'Docker'],
                'githubUrl' => 'https://github.com/imajayupadhyay',
                'detailUrl' => null,
            ],
            [
                'name' => 'Real-Time Chat Application',
                'description' => 'Secure messaging platform with real-time communication, file sharing, group chats, and end-to-end encryption. Supports video and voice calls.',
                'techStack' => ['Laravel', 'Vue.js', 'WebSockets', 'Pusher', 'Redis'],
                'githubUrl' => 'https://github.com/imajayupadhyay',
                'detailUrl' => null,
            ],
            [
                'name' => 'Inventory Management System',
                'description' => 'Smart inventory tracking system with barcode scanning, stock alerts, supplier management, and predictive analytics for demand forecasting.',
                'techStack' => ['Laravel', 'Vue.js', 'MySQL', 'Chart.js', 'Tailwind CSS'],
                'githubUrl' => 'https://github.com/imajayupadhyay',
                'detailUrl' => null,
            ],
        ];

        return Inertia::render('Projects', [
            'projects' => $projects,
        ]);
    }
}
