<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="/favicon.svg">
        <link rel="alternate icon" href="/favicon.svg">
        <link rel="apple-touch-icon" href="/favicon.svg">
        <link rel="mask-icon" href="/favicon.svg" color="#3b82f6">
        <meta name="theme-color" content="#3b82f6">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">

        <!-- SEO Meta Tags -->
        <meta name="description" content="Ajay Upadhyay - Cloud & DevOps Engineer specializing in AWS, Azure, and DigitalOcean. Expert in CI/CD pipelines, infrastructure automation, and scalable cloud solutions with 3+ years of experience.">
        <meta name="keywords" content="Ajay Upadhyay, Cloud Engineer, DevOps Engineer, AWS, Azure, DigitalOcean, CI/CD, Jenkins, GitHub Actions, Azure DevOps, Docker, Kubernetes, Laravel, Full Stack Developer, Infrastructure Automation">
        <meta name="author" content="Ajay Upadhyay">
        <meta name="robots" content="index, follow">

        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="Ajay Upadhyay - Cloud & DevOps Engineer">
        <meta property="og:description" content="Cloud & DevOps Engineer specializing in multi-cloud infrastructure, CI/CD automation, and scalable solutions. AWS, Azure & DigitalOcean expert.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:image" content="{{ config('app.url') }}/images/profile.png">

        <!-- Twitter Card Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Ajay Upadhyay - Cloud & DevOps Engineer">
        <meta name="twitter:description" content="Cloud & DevOps Engineer specializing in multi-cloud infrastructure, CI/CD automation, and scalable solutions.">
        <meta name="twitter:image" content="{{ config('app.url') }}/images/profile.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
