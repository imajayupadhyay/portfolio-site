<template>
    <footer class="relative bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <!-- Copyright Text - Left -->
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    © {{ currentYear }} {{ copyright }}
                </div>

                <!-- Social Media Icons - Right -->
                <div class="flex items-center gap-3">
                    <!-- Dynamic Social Links -->
                    <a
                        v-for="link in activeSocialLinks"
                        :key="link.id"
                        :href="link.url"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white transition-all duration-300 transform hover:scale-110"
                    >
                        <svg v-if="link.icon" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" v-html="link.icon"></svg>
                        <span v-else class="text-xs font-bold">{{ link.name.charAt(0) }}</span>
                    </a>

                    <!-- Email -->
                    <a
                        v-if="email"
                        :href="'mailto:' + email"
                        class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white transition-all duration-300 transform hover:scale-110"
                    >
                        <EnvelopeIcon class="w-5 h-5" />
                    </a>

                    <!-- Phone -->
                    <a
                        v-if="phone"
                        :href="'tel:' + phone"
                        class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white transition-all duration-300 transform hover:scale-110"
                    >
                        <PhoneIcon class="w-5 h-5" />
                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { EnvelopeIcon, PhoneIcon } from '@heroicons/vue/24/outline';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

const footerSettings = computed(() => page.props.footerSettings || {});
const socialLinks = computed(() => page.props.footerSocialLinks || []);

const copyright = computed(() => footerSettings.value.footer_copyright || 'Ajay Upadhyay. All rights reserved.');
const email = computed(() => footerSettings.value.footer_email || '');
const phone = computed(() => footerSettings.value.footer_phone || '');

const activeSocialLinks = computed(() => socialLinks.value.filter(link => link.is_active));

const currentYear = computed(() => new Date().getFullYear());
</script>
