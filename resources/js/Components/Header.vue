<template>
    <header
        :class="[
            'fixed top-0 left-0 right-0 z-50 transition-all duration-500',
            isScrolled
                ? 'bg-white/80 dark:bg-gray-900/80 backdrop-blur-lg shadow-lg'
                : isDarkMode
                ? 'bg-transparent'
                : 'bg-white/80 backdrop-blur-lg shadow-lg'
        ]"
    >
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a
                        href="/"
                        class="flex items-center space-x-3 group"
                    >
                        <div class="relative">
                            <!-- Animated glow background -->
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl blur-md opacity-75 group-hover:opacity-100 transition-opacity duration-300"
                            ></div>
                            <!-- SVG Logo -->
                            <svg
                                class="relative w-12 h-12 transform group-hover:scale-110 transition-transform duration-300"
                                viewBox="0 0 100 100"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <!-- Background with gradient -->
                                <defs>
                                    <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#9333ea;stop-opacity:1" />
                                    </linearGradient>
                                    <filter id="shadow">
                                        <feDropShadow dx="0" dy="2" stdDeviation="3" flood-opacity="0.3"/>
                                    </filter>
                                </defs>

                                <!-- Background rounded square -->
                                <rect x="5" y="5" width="90" height="90" rx="18" fill="url(#logoGradient)" filter="url(#shadow)"/>

                                <!-- Letter A -->
                                <path d="M 28 70 L 35 45 L 42 70" stroke="white" stroke-width="4.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                                <line x1="30" y1="62" x2="40" y2="62" stroke="white" stroke-width="4.5" stroke-linecap="round"/>

                                <!-- Letter U -->
                                <path d="M 58 45 L 58 60 Q 58 70 68 70 Q 78 70 78 60 L 78 45" stroke="white" stroke-width="4.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>

                                <!-- Decorative dot -->
                                <circle cx="85" cy="20" r="3" fill="#fbbf24" opacity="0.9"/>
                            </svg>
                        </div>
                        <span
                            :class="[
                                'text-xl font-bold transition-colors duration-300 hidden sm:inline-block',
                                isScrolled
                                    ? 'text-gray-900 dark:text-white'
                                    : isDarkMode
                                    ? 'text-white'
                                    : 'text-gray-900'
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
                            activeSection === item.href
                                ? 'text-blue-600 dark:text-blue-400'
                                : isScrolled
                                ? 'text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400'
                                : isDarkMode
                                ? 'text-white/90 hover:text-white'
                                : 'text-gray-700 hover:text-blue-600',
                            activeSection === item.href
                                ? 'bg-blue-50 dark:bg-blue-900/20'
                                : 'hover:bg-gray-100/10'
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
                            :class="[
                                'absolute bottom-0 left-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300',
                                activeSection === item.href ? 'w-full' : 'w-0 group-hover:w-full'
                            ]"
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
                                    : isDarkMode
                                    ? 'bg-white/10 text-white'
                                    : 'bg-gray-100 text-gray-700'
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
                                    : isDarkMode
                                    ? 'bg-white/10 text-white'
                                    : 'bg-gray-100 text-gray-700'
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
                                    : isDarkMode
                                    ? 'bg-white/10 text-white'
                                    : 'bg-gray-100 text-gray-700'
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
                                    : isDarkMode
                                    ? 'bg-white/10 text-white'
                                    : 'bg-gray-100 text-gray-700'
                            ]"
                            aria-label="Phone"
                        >
                            <PhoneIcon class="w-4 h-4" />
                        </a>

                        <!-- Theme Toggle Button -->
                        <button
                            @click="toggleTheme"
                            :class="[
                                'w-9 h-9 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white',
                                isScrolled
                                    ? 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300'
                                    : isDarkMode
                                    ? 'bg-white/10 text-white'
                                    : 'bg-gray-100 text-gray-700'
                            ]"
                            :aria-label="isDarkMode ? 'Switch to light mode' : 'Switch to dark mode'"
                        >
                            <Transition
                                enter-active-class="transition-all duration-300 ease-out"
                                enter-from-class="opacity-0 rotate-90"
                                enter-to-class="opacity-100 rotate-0"
                                leave-active-class="transition-all duration-300 ease-in"
                                leave-from-class="opacity-100 rotate-0"
                                leave-to-class="opacity-0 -rotate-90"
                                mode="out-in"
                            >
                                <SunIcon v-if="isDarkMode" class="w-4 h-4" key="sun" />
                                <MoonIcon v-else class="w-4 h-4" key="moon" />
                            </Transition>
                        </button>
                    </div>

                    <!-- CTA Button -->
                    <button
                        @click="openContactModal"
                        class="ml-4 px-6 py-2.5 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full font-medium text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 hover:scale-105"
                    >
                        Let's Talk
                        <ArrowRightIcon class="w-4 h-4 inline-block ml-1 -mt-1" />
                    </button>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button
                        @click="toggleMobileMenu"
                        :class="[
                            'p-2 rounded-lg transition-colors duration-300',
                            isScrolled
                                ? 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800'
                                : isDarkMode
                                ? 'text-white hover:bg-white/10'
                                : 'text-gray-700 hover:bg-gray-100'
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
                        :class="[
                            'flex items-center px-4 py-3 rounded-lg transition-all duration-300 group',
                            activeSection === item.href
                                ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white'
                                : 'text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white'
                        ]"
                    >
                        <component
                            :is="item.icon"
                            class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform duration-300"
                        />
                        {{ item.name }}
                    </a>

                    <button
                        @click="openContactModalFromMobile"
                        class="flex items-center justify-center px-4 py-3 mt-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 w-full"
                    >
                        Let's Talk
                        <ArrowRightIcon class="w-5 h-5 ml-2" />
                    </button>

                    <!-- Theme Toggle -->
                    <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-700">
                        <button
                            @click="toggleTheme"
                            class="flex items-center justify-between w-full px-4 py-3 rounded-lg transition-all duration-300 text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white group"
                        >
                            <span class="flex items-center">
                                <Transition
                                    enter-active-class="transition-all duration-300 ease-out"
                                    enter-from-class="opacity-0 rotate-90"
                                    enter-to-class="opacity-100 rotate-0"
                                    leave-active-class="transition-all duration-300 ease-in"
                                    leave-from-class="opacity-100 rotate-0"
                                    leave-to-class="opacity-0 -rotate-90"
                                    mode="out-in"
                                >
                                    <SunIcon v-if="isDarkMode" class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform duration-300" key="sun" />
                                    <MoonIcon v-else class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform duration-300" key="moon" />
                                </Transition>
                                {{ isDarkMode ? 'Light Mode' : 'Dark Mode' }}
                            </span>
                            <span class="text-xs px-2 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-full">
                                {{ isDarkMode ? 'OFF' : 'ON' }}
                            </span>
                        </button>
                    </div>

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

        <!-- Contact Form Modal -->
        <ContactFormModal v-model="showContactModal" />
    </header>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import {
    Bars3Icon,
    XMarkIcon,
    HomeIcon,
    BriefcaseIcon,
    EnvelopeIcon,
    PhoneIcon,
    ArrowRightIcon,
    SunIcon,
    MoonIcon,
    BookOpenIcon
} from '@heroicons/vue/24/outline';
import ContactFormModal from './ContactFormModal.vue';

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
    { name: 'Home', href: '/', icon: HomeIcon },
    { name: 'Projects', href: '/projects', icon: BriefcaseIcon },
    { name: 'Blog', href: '/blog', icon: BookOpenIcon },
    { name: 'Contact', href: '/contact', icon: EnvelopeIcon },
];

