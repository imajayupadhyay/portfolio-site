<template>
    <section id="home" class="relative min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 pt-28 overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl animate-float-delayed"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-6 text-center lg:text-left order-2 lg:order-1">
                    <!-- Main Heading -->
                    <div class="space-y-3">
                        <h2
                            class="text-lg sm:text-xl font-medium text-gray-600 dark:text-gray-400 animate-fade-in-up"
                            style="animation-delay: 0.1s"
                        >
                            Hello, I'm
                        </h2>
                        <h1
                            class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight animate-fade-in-up"
                            style="animation-delay: 0.2s"
                        >
                            <span class="block text-gray-900 dark:text-white">Ajay Upadhyay</span>
                            <span class="block mt-2 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                                {{ typedText }}<span class="animate-blink">|</span>
                            </span>
                        </h1>
                    </div>

                    <!-- Description -->
                    <p
                        class="text-base sm:text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto lg:mx-0 animate-fade-in-up leading-relaxed"
                        style="animation-delay: 0.3s"
                    >
                        Orchestrating multi-cloud infrastructure with expertise in AWS, Azure, and DevOps.
                        Passionate about automating workflows and building scalable solutions with 99.9% uptime.
                    </p>

                    <!-- Stats -->
                    <div
                        class="grid grid-cols-3 gap-4 max-w-md mx-auto lg:mx-0 animate-fade-in-up"
                        style="animation-delay: 0.4s"
                    >
                        <div class="text-center lg:text-left">
                            <div class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">3+</div>
                            <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Years Exp.</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">3</div>
                            <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Certifications</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">99.9%</div>
                            <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Uptime</div>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div
                        class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 animate-fade-in-up"
                        style="animation-delay: 0.5s"
                    >
                        <button
                            @click="openContactModal"
                            class="group px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full font-medium text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center w-full sm:w-auto justify-center"
                        >
                            <EnvelopeIcon class="w-4 h-4 mr-2" />
                            Get In Touch
                            <ArrowRightIcon class="w-3 h-3 ml-2 group-hover:translate-x-1 transition-transform duration-300" />
                        </button>
                        <a
                            href="/Ajay_Upadhyay_Resume.pdf"
                            download="Ajay_Upadhyay_Resume.pdf"
                            target="_blank"
                            class="group px-6 py-3 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-full font-medium text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 border-2 border-gray-200 dark:border-gray-700 inline-flex items-center w-full sm:w-auto justify-center"
                        >
                            <ArrowDownTrayIcon class="w-4 h-4 mr-2 group-hover:animate-bounce" />
                            Download Resume
                        </a>
                    </div>
                </div>

                <!-- Right Side - Image -->
                <div
                    class="relative order-1 lg:order-2 animate-fade-in-right"
                    style="animation-delay: 0.3s"
                >
                    <!-- Decorative elements -->
                    <div class="absolute -top-4 -left-4 w-72 h-72 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full opacity-20 blur-3xl animate-pulse"></div>
                    <div class="absolute -bottom-4 -right-4 w-72 h-72 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full opacity-20 blur-3xl animate-pulse" style="animation-delay: 1s;"></div>

                    <!-- Image Container -->
                    <div class="relative z-10 max-w-md mx-auto">
                        <!-- Floating Badge -->
                        <div class="absolute -top-8 -right-4 z-30 bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-4 hover:scale-110 transition-all duration-300 animate-float-badge" style="--rotate-start: 3deg; animation-delay: 0s;">
                            <div class="flex items-center space-x-2">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center">
                                    <CloudIcon class="w-6 h-6 text-white" />
                                </div>
                                <div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Specialized in</div>
                                    <div class="text-sm font-bold text-gray-900 dark:text-white">Cloud & DevOps</div>
                                </div>
                            </div>
                        </div>

                        <!-- AWS Badge -->
                        <div class="absolute top-1/4 -left-8 z-30 bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-3 hover:scale-110 transition-all duration-300 animate-float-badge" style="--rotate-start: -6deg; animation-delay: 0.5s;">
                            <div class="text-center">
                                <div class="text-2xl font-bold bg-gradient-to-r from-orange-500 to-yellow-500 bg-clip-text text-transparent">AWS</div>
                                <div class="text-xs text-gray-600 dark:text-gray-400">Certified</div>
                            </div>
                        </div>

                        <!-- Azure Badge -->
                        <div class="absolute bottom-1/4 -right-8 z-30 bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-3 hover:scale-110 transition-all duration-300 animate-float-badge" style="--rotate-start: 6deg; animation-delay: 1s;">
                            <div class="text-center">
                                <div class="text-2xl font-bold bg-gradient-to-r from-blue-500 to-cyan-500 bg-clip-text text-transparent">Azure</div>
                                <div class="text-xs text-gray-600 dark:text-gray-400">Certified</div>
                            </div>
                        </div>

                        <!-- Main Image -->
                        <div class="relative">
                            <!-- Image border gradient -->
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-3xl transform rotate-3"></div>

                            <!-- Image -->
                            <div class="relative bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 rounded-3xl overflow-hidden transform -rotate-3 hover:rotate-0 transition-transform duration-500 shadow-2xl">
                                <div class="aspect-square flex items-center justify-center">
                                    <img
                                        src="/images/profile.png"
                                        alt="Ajay Upadhyay - DevOps & Cloud Engineer"
                                        class="w-full h-full object-cover"
                                    />
                                </div>

                                <!-- Overlay gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-blue-600/20 to-transparent"></div>
                            </div>
                        </div>

                        <!-- Floating tech icons -->
                        <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-4">
                            <div class="w-16 h-16 bg-white dark:bg-gray-800 rounded-xl shadow-xl flex items-center justify-center transform hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="#FF9900"/>
                                    <path d="M2 17L12 22L22 17" stroke="#FF9900" stroke-width="2"/>
                                </svg>
                            </div>
                            <div class="w-16 h-16 bg-white dark:bg-gray-800 rounded-xl shadow-xl flex items-center justify-center transform hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="#0089D6">
                                    <path d="M22 3H2v18h20V3zm-2 16H4V5h16v14z"/>
                                </svg>
                            </div>
                            <div class="w-16 h-16 bg-white dark:bg-gray-800 rounded-xl shadow-xl flex items-center justify-center transform hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="#2496ED">
                                    <circle cx="12" cy="12" r="10"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <div class="flex flex-col items-center space-y-2">
                <span class="text-sm text-gray-500 dark:text-gray-400">Scroll Down</span>
                <ChevronDownIcon class="w-6 h-6 text-gray-400" />
            </div>
        </div>

        <!-- Contact Form Modal -->
        <ContactFormModal v-model="showContactModal" />
    </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import {
    EnvelopeIcon,
    ArrowRightIcon,
    ArrowDownTrayIcon,
    CloudIcon,
    ChevronDownIcon
} from '@heroicons/vue/24/outline';
import ContactFormModal from '../ContactFormModal.vue';

