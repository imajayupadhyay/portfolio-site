<template>
    <div class="fixed bottom-6 right-6 z-50 group">
        <!-- Animated Ripple Effect -->
        <div class="absolute inset-0 -z-10">
            <div class="absolute inset-0 bg-green-500 rounded-full animate-ping opacity-75"></div>
            <div class="absolute inset-0 bg-green-500 rounded-full animate-pulse opacity-50" style="animation-delay: 0.3s"></div>
        </div>

        <!-- Main WhatsApp Button -->
        <a
            :href="whatsappUrl"
            target="_blank"
            rel="noopener noreferrer"
            class="relative flex items-center justify-center w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full shadow-2xl hover:shadow-green-500/50 transform hover:scale-110 transition-all duration-300 group-hover:rounded-2xl"
            aria-label="Chat on WhatsApp"
        >
            <!-- Gradient Glow -->
            <div class="absolute -inset-1 bg-gradient-to-br from-green-400 to-green-600 rounded-full blur-lg opacity-70 group-hover:opacity-100 transition-opacity duration-300"></div>

            <!-- WhatsApp Icon -->
            <svg
                class="relative w-6 h-6 text-white transform group-hover:rotate-12 transition-transform duration-300"
                fill="currentColor"
                viewBox="0 0 24 24"
            >
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>

            <!-- Notification Badge (optional) -->
            <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full border-2 border-white animate-bounce"></span>
        </a>

        <!-- Hover Tooltip -->
        <div class="absolute right-20 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none">
            <div class="bg-gray-900 dark:bg-white text-white dark:text-gray-900 px-4 py-2 rounded-lg shadow-xl whitespace-nowrap font-medium">
                Chat with me on WhatsApp
                <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/2 rotate-45 w-2 h-2 bg-gray-900 dark:bg-white"></div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    phoneNumber: {
        type: String,
        required: true
    },
    message: {
        type: String,
        default: 'Hello! I would like to connect with you.'
    }
});

// Format WhatsApp URL
const whatsappUrl = computed(() => {
    const phone = props.phoneNumber.replace(/\D/g, ''); // Remove non-digits
    const encodedMessage = encodeURIComponent(props.message);
    return `https://wa.me/91${phone}?text=${encodedMessage}`;
});
</script>

<style scoped>
@keyframes ping {
    0% {
        transform: scale(1);
        opacity: 0.75;
    }
    50% {
        transform: scale(1.3);
        opacity: 0;
    }
    100% {
        transform: scale(1.5);
        opacity: 0;
    }
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
        opacity: 0.5;
    }
    50% {
        transform: scale(1.15);
        opacity: 0.3;
    }
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-4px);
    }
}

.animate-ping {
    animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
}

.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

.animate-bounce {
    animation: bounce 1s ease-in-out infinite;
}

/* Smooth entrance animation */
@keyframes slideIn {
    from {
        transform: translateX(100px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.group {
    animation: slideIn 0.6s ease-out 0.5s both;
}
</style>
