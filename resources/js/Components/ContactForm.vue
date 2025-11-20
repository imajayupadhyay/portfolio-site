<template>
    <div>
        <!-- Contact Form -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl md:rounded-3xl shadow-2xl p-6 md:p-8 lg:p-12 border border-gray-200/50 dark:border-gray-700/50">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 md:mb-8 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                Send Me a Message
            </h2>

            <form @submit.prevent="submitForm" class="space-y-4 md:space-y-6">
                <!-- Row 1: Name and Email -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Full Name *
                        </label>
                        <div class="relative">
                            <UserIcon class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" />
                            <input
                                id="name"
                                v-model="form.name"
                                type="text"
                                required
                                class="w-full pl-12 pr-4 py-3.5 bg-gray-50 dark:bg-gray-900/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 text-gray-900 dark:text-white placeholder-gray-400"
                                placeholder="John Doe"
                            />
                        </div>
                        <p v-if="form.errors.name" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ form.errors.name }}</p>
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Email Address *
                        </label>
                        <div class="relative">
                            <EnvelopeIcon class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" />
                            <input
                                id="email"
                                v-model="form.email"
                                type="email"
                                required
                                class="w-full pl-12 pr-4 py-3.5 bg-gray-50 dark:bg-gray-900/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 text-gray-900 dark:text-white placeholder-gray-400"
                                placeholder="john@example.com"
                            />
                        </div>
                        <p v-if="form.errors.email" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ form.errors.email }}</p>
                    </div>
                </div>

                <!-- Row 2: Phone and Subject -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <!-- Phone Input -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Phone Number *
                        </label>
                        <div class="relative">
                            <PhoneIcon class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" />
                            <input
                                id="phone"
                                v-model="form.phone"
                                type="tel"
                                required
                                class="w-full pl-12 pr-4 py-3.5 bg-gray-50 dark:bg-gray-900/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 text-gray-900 dark:text-white placeholder-gray-400"
                                placeholder="+1 (555) 000-0000"
                            />
                        </div>
                        <p v-if="form.errors.phone" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ form.errors.phone }}</p>
                    </div>

                    <!-- Subject Input -->
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Subject <span class="text-gray-400 text-xs">(Optional)</span>
                        </label>
                        <div class="relative">
                            <ChatBubbleLeftRightIcon class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" />
                            <input
                                id="subject"
                                v-model="form.subject"
                                type="text"
                                class="w-full pl-12 pr-4 py-3.5 bg-gray-50 dark:bg-gray-900/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 text-gray-900 dark:text-white placeholder-gray-400"
                                placeholder="Project Inquiry"
                            />
                        </div>
                        <p v-if="form.errors.subject" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ form.errors.subject }}</p>
                    </div>
                </div>

                <!-- Message Textarea -->
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Message *
                    </label>
                    <textarea
                        id="message"
                        v-model="form.message"
                        required
                        rows="4"
                        class="w-full px-4 py-3.5 bg-gray-50 dark:bg-gray-900/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 text-gray-900 dark:text-white placeholder-gray-400 resize-none"
                        placeholder="Tell me about your project..."
                    ></textarea>
                    <p v-if="form.errors.message" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ form.errors.message }}</p>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none flex items-center justify-center gap-2"
                >
                    <span v-if="!form.processing">Send Message</span>
                    <span v-else>Sending...</span>
                    <PaperAirplaneIcon class="w-5 h-5" :class="{ 'animate-pulse': form.processing }" />
                </button>
            </form>
        </div>

        <!-- Success Modal -->
        <Transition
            enter-active-class="transition-all duration-300 ease-out"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition-all duration-200 ease-in"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div
                v-if="showSuccessModal"
                class="fixed inset-0 z-[10001] flex items-center justify-center p-4 bg-black/60 backdrop-blur-md"
                @click="closeModal"
            >
                <Transition
                    enter-active-class="transition-all duration-300 ease-out"
                    enter-from-class="opacity-0 scale-75 translate-y-4"
                    enter-to-class="opacity-100 scale-100 translate-y-0"
                    leave-active-class="transition-all duration-200 ease-in"
                    leave-from-class="opacity-100 scale-100 translate-y-0"
                    leave-to-class="opacity-0 scale-75 translate-y-4"
                >
                    <div
                        v-if="showSuccessModal"
                        @click.stop
                        class="relative bg-white dark:bg-gray-800 rounded-3xl shadow-2xl max-w-md w-full p-8 overflow-hidden"
                    >
                        <!-- Animated background gradient -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-purple-500/10 to-pink-500/10 animate-pulse"></div>

                        <!-- Content -->
                        <div class="relative z-10">
                            <!-- Success Icon with animation -->
                            <div class="flex justify-center mb-6">
                                <div class="relative">
                                    <!-- Pulsing rings -->
                                    <div class="absolute inset-0 bg-green-500/20 rounded-full animate-ping"></div>
                                    <div class="absolute inset-0 bg-green-500/10 rounded-full animate-pulse"></div>

                                    <!-- Icon container -->
                                    <div class="relative w-20 h-20 bg-gradient-to-br from-green-400 to-emerald-600 rounded-full flex items-center justify-center animate-bounce-slow">
                                        <CheckCircleIcon class="w-12 h-12 text-white animate-check-draw" />
                                    </div>
                                </div>
                            </div>

                            <!-- Text Content -->
                            <div class="text-center mb-6">
                                <h3 class="text-3xl font-bold mb-3 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                    Thank You!
                                </h3>
                                <p class="text-gray-600 dark:text-gray-400 text-lg mb-2">
                                    Your message has been sent successfully.
                                </p>
                                <p class="text-gray-500 dark:text-gray-500 text-sm">
                                    I'll get back to you as soon as possible!
                                </p>
                            </div>

                            <!-- Confetti Animation -->
                            <div class="absolute top-0 left-0 w-full h-full pointer-events-none overflow-hidden">
                                <div class="confetti-piece" v-for="i in 50" :key="i" :style="getConfettiStyle()"></div>
                            </div>

                            <!-- Close Button -->
                            <button
                                @click="closeModal"
                                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-3 px-6 rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-300"
                            >
                                Close
                            </button>
                        </div>

                        <!-- Close X button -->
                        <button
                            @click="closeModal"
                            class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"
                        >
                            <XMarkIcon class="w-5 h-5" />
                        </button>
                    </div>
                </Transition>
            </div>
        </Transition>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import {
    EnvelopeIcon,
    PhoneIcon,
    UserIcon,
    ChatBubbleLeftRightIcon,
    PaperAirplaneIcon,
    CheckCircleIcon,
    XMarkIcon
} from '@heroicons/vue/24/outline';

