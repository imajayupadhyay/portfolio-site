<template>
    <div
        class="group relative h-full bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl rounded-3xl p-8 border border-gray-200/50 dark:border-gray-700/50 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden"
    >
        <!-- Gradient Overlay on Hover -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

        <!-- Glow Effect -->
        <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-3xl blur opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>

        <div class="relative z-10">
            <!-- Project Header -->
            <div class="mb-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-blue-600 group-hover:to-purple-600 transition-all duration-300">
                    {{ project.name }}
                </h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    {{ project.description }}
                </p>
            </div>

            <!-- Tech Stack -->
            <div class="mb-6">
                <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center">
                    <CodeBracketIcon class="w-4 h-4 mr-1" />
                    Tech Stack
                </h4>
                <div class="flex flex-wrap gap-2">
                    <span
                        v-for="(tech, index) in project.techStack"
                        :key="index"
                        class="px-3 py-1 bg-gradient-to-r from-blue-500/10 to-purple-500/10 border border-blue-500/20 dark:border-purple-500/20 rounded-full text-xs font-medium text-blue-600 dark:text-blue-400 hover:from-blue-500/20 hover:to-purple-500/20 transition-all duration-300"
                    >
                        {{ tech }}
                    </span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3">
                <!-- GitHub Link -->
                <a
                    v-if="project.githubUrl"
                    :href="project.githubUrl"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="flex-1 flex items-center justify-center px-4 py-3 bg-gray-900 dark:bg-gray-700 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 group/btn"
                >
                    <svg class="w-5 h-5 mr-2 group-hover/btn:rotate-12 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                    GitHub
                </a>

                <!-- View Details Button -->
                <a
                    v-if="project.detailUrl"
                    :href="project.detailUrl"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="flex-1 flex items-center justify-center px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 group/btn"
                >
                    <GlobeAltIcon class="w-5 h-5 mr-2 group-hover/btn:scale-110 transition-transform duration-300" />
                    Live Demo
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
import { CodeBracketIcon, GlobeAltIcon } from '@heroicons/vue/24/outline';

const props = defineProps({
    project: {
        type: Object,
        required: true,
        validator: (value) => {
            return (
                typeof value.name === 'string' &&
                typeof value.description === 'string' &&
                Array.isArray(value.techStack)
            );
        }
    }
});
</script>
