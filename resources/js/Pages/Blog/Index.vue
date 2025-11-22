<template>
    <Head>
        <title>Blog - Insights & Articles</title>
        <meta name="description" content="Read articles and insights about cloud computing, DevOps, and software development." />
    </Head>

    <PortfolioLayout site-name="Ajay Upadhyay" logo-initial="A">
        <!-- Hero Section -->
        <section class="relative pt-32 pb-20 overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-gradient-to-b from-white via-gray-50 to-white dark:from-gray-900 dark:via-gray-800 dark:to-gray-900"></div>

            <!-- Decorative Elements -->
            <div class="absolute top-20 right-10 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-10 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <div class="inline-block mb-4 animate-fade-in-up">
                        <span class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-600/10 to-purple-600/10 border border-blue-600/20 text-sm font-medium text-blue-600 dark:text-blue-400">
                            <BookOpenIcon class="w-4 h-4 mr-2" />
                            Blog & Articles
                        </span>
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 animate-fade-in-up" style="animation-delay: 0.1s">
                        Insights & Knowledge
                    </h1>
                    <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">
                        Sharing experiences, tutorials, and insights about cloud computing, DevOps practices, and modern development
                    </p>
                </div>

                <!-- Search & Filter -->
                <div class="max-w-4xl mx-auto mb-12 animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Search Bar -->
                        <div class="flex-1 relative">
                            <MagnifyingGlassIcon class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" />
                            <input
                                v-model="searchQuery"
                                type="text"
                                placeholder="Search articles..."
                                class="w-full pl-12 pr-4 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            />
                        </div>

                        <!-- Category Filter -->
                        <select
                            v-model="selectedCategory"
                            class="px-4 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        >
                            <option value="">All Categories</option>
                            <option v-for="category in categories" :key="category.id" :value="category.slug">
                                {{ category.name }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog Posts Grid -->
        <section class="relative py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Featured Post -->
                <div v-if="featuredPost" class="mb-16 animate-fade-in-up" style="animation-delay: 0.4s">
                    <div class="relative group overflow-hidden rounded-2xl bg-white dark:bg-gray-800 shadow-xl border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-all duration-500">
                        <div class="grid md:grid-cols-2 gap-8">
                            <!-- Image -->
                            <div class="relative h-64 md:h-full overflow-hidden">
                                <img
                                    :src="featuredPost.featured_image"
                                    :alt="featuredPost.title"
                                    class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"
                                />
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-xs font-medium rounded-full">
                                        Featured
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-8 flex flex-col justify-center">
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-sm font-medium rounded-full">
                                        {{ featuredPost.category.name }}
                                    </span>
                                    <span class="text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                        <ClockIcon class="w-4 h-4" />
                                        {{ featuredPost.read_time }} min read
                                    </span>
                                </div>

                                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                    {{ featuredPost.title }}
                                </h2>

                                <p class="text-gray-600 dark:text-gray-400 mb-6 line-clamp-3">
                                    {{ featuredPost.excerpt }}
                                </p>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-600 to-purple-600 flex items-center justify-center text-white font-bold">
                                            A
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ featuredPost.author }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ formatDate(featuredPost.published_at) }}</p>
                                        </div>
                                    </div>

                                    <a
                                        :href="`/blog/${featuredPost.slug}`"
                                        class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transform hover:scale-105 transition-all"
                                    >
                                        Read More
                                        <ArrowRightIcon class="w-4 h-4" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blog Posts Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <article
                        v-for="(post, index) in filteredPosts"
                        :key="post.id"
                        class="group bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 animate-fade-in-up"
                        :style="`animation-delay: ${0.5 + index * 0.1}s`"
                    >
                        <!-- Image -->
                        <div class="relative h-48 overflow-hidden">
                            <img
                                :src="post.featured_image"
                                :alt="post.title"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                                <span class="px-3 py-1 bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm text-gray-900 dark:text-white text-xs font-medium rounded-full">
                                    {{ post.category.name }}
                                </span>
                                <span class="text-white text-xs flex items-center gap-1">
                                    <ClockIcon class="w-3 h-3" />
                                    {{ post.read_time }} min
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                {{ post.title }}
                            </h3>

                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3">
                                {{ post.excerpt }}
                            </p>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                                <span class="text-xs text-gray-500 dark:text-gray-400">{{ formatDate(post.published_at) }}</span>
                                <a
                                    :href="`/blog/${post.slug}`"
                                    class="inline-flex items-center gap-2 text-blue-600 dark:text-blue-400 font-medium text-sm hover:gap-3 transition-all"
                                >
                                    Read More
                                    <ArrowRightIcon class="w-4 h-4" />
                                </a>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Empty State -->
                <div v-if="filteredPosts.length === 0" class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-800 mb-4">
                        <BookOpenIcon class="w-8 h-8 text-gray-400" />
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No articles found</h3>
                    <p class="text-gray-600 dark:text-gray-400">Try adjusting your search or filters</p>
                </div>

                <!-- Pagination -->
                <div v-if="filteredPosts.length > 0" class="mt-16 flex justify-center">
                    <div class="inline-flex items-center gap-2">
                        <button class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            Previous
                        </button>
                        <button class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg">1</button>
                        <button class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">2</button>
                        <button class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">3</button>
                        <button class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </PortfolioLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import PortfolioLayout from '../../Layouts/PortfolioLayout.vue';
import {
    BookOpenIcon,
    MagnifyingGlassIcon,
    ClockIcon,
    ArrowRightIcon
} from '@heroicons/vue/24/outline';

const props = defineProps({
    posts: {
        type: Array,
        default: () => []
    },
    featuredPost: {
        type: Object,
        default: null
    },
    categories: {
        type: Array,
        default: () => []
    }
});

const searchQuery = ref('');
const selectedCategory = ref('');

// Format date helper
const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        month: 'short',
        day: 'numeric',
        year: 'numeric'
    });
};

const filteredPosts = computed(() => {
    return props.posts.filter(post => {
        const matchesSearch = post.title.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
                            post.excerpt.toLowerCase().includes(searchQuery.value.toLowerCase());
        const matchesCategory = !selectedCategory.value || post.category.slug === selectedCategory.value;
        return matchesSearch && matchesCategory;
    });
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

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out forwards;
    opacity: 0;
}
</style>
