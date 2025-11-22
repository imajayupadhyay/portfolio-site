<template>
    <section id="skills" class="relative py-20 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-b from-white via-gray-50 to-white dark:from-gray-900 dark:via-gray-800 dark:to-gray-900"></div>

        <!-- Decorative Elements -->
        <div class="absolute top-20 right-10 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 left-10 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl animate-float-delayed"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-block mb-4 animate-fade-in-up">
                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-600/10 to-purple-600/10 border border-blue-600/20 text-sm font-medium text-blue-600 dark:text-blue-400">
                        <CodeBracketIcon class="w-4 h-4 mr-2" />
                        {{ settings.badge || 'My Tech Stack' }}
                    </span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-4 animate-fade-in-up" style="animation-delay: 0.1s">
                    {{ settings.heading || 'Skills & Technologies' }}
                </h2>
                <p class="text-base sm:text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">
                    {{ settings.description || 'Expertise across cloud platforms, DevOps tools, and modern development technologies' }}
                </p>
            </div>

            <!-- Skills Categories -->
            <div class="space-y-12">
                <div
                    v-for="(category, index) in categories"
                    :key="category.id"
                    class="animate-fade-in-up"
                    :style="`animation-delay: ${0.3 + index * 0.1}s`"
                >
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                        <div class="w-1 h-6 bg-gradient-to-b from-blue-600 to-purple-600 rounded-full mr-3"></div>
                        {{ category.name }}
                    </h3>
                    <div
                        class="grid grid-cols-2 sm:grid-cols-3 gap-4"
                        :class="getGridClass(category.grid_cols)"
                    >
                        <SkillCard
                            v-for="skill in category.skills"
                            :key="skill.name"
                            :skill="skill"
                        />
                    </div>
                </div>
                <div v-if="categories.length === 0" class="text-center py-12 text-gray-500">
                    No skills available yet
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { CodeBracketIcon } from '@heroicons/vue/24/outline';
import SkillCard from './SkillCard.vue';

const props = defineProps({
    categories: {
        type: Array,
        default: () => []
    },
    settings: {
        type: Object,
        default: () => ({
            badge: 'My Tech Stack',
            heading: 'Skills & Technologies',
            description: 'Expertise across cloud platforms, DevOps tools, and modern development technologies'
        })
    }
});

const getGridClass = (cols) => {
    const gridClasses = {
        2: 'lg:grid-cols-2',
        3: 'lg:grid-cols-3',
        4: 'lg:grid-cols-4',
        5: 'lg:grid-cols-5',
        6: 'lg:grid-cols-6',
    };
    return gridClasses[cols] || 'lg:grid-cols-5';
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
