<template>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <!-- Header -->
        <Header
            :site-name="siteName"
            :logo-initial="logoInitial"
        />

        <!-- Main Content -->
        <main class="relative">
            <!-- Background decorations -->
            <div class="fixed inset-0 overflow-hidden pointer-events-none">
                <!-- Gradient orbs -->
                <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
                <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-pink-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 4s;"></div>
            </div>

            <!-- Page Content -->
            <div class="relative z-10">
                <slot />
            </div>
        </main>

        <!-- Footer -->
        <Footer />

        <!-- Floating WhatsApp Button -->
        <FloatingWhatsApp
            phone-number="9717969678"
            message="Hello Ajay! I'd like to connect with you."
        />
    </div>
</template>

<script setup>
import Header from '../Components/Header.vue';
import Footer from '../Components/Footer.vue';
import FloatingWhatsApp from '../Components/FloatingWhatsApp.vue';

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
</script>

<style scoped>
/* Custom animations */
@keyframes pulse {
    0%, 100% {
        opacity: 0.1;
        transform: scale(1);
    }
    50% {
        opacity: 0.2;
        transform: scale(1.1);
    }
}

.animate-pulse {
    animation: pulse 6s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
</style>