// State
const showContactModal = ref(false);
const typedText = ref('');

// Roles to cycle through
const roles = [
    'Software Engineer',
    'Cloud Engineer',
    'DevOps Engineer',
    'AWS Solutions Architect',
    'Azure Administrator'
];

let currentRoleIndex = 0;
let currentCharIndex = 0;
let isDeleting = false;
let typingTimeout = null;

// Typewriter effect
const typeWriter = () => {
    const currentRole = roles[currentRoleIndex];

    if (!isDeleting) {
        // Typing
        if (currentCharIndex < currentRole.length) {
            typedText.value = currentRole.substring(0, currentCharIndex + 1);
            currentCharIndex++;
            typingTimeout = setTimeout(typeWriter, 100); // Speed of typing
        } else {
            // Pause at end before deleting
            typingTimeout = setTimeout(() => {
                isDeleting = true;
                typeWriter();
            }, 2000); // Pause duration
        }
    } else {
        // Deleting
        if (currentCharIndex > 0) {
            typedText.value = currentRole.substring(0, currentCharIndex - 1);
            currentCharIndex--;
            typingTimeout = setTimeout(typeWriter, 50); // Speed of deleting
        } else {
            // Move to next role
            isDeleting = false;
            currentRoleIndex = (currentRoleIndex + 1) % roles.length;
            typingTimeout = setTimeout(typeWriter, 500); // Pause before typing next role
        }
    }
};

// Methods
const openContactModal = () => {
    showContactModal.value = true;
};

// Lifecycle hooks
onMounted(() => {
    typeWriter();
});

onUnmounted(() => {
    if (typingTimeout) {
        clearTimeout(typingTimeout);
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

.animate-fade-in-right {
    animation: fade-in-right 0.8s ease-out forwards;
    opacity: 0;
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-float-delayed {
    animation: float-delayed 6s ease-in-out infinite;
}

@keyframes blink {
    0%, 49% {
        opacity: 1;
    }
    50%, 100% {
        opacity: 0;
    }
}

@keyframes float-badge {
    0%, 100% {
        transform: translateY(0) translateX(0) rotate(var(--rotate-start));
    }
    33% {
        transform: translateY(-15px) translateX(5px) rotate(calc(var(--rotate-start) + 3deg));
    }
    66% {
        transform: translateY(-5px) translateX(-5px) rotate(calc(var(--rotate-start) - 3deg));
    }
}

.animate-blink {
    animation: blink 1s infinite;
}

.animate-float-badge {
    animation: float-badge 4s ease-in-out infinite;
}
</style>
