<template>
    <Head>
        <title>Contact Ajay Upadhyay - Cloud & DevOps Engineer | Get In Touch</title>
        <meta name="description" content="Get in touch with Ajay Upadhyay for cloud engineering, DevOps consulting, or collaboration opportunities. Available for AWS, Azure, and multi-cloud infrastructure projects." />
        <meta name="keywords" content="Contact Ajay Upadhyay, Cloud Engineer Contact, DevOps Consultant, AWS Expert, Azure Specialist, Hire Cloud Engineer, DevOps Services" />
        <meta property="og:title" content="Contact Ajay Upadhyay - Cloud & DevOps Engineer" />
        <meta property="og:description" content="Reach out for cloud engineering projects, DevOps consulting, and collaboration opportunities. Currently accepting new projects." />
        <link rel="canonical" href="/contact" />
    </Head>

    <PortfolioLayout
        site-name="Ajay Upadhyay"
        logo-initial="A"
    >
        <!-- Contact Hero Section -->
        <section id="contact" class="relative min-h-screen flex items-center justify-center pt-32 pb-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto w-full">
                <!-- Header -->
                <div class="text-center mb-16 animate-fade-in-up">
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6">
                        <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            {{ settings.contact_heading || 'Get In Touch' }}
                        </span>
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                        {{ settings.contact_paragraph || "Have a project in mind? Let's discuss how we can work together to bring your ideas to life." }}
                    </p>
                </div>

                <div class="grid lg:grid-cols-2 gap-12 items-start">
                    <!-- Contact Form -->
                    <div class="order-2 lg:order-1 animate-fade-in-left">
                        <ContactForm />
                    </div>

                    <!-- Contact Information & Social Links -->
                    <div class="order-1 lg:order-2 space-y-8 animate-fade-in-right">
                        <!-- Contact Info Cards -->
                        <div class="space-y-6">
                            <!-- Email Card -->
                            <div class="group bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl p-6 border border-gray-200/50 dark:border-gray-700/50 hover:border-blue-500/50 transition-all duration-300 hover:shadow-xl">
                                <div class="flex items-start gap-4">
                                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                        <EnvelopeIcon class="w-7 h-7 text-white" />
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Email</h3>
                                        <a :href="'mailto:' + (settings.contact_email || 'ajayupadhyaydevops@gmail.com')" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                            {{ settings.contact_email || 'ajayupadhyaydevops@gmail.com' }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Phone Card -->
                            <div class="group bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl p-6 border border-gray-200/50 dark:border-gray-700/50 hover:border-blue-500/50 transition-all duration-300 hover:shadow-xl">
                                <div class="flex items-start gap-4">
                                    <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                        <PhoneIcon class="w-7 h-7 text-white" />
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Phone</h3>
                                        <a :href="'tel:' + (settings.contact_phone || '+91 9717969678').replace(/\s/g, '')" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                            {{ settings.contact_phone || '+91 9717969678' }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Location Card -->
                            <div class="group bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl p-6 border border-gray-200/50 dark:border-gray-700/50 hover:border-blue-500/50 transition-all duration-300 hover:shadow-xl">
                                <div class="flex items-start gap-4">
                                    <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                        <MapPinIcon class="w-7 h-7 text-white" />
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Location</h3>
                                        <p class="text-gray-600 dark:text-gray-400">
                                            {{ settings.contact_location || 'New Delhi, India' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media Links -->
                        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl p-8 border border-gray-200/50 dark:border-gray-700/50">
                            <h3 class="text-2xl font-bold mb-6 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                {{ settings.social_section_title || 'Connect With Me' }}
                            </h3>
                            <div class="grid grid-cols-2 gap-4">
                                <a
                                    v-for="link in socialLinks"
                                    :key="link.id"
                                    :href="link.url"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    :class="[
                                        'group flex flex-col items-center justify-center p-6 rounded-xl hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1',
                                        'bg-gradient-to-br ' + (link.bg_class || 'from-gray-50 to-gray-100 dark:from-gray-900/20 dark:to-gray-800/20')
                                    ]"
                                >
                                    <div
                                        class="w-12 h-12 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300"
                                        :style="{ backgroundColor: link.color }"
                                        v-html="link.icon"
                                    ></div>
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ link.name }}</span>
                                </a>
                            </div>
                        </div>

                        <!-- Availability Status -->
                        <div
                            v-if="settings.availability_status === '1'"
                            class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-2xl p-6 border border-green-200 dark:border-green-800"
                        >
                            <div class="flex items-center gap-3">
                                <div class="relative flex h-3 w-3">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-green-900 dark:text-green-300">Available for Projects</h4>
                                    <p class="text-sm text-green-700 dark:text-green-400">{{ settings.availability_text || "I'm currently accepting new opportunities" }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </PortfolioLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import PortfolioLayout from '../Layouts/PortfolioLayout.vue';
import ContactForm from '../Components/ContactForm.vue';
import {
    EnvelopeIcon,
    PhoneIcon,
    MapPinIcon
} from '@heroicons/vue/24/outline';

defineProps({
    settings: {
        type: Object,
        default: () => ({})
    },
    socialLinks: {
        type: Array,
        default: () => []
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

@keyframes fade-in-left {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fade-in-right {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out;
}

.animate-fade-in-left {
    animation: fade-in-left 0.8s ease-out 0.2s both;
}

.animate-fade-in-right {
    animation: fade-in-right 0.8s ease-out 0.4s both;
}
</style>
