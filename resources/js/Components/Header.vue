<template>
    <header
        :class="[
            'fixed top-0 left-0 right-0 z-50 transition-all duration-500',
            isScrolled
                ? 'bg-white/80 dark:bg-gray-900/80 backdrop-blur-lg shadow-lg'
                : 'bg-transparent'
        ]"
    >
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a
                        href="/"
                        class="flex items-center space-x-2 group"
                    >
                        <div class="relative">
                            <!-- Animated circle background -->
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full blur-md opacity-75 group-hover:opacity-100 transition-opacity duration-300"
                            ></div>
                            <!-- Logo content -->
                            <div class="relative w-12 h-12 bg-gradient-to-br from-blue-600 to-purple-600 rounded-full flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                                <span class="text-white font-bold text-xl">{{ logoInitial }}</span>
                            </div>
                        </div>
                        <span
                            :class="[
                                'text-xl font-bold transition-colors duration-300',
                                isScrolled ? 'text-gray-900 dark:text-white' : 'text-white'
                            ]"
                        >
                            {{ siteName }}
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex md:items-center md:space-x-1">
                    <a
                        v-for="(item, index) in navItems"
                        :key="index"
                        :href="item.href"
                        :class="[
                            'relative px-4 py-2 rounded-lg font-medium transition-all duration-300 group',
                            isScrolled
                                ? 'text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400'
                                : 'text-white/90 hover:text-white',
                            'hover:bg-gray-100/10'
                        ]"
                    >
                        <!-- Icon -->
                        <component
                            :is="item.icon"
                            class="w-5 h-5 inline-block mr-1 -mt-1"
                        />
                        {{ item.name }}

                        <!-- Animated underline -->
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 group-hover:w-full transition-all duration-300"
                        ></span>
                    </a>

                    <!-- Social Media Icons -->
                    <div class="flex items-center gap-2 ml-4 pl-4 border-l border-gray-300/20 dark:border-gray-700">
                        <a
                            href="https://linkedin.com/in/ajay-upadhyay-webdev"
                            target="_blank"
                            rel="noopener noreferrer"
                            :class="[
                                'w-9 h-9 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white',
                                isScrolled
                                    ? 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300'
                                    : 'bg-white/10 text-white'
                            ]"
                            aria-label="LinkedIn"
                        >
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>
                        <a
                            href="https://github.com/imajayupadhyay"
                            target="_blank"
                            rel="noopener noreferrer"
                            :class="[
                                'w-9 h-9 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white',
                                isScrolled
                                    ? 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300'
                                    : 'bg-white/10 text-white'
                            ]"
                            aria-label="GitHub"
                        >
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                        <a
                            href="mailto:ajayupadhyaydevops@gmail.com"
                            :class="[
                                'w-9 h-9 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white',
                                isScrolled
                                    ? 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300'
                                    : 'bg-white/10 text-white'
                            ]"
                            aria-label="Email"
                        >
                            <EnvelopeIcon class="w-4 h-4" />
                        </a>
                        <a
                            href="tel:+919717969678"
                            :class="[
                                'w-9 h-9 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white',
                                isScrolled
                                    ? 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300'
                                    : 'bg-white/10 text-white'
                            ]"
                            aria-label="Phone"
                        >
                            <PhoneIcon class="w-4 h-4" />
                        </a>
                    </div>

                    <!-- CTA Button -->
                    <a
                        href="#contact"
                        class="ml-4 px-6 py-2.5 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full font-medium text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 hover:scale-105"
                    >
                        Let's Talk
                        <ArrowRightIcon class="w-4 h-4 inline-block ml-1 -mt-1" />
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button
                        @click="toggleMobileMenu"
                        :class="[
                            'p-2 rounded-lg transition-colors duration-300',
                            isScrolled
                                ? 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800'
                                : 'text-white hover:bg-white/10'
                        ]"
                        aria-label="Toggle menu"
                    >
                        <Bars3Icon v-if="!isMobileMenuOpen" class="w-6 h-6" />
                        <XMarkIcon v-else class="w-6 h-6" />
                    </button>
                </div>
            </div>
        </nav>

        <!-- Mobile menu -->
        <Transition
            enter-active-class="transition-all duration-300 ease-out"
            enter-from-class="opacity-0 -translate-y-4"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition-all duration-200 ease-in"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 -translate-y-4"
        >
            <div
                v-if="isMobileMenuOpen"
                class="md:hidden bg-white/95 dark:bg-gray-900/95 backdrop-blur-lg border-t border-gray-200 dark:border-gray-800"
            >
                <div class="px-4 py-6 space-y-2">
                    <a
                        v-for="(item, index) in navItems"
                        :key="index"
                        :href="item.href"
                        @click="closeMobileMenu"
                        class="flex items-center px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white transition-all duration-300 group"
                    >
                        <component
                            :is="item.icon"
                            class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform duration-300"
                        />
                        {{ item.name }}
                    </a>

                    <a
                        href="#contact"
                        @click="closeMobileMenu"
                        class="flex items-center justify-center px-4 py-3 mt-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300"
                    >
                        Let's Talk
                        <ArrowRightIcon class="w-5 h-5 ml-2" />
                    </a>

                    <!-- Social Links -->
                    <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-700">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-3 px-4">Connect with me</p>
                        <div class="flex items-center justify-center gap-3">
                            <a
                                href="https://linkedin.com/in/ajay-upadhyay-webdev"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white transition-all duration-300 transform hover:scale-110 text-gray-700 dark:text-gray-300"
                                aria-label="LinkedIn"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                            <a
                                href="https://github.com/imajayupadhyay"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white transition-all duration-300 transform hover:scale-110 text-gray-700 dark:text-gray-300"
                                aria-label="GitHub"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                            <a
                                href="mailto:ajayupadhyaydevops@gmail.com"
                                class="w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white transition-all duration-300 transform hover:scale-110 text-gray-700 dark:text-gray-300"
                                aria-label="Email"
                            >
                                <EnvelopeIcon class="w-5 h-5" />
                            </a>
                            <a
                                href="tel:+919717969678"
                                class="w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white transition-all duration-300 transform hover:scale-110 text-gray-700 dark:text-gray-300"
                                aria-label="Phone"
                            >
                                <PhoneIcon class="w-5 h-5" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
    </header>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import {
    Bars3Icon,
    XMarkIcon,
    HomeIcon,
    UserIcon,
    BriefcaseIcon,
    CodeBracketIcon,
    EnvelopeIcon,
    PhoneIcon,
    ArrowRightIcon
} from '@heroicons/vue/24/outline';

// Props
const props = defineProps({
    siteName: {
        type: String,
        default: 'Portfolio'
    },
    logoInitial: {
        type: String,
        default: 'P'
    }
});

// Navigation items
const navItems = [
    { name: 'Home', href: '#home', icon: HomeIcon },
    { name: 'About', href: '#about', icon: UserIcon },
    { name: 'Projects', href: '#projects', icon: BriefcaseIcon },
    { name: 'Skills', href: '#skills', icon: CodeBracketIcon },
    { name: 'Contact', href: '#contact', icon: EnvelopeIcon },
];

// State
const isScrolled = ref(false);
const isMobileMenuOpen = ref(false);

// Methods
const handleScroll = () => {
    isScrolled.value = window.scrollY > 20;
};

const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
};

const closeMobileMenu = () => {
    isMobileMenuOpen.value = false;
};

// Lifecycle hooks
onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<style scoped>
/* Custom scrollbar for mobile menu */
@media (max-width: 768px) {
    .space-y-2 {
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }
}

/* Smooth scroll behavior */
html {
    scroll-behavior: smooth;
}
</style>
