<template>
    <section id="experience" class="relative py-20 overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0 bg-gradient-to-b from-white via-gray-50 to-white dark:from-gray-900 dark:via-gray-800 dark:to-gray-900"></div>

        <!-- Decorative Elements -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 left-10 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl animate-float-delayed"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-block mb-4 animate-fade-in-up">
                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-600/10 to-purple-600/10 border border-blue-600/20 text-sm font-medium text-blue-600 dark:text-blue-400">
                        <BriefcaseIcon class="w-4 h-4 mr-2" />
                        Professional Journey
                    </span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-4 animate-fade-in-up" style="animation-delay: 0.1s">
                    Work Experience
                </h2>
                <p class="text-base sm:text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">
                    Building scalable cloud solutions and driving digital transformation
                </p>
            </div>

            <!-- Experience Container Cards -->
            <div class="max-w-4xl mx-auto space-y-6">
                <!-- Jellyfish Technologies -->
                <div
                    class="group bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl rounded-2xl p-6 border border-gray-200/50 dark:border-gray-700/50 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 relative overflow-hidden animate-fade-in-up"
                    style="animation-delay: 0.3s"
                >
                    <!-- Gradient Overlay on Hover -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="relative z-10 flex gap-6">
                        <!-- Icon -->
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center shadow-md transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                                <CloudIcon class="w-7 h-7 text-white" />
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <!-- Header -->
                            <div class="flex flex-wrap items-start justify-between gap-3 mb-3">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                        Cloud Engineer
                                    </h3>
                                    <p class="text-base font-semibold text-blue-600 dark:text-blue-400">
                                        Jellyfish Technologies
                                    </p>
                                </div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-gradient-to-r from-green-500/10 to-emerald-500/10 border border-green-500/20 text-xs font-medium text-green-600 dark:text-green-400">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                                    Current
                                </span>
                            </div>

                            <!-- Meta Info -->
                            <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-gray-600 dark:text-gray-400 mb-4">
                                <div class="flex items-center">
                                    <MapPinIcon class="w-4 h-4 mr-1" />
                                    Noida
                                </div>
                                <div class="flex items-center">
                                    <CalendarIcon class="w-4 h-4 mr-1" />
                                    Jul 2024 - Present
                                </div>
                            </div>

                            <!-- Achievements -->
                            <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                <li class="flex items-start">
                                    <CheckCircleIcon class="w-4 h-4 mr-2 text-blue-600 flex-shrink-0 mt-0.5" />
                                    <span>Orchestrated multi-cloud infrastructure across Azure, AWS, and DigitalOcean with 99.9% uptime</span>
                                </li>
                                <li class="flex items-start">
                                    <CheckCircleIcon class="w-4 h-4 mr-2 text-blue-600 flex-shrink-0 mt-0.5" />
                                    <span>Architected CI/CD pipelines using GitHub Actions, Jenkins, and Azure DevOps</span>
                                </li>
                                <li class="flex items-start">
                                    <CheckCircleIcon class="w-4 h-4 mr-2 text-blue-600 flex-shrink-0 mt-0.5" />
                                    <span>Optimized cloud storage costs by 30% through strategic management</span>
                                </li>
                                <li class="flex items-start">
                                    <CheckCircleIcon class="w-4 h-4 mr-2 text-blue-600 flex-shrink-0 mt-0.5" />
                                    <span>Implemented comprehensive monitoring with Azure Monitor and CloudWatch</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 99Notes EdTech -->
                <div
                    class="group bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl rounded-2xl p-6 border border-gray-200/50 dark:border-gray-700/50 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 relative overflow-hidden animate-fade-in-up"
                    style="animation-delay: 0.4s"
                >
                    <!-- Gradient Overlay on Hover -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-pink-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="relative z-10 flex gap-6">
                        <!-- Icon -->
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-gradient-to-br from-purple-600 to-pink-600 rounded-xl flex items-center justify-center shadow-md transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                                <CodeBracketIcon class="w-7 h-7 text-white" />
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <!-- Header -->
                            <div class="flex flex-wrap items-start justify-between gap-3 mb-3">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                        Full Stack Developer
                                    </h3>
                                    <p class="text-base font-semibold text-purple-600 dark:text-purple-400">
                                        99Notes EdTech Pvt. Ltd.
                                    </p>
                                </div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-gradient-to-r from-purple-500/10 to-pink-500/10 border border-purple-500/20 text-xs font-medium text-purple-600 dark:text-purple-400">
                                    1 year 8 months
                                </span>
                            </div>

                            <!-- Meta Info -->
                            <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-gray-600 dark:text-gray-400 mb-4">
                                <div class="flex items-center">
                                    <MapPinIcon class="w-4 h-4 mr-1" />
                                    Delhi
                                </div>
                                <div class="flex items-center">
                                    <CalendarIcon class="w-4 h-4 mr-1" />
                                    Dec 2022 - Jul 2024
                                </div>
                            </div>

                            <!-- Achievements -->
                            <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                <li class="flex items-start">
                                    <CheckCircleIcon class="w-4 h-4 mr-2 text-purple-600 flex-shrink-0 mt-0.5" />
                                    <span>Engineered responsive web applications using Laravel, PHP, and modern JavaScript frameworks</span>
                                </li>
                                <li class="flex items-start">
                                    <CheckCircleIcon class="w-4 h-4 mr-2 text-purple-600 flex-shrink-0 mt-0.5" />
                                    <span>Managed 10+ production WordPress sites with 40% improved load times</span>
                                </li>
                                <li class="flex items-start">
                                    <CheckCircleIcon class="w-4 h-4 mr-2 text-purple-600 flex-shrink-0 mt-0.5" />
                                    <span>Administered DigitalOcean cloud infrastructure ensuring high availability</span>
                                </li>
                                <li class="flex items-start">
                                    <CheckCircleIcon class="w-4 h-4 mr-2 text-purple-600 flex-shrink-0 mt-0.5" />
                                    <span>Developed RESTful APIs supporting 5000+ concurrent users</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Experience Badge -->
            <div class="mt-16 text-center animate-fade-in-up" style="animation-delay: 0.5s">
                <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full text-white font-semibold shadow-lg">
                    <RocketLaunchIcon class="w-5 h-5 mr-2" />
                    3+ Years of Professional Experience
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import {
    BriefcaseIcon,
    CloudIcon,
    CodeBracketIcon,
    MapPinIcon,
    CalendarIcon,
    CheckCircleIcon,
    RocketLaunchIcon
} from '@heroicons/vue/24/outline';
</script>

<style scoped>
@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0) scale(1);
    }
    50% {
        transform: translateY(-20px) scale(1.05);
    }
}

@keyframes float-delayed {
    0%, 100% {
        transform: translateY(0) scale(1);
    }
    50% {
        transform: translateY(20px) scale(1.05);
    }
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out forwards;
    opacity: 0;
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-float-delayed {
    animation: float-delayed 6s ease-in-out infinite;
}
</style>
