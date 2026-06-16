<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Delicia Restaurant System',
                'slug' => 'delicia-restaurant-system',
                'category' => 'Restaurant Systems',
                'business_type' => 'Restaurant',
                'short_description' => 'Complete restaurant system with online reservations, menu management, and order tracking.',
                'description' => 'Delicia Restaurant System is a business-focused restaurant platform designed to help restaurants manage online reservations, display menus, organize customer requests, and reduce manual coordination.',
                'problem' => 'The restaurant relied on manual booking messages and had no centralized system for tracking reservations, menu updates, and customer inquiries.',
                'solution' => 'Krysalis designed a digital restaurant system with reservation flow, menu management, admin dashboard, and inquiry tracking.',
                'result' => 'The business gained a cleaner customer journey, easier booking management, and a more professional online presence.',
                'features' => 'Reservations, menu management, order tracking, admin dashboard.',
                'is_featured' => true,
                'status' => 'published',
            ],
            [
                'title' => 'BrightCare Clinic System',
                'slug' => 'brightcare-clinic-system',
                'category' => 'Clinic Systems',
                'business_type' => 'Clinic',
                'short_description' => 'Clinic management system with appointments, patient inquiries, and reports.',
                'description' => 'BrightCare Clinic System helps clinics collect appointment requests, organize patient inquiries, and give staff a simple dashboard for daily management.',
                'problem' => 'The clinic needed a more organized way to handle appointment requests and patient inquiries without relying only on phone calls and scattered messages.',
                'solution' => 'Krysalis created a clinic system concept with appointment management, inquiry tracking, and basic reporting.',
                'result' => 'The clinic workflow became easier to understand, with clearer visibility over incoming requests and service demand.',
                'features' => 'Appointments, inquiry tracking, basic patient records, reporting dashboard.',
                'is_featured' => false,
                'status' => 'published',
            ],
            [
                'title' => 'Glam Studio Salon System',
                'slug' => 'glam-studio-salon-system',
                'category' => 'Salon Systems',
                'business_type' => 'Salon',
                'short_description' => 'Salon booking system with staff management, services, and POS integration concept.',
                'description' => 'Glam Studio Salon System is a service-booking platform for salons that need cleaner scheduling, service listings, and staff visibility.',
                'problem' => 'The salon had difficulty tracking appointments, staff schedules, and service inquiries from different channels.',
                'solution' => 'Krysalis built a salon booking system concept with service catalog, staff schedule structure, and admin-side tracking.',
                'result' => 'The business gained a better appointment flow and a more professional customer-facing system.',
                'features' => 'Bookings, staff schedules, service catalog, customer tracking.',
                'is_featured' => false,
                'status' => 'published',
            ],
            [
                'title' => 'Sales Performance Dashboard',
                'slug' => 'sales-performance-dashboard',
                'category' => 'Business Dashboards',
                'business_type' => 'Business',
                'short_description' => 'Custom dashboard for tracking sales, performance, and business metrics.',
                'description' => 'Sales Performance Dashboard gives business owners a clear view of key metrics, summaries, and operational performance.',
                'problem' => 'The business had performance data but no clean dashboard for viewing sales, trends, and progress.',
                'solution' => 'Krysalis created a dashboard concept with KPI cards, sales summaries, and performance sections.',
                'result' => 'The business can understand performance faster and make better operational decisions.',
                'features' => 'KPIs, sales reports, performance summaries, admin controls.',
                'is_featured' => false,
                'status' => 'published',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => $project['slug']],
                $project
            );
        }
    }
}