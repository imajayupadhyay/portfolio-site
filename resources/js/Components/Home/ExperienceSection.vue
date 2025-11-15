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

            <!-- Timeline -->
            <div class="relative">
                <!-- Timeline Line -->
                <div class="hidden lg:block absolute left-1/2 transform -translate-x-1/2 w-0.5 h-full bg-gradient-to-b from-blue-600 via-purple-600 to-pink-600 opacity-20"></div>

                <!-- Experience Items -->
                <div class="space-y-12">
                    <!-- Jellyfish Technologies -->
                    <div
                        class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center animate-fade-in-up"
                        style="animation-delay: 0.3s"
                    >
                        <!-- Left: Company Info (Desktop) / Full Width (Mobile) -->
                        <div class="lg:text-right">
                            <div class="group inline-block lg:block">
                                <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl rounded-3xl p-8 border border-gray-200/50 dark:border-gray-700/50 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 relative overflow-hidden">
                                    <!-- Gradient Overlay on Hover -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                                    <!-- Glow Effect -->
                                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-3xl blur opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>

                                    <div class="relative z-10">
                                        <!-- Company Logo/Icon -->
                                        <div class="flex justify-center lg:justify-end mb-4">
                                            <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                                <CloudIcon class="w-9 h-9 text-white" />
                                            </div>
                                        </div>

                                        <!-- Company Name -->
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                                            Cloud Engineer
                                        </h3>
                                        <p class="text-lg font-semibold text-blue-600 dark:text-blue-400 mb-2">
                                            Jellyfish Technologies
                                        </p>
                                        <div class="flex items-center justify-center lg:justify-end text-sm text-gray-600 dark:text-gray-400 mb-4">
                                            <MapPinIcon class="w-4 h-4 mr-1" />
                                            Noida
                                            <span class="mx-2">•</span>
                                            <CalendarIcon class="w-4 h-4 mr-1" />
                                            Jul 2024 - Present
                                        </div>

                                        <!-- Current Badge -->
                                        <div class="flex justify-center lg:justify-end mb-4">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-gradient-to-r from-green-500/10 to-emerald-500/10 border border-green-500/20 text-xs font-medium text-green-600 dark:text-green-400">
                                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                                                Current Position
                                            </span>
                                        </div>

                                        <!-- Achievements -->
                                        <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400 text-left">
                                            <div class="flex items-start">
                                                <CheckCircleIcon class="w-5 h-5 mr-2 text-blue-600 flex-shrink-0 mt-0.5" />
                                                <span>Orchestrated multi-cloud infrastructure across Azure, AWS, and DigitalOcean with 99.9% uptime</span>
                                            </div>
                                            <div class="flex items-start">
                                                <CheckCircleIcon class="w-5 h-5 mr-2 text-blue-600 flex-shrink-0 mt-0.5" />
                                                <span>Architected CI/CD pipelines using GitHub Actions, Jenkins, and Azure DevOps</span>
                                            </div>
                                            <div class="flex items-start">
                                                <CheckCircleIcon class="w-5 h-5 mr-2 text-blue-600 flex-shrink-0 mt-0.5" />
                                                <span>Optimized cloud storage costs by 30% through strategic management</span>
                                            </div>
                                            <div class="flex items-start">
                                                <CheckCircleIcon class="w-5 h-5 mr-2 text-blue-600 flex-shrink-0 mt-0.5" />
                                                <span>Implemented comprehensive monitoring with Azure Monitor and CloudWatch</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Timeline Dot -->
                        <div class="hidden lg:block absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 top-1/2">
                            <div class="w-6 h-6 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full border-4 border-white dark:border-gray-900 shadow-lg animate-pulse"></div>
                        </div>

                        <!-- Right: Empty Space for Timeline Balance -->
                        <div class="hidden lg:block"></div>
                    </div>

                    <!-- 99Notes EdTech -->
                    <div
                        class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center animate-fade-in-up"
                        style="animation-delay: 0.4s"
                    >
                        <!-- Left: Empty Space for Timeline Balance -->
                        <div class="hidden lg:block"></div>

                        <!-- Timeline Dot -->
                        <div class="hidden lg:block absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 top-1/2">
                            <div class="w-6 h-6 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full border-4 border-white dark:border-gray-900 shadow-lg"></div>
                        </div>

                        <!-- Right: Company Info (Desktop) / Full Width (Mobile) -->
                        <div class="lg:text-left">
                            <div class="group inline-block lg:block">
                                <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl rounded-3xl p-8 border border-gray-200/50 dark:border-gray-700/50 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 relative overflow-hidden">
                                    <!-- Gradient Overlay on Hover -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-pink-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                                    <!-- Glow Effect -->
                                    <div class="absolute -inset-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl blur opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>

                                    <div class="relative z-10">
                                        <!-- Company Logo/Icon -->
                                        <div class="flex justify-center lg:justify-start mb-4">
                                            <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                                <CodeBracketIcon class="w-9 h-9 text-white" />
                                            </div>
                                        </div>

                                        <!-- Company Name -->
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                                            Full Stack Developer
                                        </h3>
                                        <p class="text-lg font-semibold text-purple-600 dark:text-purple-400 mb-2">
                                            99Notes EdTech Pvt. Ltd.
                                        </p>
                                        <div class="flex items-center justify-center lg:justify-start text-sm text-gray-600 dark:text-gray-400 mb-4">
                                            <MapPinIcon class="w-4 h-4 mr-1" />
                                            Delhi
                                            <span class="mx-2">•</span>
                                            <CalendarIcon class="w-4 h-4 mr-1" />
                                            Dec 2022 - Jul 2024
                                        </div>

                                        <!-- Duration Badge -->
                                        <div class="flex justify-center lg:justify-start mb-4">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-gradient-to-r from-purple-500/10 to-pink-500/10 border border-purple-500/20 text-xs font-medium text-purple-600 dark:text-purple-400">
                                                1 year 8 months
                                            </span>
                                        </div>

                                        <!-- Achievements -->
                                        <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400 text-left">
                                            <div class="flex items-start">
                                                <CheckCircleIcon class="w-5 h-5 mr-2 text-purple-600 flex-shrink-0 mt-0.5" />
                                                <span>Engineered responsive web applications using Laravel, PHP, and modern JavaScript frameworks</span>
                                            </div>
                                            <div class="flex items-start">
                                                <CheckCircleIcon class="w-5 h-5 mr-2 text-purple-600 flex-shrink-0 mt-0.5" />
                                                <span>Managed 10+ production WordPress sites with 40% improved load times</span>
                                            </div>
                                            <div class="flex items-start">
                                                <CheckCircleIcon class="w-5 h-5 mr-2 text-purple-600 flex-shrink-0 mt-0.5" />
                                                <span>Administered DigitalOcean cloud infrastructure ensuring high availability</span>
                                            </div>
                                            <div class="flex items-start">
                                                <CheckCircleIcon class="w-5 h-5 mr-2 text-purple-600 flex-shrink-0 mt-0.5" />
                                                <span>Developed RESTful APIs supporting 5000+ concurrent users</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
