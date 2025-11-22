<template>
    <Head>
        <title>{{ post.title }} - Blog</title>
        <meta name="description" :content="post.excerpt" />
    </Head>

    <PortfolioLayout site-name="Ajay Upadhyay" logo-initial="A">
        <!-- Hero Section -->
        <section class="relative pt-28 pb-12 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-b from-white via-gray-50 to-white dark:from-gray-900 dark:via-gray-800 dark:to-gray-900"></div>

            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Breadcrumb -->
                <nav class="mb-8 animate-fade-in-up">
                    <ol class="flex items-center gap-2 text-sm">
                        <li>
                            <a href="/" class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Home</a>
                        </li>
                        <li class="text-gray-400">/</li>
                        <li>
                            <a href="/blog" class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Blog</a>
                        </li>
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-900 dark:text-white font-medium truncate max-w-xs">{{ post.title }}</li>
                    </ol>
                </nav>

                <!-- Category Badge -->
                <div class="mb-6 animate-fade-in-up" style="animation-delay: 0.1s">
                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-600/10 to-purple-600/10 border border-blue-600/20 text-sm font-medium text-blue-600 dark:text-blue-400">
                        {{ post.category.name }}
                    </span>
                </div>

                <!-- Title -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 animate-fade-in-up" style="animation-delay: 0.2s">
                    {{ post.title }}
                </h1>

                <!-- Meta Info -->
                <div class="flex flex-wrap items-center gap-6 mb-8 text-gray-600 dark:text-gray-400 animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-600 to-purple-600 flex items-center justify-center text-white font-bold text-lg">
                            A
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ post.author }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Cloud & DevOps Engineer</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-1">
                        <CalendarIcon class="w-5 h-5" />
                        <span class="text-sm">{{ formatDate(post.published_at) }}</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <ClockIcon class="w-5 h-5" />
                        <span class="text-sm">{{ post.read_time }} min read</span>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="relative rounded-2xl overflow-hidden shadow-2xl mb-12 animate-fade-in-up" style="animation-delay: 0.4s">
                    <img
                        :src="post.featured_image"
                        :alt="post.title"
                        class="w-full h-64 sm:h-96 object-cover"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                </div>
            </div>
        </section>

        <!-- Article Content -->
        <section class="relative py-12">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-12 gap-12">
                    <!-- Main Content -->
                    <article class="lg:col-span-8">
                        <div class="max-w-none">
                            <!-- Article Introduction -->
                            <p class="text-xl text-gray-600 dark:text-gray-400 leading-relaxed mb-8">
                                {{ post.excerpt }}
                            </p>

                            <!-- Article Content from Database -->
                            <div class="blog-content" v-html="post.content"></div>
                        </div>

                        <!-- Tags -->
                        <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex flex-wrap gap-2">
                                <span v-for="tag in post.tags" :key="tag"
                                    class="px-4 py-2 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-full text-sm font-medium hover:bg-blue-100 dark:hover:bg-blue-900/30 hover:text-blue-600 dark:hover:text-blue-400 transition-colors cursor-pointer">
                                    #{{ tag }}
                                </span>
                            </div>
                        </div>

                        <!-- Share Section -->
                        <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Share this article</h3>
                            <div class="flex gap-3">
                                <a href="#" class="flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-blue-600 hover:text-white transition-all transform hover:scale-110">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-blue-700 hover:text-white transition-all transform hover:scale-110">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-blue-600 hover:text-white transition-all transform hover:scale-110">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gray-900 dark:hover:bg-gray-700 hover:text-white transition-all transform hover:scale-110">
                                    <LinkIcon class="w-5 h-5" />
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Sidebar -->
                    <aside class="lg:col-span-4">
                        <div class="sticky top-8 space-y-8">
                            <!-- Table of Contents -->
                            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                                    <ListBulletIcon class="w-5 h-5 text-blue-600" />
                                    Table of Contents
                                </h3>
                                <nav class="space-y-2">
                                    <a href="#" class="block text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors py-1">Introduction</a>
                                    <a href="#" class="block text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors py-1">Prerequisites</a>
                                    <a href="#" class="block text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors py-1">Setting Up Your Environment</a>
                                    <a href="#" class="block text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors py-1">Infrastructure Architecture</a>
                                    <a href="#" class="block text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors py-1">Best Practices</a>
                                    <a href="#" class="block text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors py-1">Monitoring and Maintenance</a>
                                    <a href="#" class="block text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors py-1">Conclusion</a>
                                </nav>
                            </div>

                            <!-- Author Card -->
                            <div class="bg-gradient-to-br from-blue-600 to-purple-600 rounded-2xl p-6 text-white shadow-lg">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center text-2xl font-bold">
                                        A
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg">Ajay Upadhyay</h4>
                                        <p class="text-sm text-white/80">Cloud & DevOps Engineer</p>
                                    </div>
                                </div>
                                <p class="text-sm text-white/90 mb-4">
                                    Passionate about cloud architecture, DevOps practices, and building scalable systems.
                                </p>
                                <a href="/contact" class="inline-flex items-center gap-2 px-4 py-2 bg-white text-blue-600 rounded-lg font-medium hover:bg-white/90 transition-all">
                                    Get in Touch
                                    <ArrowRightIcon class="w-4 h-4" />
                                </a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <!-- Related Articles -->
        <section class="relative py-12 bg-gray-50 dark:bg-gray-800/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Related Articles</h2>
                    <p class="text-gray-600 dark:text-gray-400">Continue reading about similar topics</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <article
                        v-for="relatedPost in relatedPosts"
                        :key="relatedPost.id"
                        class="group bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500"
                    >
                        <div class="relative h-48 overflow-hidden">
                            <img
                                :src="relatedPost.featured_image"
                                :alt="relatedPost.title"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            <span class="absolute bottom-4 left-4 px-3 py-1 bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm text-gray-900 dark:text-white text-xs font-medium rounded-full">
                                {{ relatedPost.category.name }}
                            </span>
                        </div>

                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3 line-clamp-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                {{ relatedPost.title }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                                {{ relatedPost.excerpt }}
                            </p>
                            <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                                <span class="text-xs text-gray-500 dark:text-gray-400">{{ formatDate(relatedPost.published_at) }}</span>
                                <a
                                    :href="`/blog/${relatedPost.slug}`"
                                    class="inline-flex items-center gap-2 text-blue-600 dark:text-blue-400 font-medium text-sm hover:gap-3 transition-all"
                                >
                                    Read More
                                    <ArrowRightIcon class="w-4 h-4" />
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </PortfolioLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import PortfolioLayout from '../../Layouts/PortfolioLayout.vue';
import {
    CalendarIcon,
    ClockIcon,
    ArrowRightIcon,
    LinkIcon,
    ListBulletIcon
} from '@heroicons/vue/24/outline';

const props = defineProps({
    post: {
        type: Object,
        required: true
    },
    relatedPosts: {
        type: Array,
        default: () => []
    }
});

// Format date helper
const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        month: 'short',
        day: 'numeric',
        year: 'numeric'
    });
};
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

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out forwards;
    opacity: 0;
}

/* Blog content styles are now in resources/css/blog-content.css */
</style>
