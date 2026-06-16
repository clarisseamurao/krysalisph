<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Website Creation',
                'slug' => 'website-creation',
                'short_description' => 'Premium business websites designed to explain your offer clearly and convert visitors into serious inquiries.',
                'description' => 'A complete business website built with clean design, clear messaging, responsive layout, and conversion-focused sections.',
                'starting_price' => 'Starts at ₱15,000',
                'timeline' => '2–4 weeks',
                'is_featured' => true,
                'status' => 'published',
            ],
            [
                'title' => 'Booking System',
                'slug' => 'booking-system',
                'short_description' => 'A custom booking flow that lets customers request services, choose preferred schedules, and submit details easily.',
                'description' => 'A service request and booking system built around your business process, including admin management for incoming requests.',
                'starting_price' => 'Starts at ₱20,000',
                'timeline' => '3–5 weeks',
                'is_featured' => true,
                'status' => 'published',
            ],
            [
                'title' => 'Business Dashboard',
                'slug' => 'business-dashboard',
                'short_description' => 'A private dashboard for managing inquiries, bookings, projects, services, and basic business summaries.',
                'description' => 'An admin dashboard that helps owners and staff manage digital operations without depending on spreadsheets.',
                'starting_price' => 'Starts at ₱25,000',
                'timeline' => '3–6 weeks',
                'is_featured' => true,
                'status' => 'published',
            ],
            [
                'title' => 'Automation System',
                'slug' => 'automation-system',
                'short_description' => 'Simple automation tools that reduce repetitive work, organize requests, and improve customer follow-up.',
                'description' => 'Automation features may include inquiry routing, status tracking, email notifications, reminders, and admin workflows.',
                'starting_price' => 'Custom Quote',
                'timeline' => 'Depends on scope',
                'is_featured' => true,
                'status' => 'published',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}