// Form handling
const form = useForm({
    name: '',
    email: '',
    phone: '',
    subject: '',
    message: '',
});

// Modal state
const showSuccessModal = ref(false);

const submitForm = () => {
    form.post('/contact', {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            showSuccessModal.value = true;

            // Auto-close modal after 5 seconds
            setTimeout(() => {
                showSuccessModal.value = false;
            }, 5000);
        },
    });
};

const closeModal = () => {
    showSuccessModal.value = false;
};

// Confetti animation helper
const getConfettiStyle = () => {
    const colors = ['#3B82F6', '#8B5CF6', '#EC4899', '#10B981', '#F59E0B', '#EF4444'];
    const randomColor = colors[Math.floor(Math.random() * colors.length)];
    const randomLeft = Math.random() * 100;
    const randomDelay = Math.random() * 0.5;
    const randomDuration = 2 + Math.random() * 2;

    return {
        left: `${randomLeft}%`,
        backgroundColor: randomColor,
        animationDelay: `${randomDelay}s`,
        animationDuration: `${randomDuration}s`,
    };
};
</script>

<style scoped>
@keyframes bounce-slow {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

@keyframes check-draw {
    0% {
        opacity: 0;
        transform: scale(0);
    }
    50% {
        opacity: 1;
        transform: scale(1.2);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes confetti-fall {
    0% {
        top: -10%;
        opacity: 1;
        transform: translateX(0) rotateZ(0deg);
    }
    100% {
        top: 100%;
        opacity: 0;
        transform: translateX(100px) rotateZ(720deg);
    }
}

.animate-bounce-slow {
    animation: bounce-slow 2s ease-in-out infinite;
}

.animate-check-draw {
    animation: check-draw 0.5s ease-out 0.3s both;
}

.confetti-piece {
    position: absolute;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    animation: confetti-fall linear forwards;
}

.confetti-piece:nth-child(odd) {
    width: 6px;
    height: 12px;
    border-radius: 2px;
}
</style>
