<template>
    <section id="certifications" class="relative py-20 overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0 bg-gradient-to-b from-gray-50 via-white to-gray-50 dark:from-gray-800 dark:via-gray-900 dark:to-gray-800"></div>

        <!-- Decorative Elements -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-float-delayed"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-block mb-4 animate-fade-in-up">
                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-600/10 to-purple-600/10 border border-blue-600/20 text-sm font-medium text-blue-600 dark:text-blue-400">
                        <AcademicCapIcon class="w-4 h-4 mr-2" />
                        {{ settings.certifications_badge || 'Professional Certifications' }}
                    </span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-4 animate-fade-in-up" style="animation-delay: 0.1s">
                    {{ settings.certifications_heading || 'Industry Certifications' }}
                </h2>
                <p class="text-base sm:text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">
                    {{ settings.certifications_description || 'Validated expertise in cloud computing and DevOps practices' }}
                </p>
            </div>

            <!-- Certifications Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    v-for="(cert, index) in certifications"
                    :key="cert.id"
                    class="group relative animate-fade-in-up"
                    :class="{ 'md:col-span-2 lg:col-span-1': index === certifications.length - 1 && certifications.length % 3 === 1 }"
                    :style="{ animationDelay: `${0.3 + index * 0.1}s` }"
                >
                    <div class="relative h-full bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl rounded-3xl p-8 border border-gray-200/50 dark:border-gray-700/50 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
                        <!-- Gradient Overlay on Hover -->
                        <div
                            class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                            :style="{ background: `linear-gradient(135deg, ${cert.gradient_from}10, ${cert.gradient_to}10)` }"
                        ></div>

                        <!-- Glow Effect -->
                        <div
                            class="absolute -inset-1 rounded-3xl blur opacity-0 group-hover:opacity-20 transition-opacity duration-500"
                            :style="{ background: `linear-gradient(135deg, ${cert.gradient_from}, ${cert.gradient_to})` }"
                        ></div>

                        <div class="relative z-10">
                            <!-- Badge Image -->
                            <div class="mb-6">
                                <div class="w-48 h-48 mx-auto flex items-center justify-center p-4 transform group-hover:scale-105 transition-all duration-500">
                                    <img
                                        v-if="cert.badge_image"
                                        :src="cert.badge_image"
                                        :alt="cert.title"
                                        class="w-full h-full object-contain drop-shadow-xl"
                                    />
                                    <div
                                        v-else
                                        class="w-full h-full rounded-full flex items-center justify-center"
                                        :style="{ background: `linear-gradient(135deg, ${cert.gradient_from}, ${cert.gradient_to})` }"
                                    >
                                        <AcademicCapIcon class="w-20 h-20 text-white" />
                                    </div>
                                </div>
                            </div>

                            <!-- Certification Info -->
                            <div class="text-center mb-6">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                                    {{ cert.title }}
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    <span class="font-semibold">{{ cert.level }}</span>
                                    <span v-if="cert.code" class="font-light"> - {{ cert.code }}</span>
                                </p>
                            </div>

                            <!-- Provider -->
                            <div class="flex items-center justify-center mb-6">
                                <div
                                    class="px-4 py-2 rounded-full border"
                                    :style="{
                                        background: `linear-gradient(135deg, ${cert.gradient_from}15, ${cert.gradient_to}15)`,
                                        borderColor: `${cert.gradient_from}30`
                                    }"
                                >
                                    <span
                                        class="text-sm font-medium"
                                        :style="{ color: cert.gradient_from }"
                                    >{{ cert.provider }}</span>
                                </div>
                            </div>

                            <!-- Verify Button -->
                            <a
                                v-if="cert.credential_url"
                                :href="cert.credential_url"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex items-center justify-center w-full px-6 py-3 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300"
                                :style="{ background: `linear-gradient(135deg, ${cert.gradient_from}, ${cert.gradient_to})` }"
                            >
                                <ShieldCheckIcon class="w-5 h-5 mr-2" />
                                Verify Credential
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty State -->
            <div v-if="certifications.length === 0" class="text-center py-12">
                <AcademicCapIcon class="w-16 h-16 mx-auto text-gray-400 mb-4" />
                <p class="text-gray-500 dark:text-gray-400">No certifications to display</p>
            </div>
        </div>
    </section>
</template>

<script setup>
import { AcademicCapIcon, ShieldCheckIcon } from '@heroicons/vue/24/outline';

defineProps({
    certifications: {
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