// State
const isScrolled = ref(false);
const isMobileMenuOpen = ref(false);
const activeSection = ref('/');
const showContactModal = ref(false);
const isDarkMode = ref(false);

// Methods
const handleScroll = () => {
    isScrolled.value = window.scrollY > 20;
    updateActiveSection();
};

const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
};

const closeMobileMenu = () => {
    isMobileMenuOpen.value = false;
};

const openContactModal = () => {
    showContactModal.value = true;
};

const openContactModalFromMobile = () => {
    closeMobileMenu();
    showContactModal.value = true;
};

const updateActiveSection = () => {
    // Get current path
    const currentPath = window.location.pathname;

    // Check if we're on a specific page route (not home page)
    if (currentPath !== '/') {
        activeSection.value = currentPath;
        return;
    }

    // For home page, check sections by scroll position
    const sections = navItems
        .filter(item => item.href.startsWith('#'))
        .map(item => {
            const id = item.href.substring(1); // Remove # from href
            return {
                href: item.href,
                element: document.getElementById(id)
            };
        })
        .filter(section => section.element);

    // Find the section that is currently in view
    const scrollPosition = window.scrollY + 100; // Offset for better UX

    for (let i = sections.length - 1; i >= 0; i--) {
        const section = sections[i];
        if (section.element.offsetTop <= scrollPosition) {
            activeSection.value = section.href;
            return;
        }
    }

    // Default to home if on home page
    activeSection.value = '/';
};

const toggleTheme = () => {
    isDarkMode.value = !isDarkMode.value;
    const theme = isDarkMode.value ? 'dark' : 'light';

    // Update DOM
    if (isDarkMode.value) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    // Save to localStorage
    localStorage.setItem('theme', theme);
};

const initializeTheme = () => {
    // Get theme from localStorage or default to dark
    const savedTheme = localStorage.getItem('theme') || 'dark';
    isDarkMode.value = savedTheme === 'dark';
};

// Lifecycle hooks
onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    updateActiveSection(); // Set initial active section
    initializeTheme(); // Initialize theme state
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
