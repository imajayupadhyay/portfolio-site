<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;

class CertificationsSeeder extends Seeder
{
    public function run(): void
    {
        $certifications = [
            [
                'title' => 'AWS Certified Developer',
                'level' => 'Associate',
                'code' => 'DVA-C02',
                'provider' => 'Amazon Web Services',
                'badge_image' => '/images/badges/aws-certified-developer-associate copy.png',
                'credential_url' => 'https://www.credly.com/badges/1a1c6387-8fc8-4879-b2f4-96c4bb00a548/public_url',
                'gradient_from' => '#f97316',
                'gradient_to' => '#eab308',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Microsoft Certified',
                'level' => 'Associate',
                'code' => 'Azure Administrator',
                'provider' => 'Microsoft Azure',
                'badge_image' => '/images/badges/microsoft-certified-associate-badge.svg',
                'credential_url' => 'https://learn.microsoft.com/en-us/users/AjayUpadhyay-007/credentials/37149BE839FE215A',
                'gradient_from' => '#3b82f6',
                'gradient_to' => '#06b6d4',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Microsoft Certified',
                'level' => 'Fundamentals',
                'code' => 'Azure Fundamentals',
                'provider' => 'Microsoft Azure',
                'badge_image' => '/images/badges/microsoft-certified-fundamentals-badge.svg',
                'credential_url' => 'https://learn.microsoft.com/en-us/users/ajayupadhyay-007/credentials/74d000841b2147a6',
                'gradient_from' => '#6366f1',
                'gradient_to' => '#a855f7',
                'is_active' => true,
                'order' => 3,
            ],
        ];

        foreach ($certifications as $cert) {
            Certification::updateOrCreate(
                ['title' => $cert['title'], 'code' => $cert['code']],
                $cert
            );
        }
    }
}
