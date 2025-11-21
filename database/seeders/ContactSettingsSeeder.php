<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class ContactSettingsSeeder extends Seeder
{
    public function run(): void
    {
        // Contact Page Settings
        $settings = [
            [
                'key' => 'contact_heading',
                'value' => 'Get In Touch',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Page Heading',
                'order' => 1,
            ],
            [
                'key' => 'contact_paragraph',
                'value' => "Have a project in mind? Let's discuss how we can work together to bring your ideas to life.",
                'type' => 'textarea',
                'group' => 'contact',
                'label' => 'Page Description',
                'order' => 2,
            ],
            [
                'key' => 'contact_email',
                'value' => 'ajayupadhyaydevops@gmail.com',
                'type' => 'email',
                'group' => 'contact',
                'label' => 'Email Address',
                'order' => 3,
            ],
            [
                'key' => 'contact_phone',
                'value' => '+91 9717969678',
                'type' => 'phone',
                'group' => 'contact',
                'label' => 'Phone Number',
                'order' => 4,
            ],
            [
                'key' => 'contact_location',
                'value' => 'New Delhi, India',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Location',
                'order' => 5,
            ],
            [
                'key' => 'availability_status',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'contact',
                'label' => 'Available for Projects',
                'order' => 6,
            ],
            [
                'key' => 'availability_text',
                'value' => "I'm currently accepting new opportunities",
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Availability Text',
                'order' => 7,
            ],
            [
                'key' => 'social_section_title',
                'value' => 'Connect With Me',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Social Section Title',
                'order' => 8,
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        // Social Links
        $socialLinks = [
            [
                'name' => 'LinkedIn',
                'url' => 'https://linkedin.com/in/ajay-upadhyay-webdev',
                'icon' => '<svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>',
                'color' => '#0077b5',
                'bg_class' => 'from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'GitHub',
                'url' => 'https://github.com/imajayupadhyay',
                'icon' => '<svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>',
                'color' => '#333333',
                'bg_class' => 'from-gray-50 to-gray-100 dark:from-gray-900/20 dark:to-gray-800/20',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Twitter',
                'url' => 'https://twitter.com',
                'icon' => '<svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>',
                'color' => '#1da1f2',
                'bg_class' => 'from-sky-50 to-sky-100 dark:from-sky-900/20 dark:to-sky-800/20',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Topmate',
                'url' => 'https://topmate.io/ajay_upadhyay_oo7',
                'icon' => '<svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/></svg>',
                'color' => '#10b981',
                'bg_class' => 'from-emerald-50 to-teal-100 dark:from-emerald-900/20 dark:to-teal-800/20',
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($socialLinks as $link) {
            SocialLink::updateOrCreate(
                ['name' => $link['name']],
                $link
            );
        }
    }
}
