<template>
    <Head>
        <title>Projects - Ajay Upadhyay | Cloud & DevOps Solutions Portfolio</title>
        <meta name="description" content="Explore Ajay Upadhyay's portfolio of cloud engineering and DevOps projects including HRMS, Learning Portal, and enterprise web applications built with modern tech stack." />
        <meta name="keywords" content="Cloud Projects, DevOps Portfolio, AWS Projects, Azure Projects, Laravel Applications, Vue.js Projects, Enterprise Software" />
        <meta property="og:title" content="Projects - Ajay Upadhyay | Cloud & DevOps Engineer" />
        <meta property="og:description" content="Browse through innovative cloud and DevOps projects showcasing expertise in AWS, Azure, Laravel, and modern web technologies." />
        <link rel="canonical" href="/projects" />
    </Head>

    <PortfolioLayout
        site-name="Ajay Upadhyay"
        logo-initial="A"
    >
        <!-- Projects Hero Section -->
        <section class="relative min-h-screen pt-32 pb-20 px-4 sm:px-6 lg:px-8">
            <!-- Background Decorative Elements -->
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl animate-float-delayed"></div>

            <div class="max-w-7xl mx-auto relative z-10">
                <!-- Header -->
                <div class="text-center mb-16 animate-fade-in-up">
                    <div class="inline-block mb-4">
                        <span class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-600/10 to-purple-600/10 border border-blue-600/20 text-sm font-medium text-blue-600 dark:text-blue-400">
                            <BriefcaseIcon class="w-4 h-4 mr-2" />
                            {{ settings.projects_badge || 'Portfolio' }}
                        </span>
                    </div>
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6">
                        <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            {{ settings.projects_heading || 'My Projects' }}
                        </span>
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                        {{ settings.projects_paragraph || 'A collection of innovative solutions built with cutting-edge technologies. Each project represents a unique challenge solved with creativity and technical expertise.' }}
                    </p>
                </div>

                <!-- Projects Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-in-up" style="animation-delay: 0.2s">
                    <ProjectCard
                        v-for="(project, index) in projects"
                        :key="index"
                        :project="project"
                    />
                </div>

                <!-- Empty State (if no projects) -->
                <div
                    v-if="!projects || projects.length === 0"
                    class="text-center py-20 animate-fade-in-up"
                >
                    <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center opacity-50">
                        <BriefcaseIcon class="w-12 h-12 text-white" />
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                        No Projects Yet
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Check back soon for exciting new projects!
                    </p>
                </div>

                <!-- CTA Section -->
                <div class="mt-20 text-center animate-fade-in-up" style="animation-delay: 0.4s">
                    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl p-12 shadow-2xl">
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                            {{ settings.projects_cta_heading || 'Have a Project in Mind?' }}
                        </h2>
                        <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                            {{ settings.projects_cta_text || "Let's collaborate and bring your ideas to life with cutting-edge cloud and DevOps solutions." }}
                        </p>
                        <a
                            href="/contact"
                            class="inline-flex items-center px-8 py-4 bg-white text-blue-600 rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300"
                        >
                            {{ settings.projects_cta_button || 'Get In Touch' }}
                            <ArrowRightIcon class="w-5 h-5 ml-2" />
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </PortfolioLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import PortfolioLayout from '../Layouts/PortfolioLayout.vue';
import ProjectCard from '../Components/ProjectCard.vue';
import { BriefcaseIcon, ArrowRightIcon } from '@heroicons/vue/24/outline';

defineProps({
    projects: {
        type: Array,
        default: () => []
    },
    settings: {
        type: Object,
        default: () => ({})
    }
});
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
