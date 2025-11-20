<template>
    <!-- Modal Overlay with Teleport -->
    <Teleport to="body">
        <Transition
            enter-active-class="transition-all duration-300 ease-out"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition-all duration-200 ease-in"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div
                v-if="modelValue && isMounted"
                class="fixed inset-0 z-[9999] bg-black/60 backdrop-blur-md overflow-y-auto"
                @click="closeModal"
            >
            <!-- Sticky Close Button - Always visible on mobile -->
            <button
                @click="closeModal"
                class="fixed top-4 right-4 z-[10000] w-12 h-12 flex items-center justify-center rounded-full bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 shadow-xl transition-all duration-300 hover:scale-110 border-2 border-gray-200 dark:border-gray-700"
                aria-label="Close modal"
            >
                <XMarkIcon class="w-6 h-6" />
            </button>

            <div class="min-h-full flex items-center justify-center p-4 py-20 md:py-8">
                <Transition
                    enter-active-class="transition-all duration-300 ease-out"
                    enter-from-class="opacity-0 scale-95 translate-y-4"
                    enter-to-class="opacity-100 scale-100 translate-y-0"
                    leave-active-class="transition-all duration-200 ease-in"
                    leave-from-class="opacity-100 scale-100 translate-y-0"
                    leave-to-class="opacity-0 scale-95 translate-y-4"
                >
                    <div
                        v-if="modelValue"
                        @click.stop
                        class="relative w-full max-w-2xl"
                    >
                        <!-- Contact Form -->
                        <ContactForm @success="handleSuccess" />
                    </div>
                </Transition>
            </div>
            </div>
        </Transition>
    </Teleport>
</template>

<script setup>
import { ref, onMounted, onUnmounted, watch, nextTick } from 'vue';
import { XMarkIcon } from '@heroicons/vue/24/outline';
import ContactForm from './ContactForm.vue';

// Track mounted state to prevent SSR issues
const isMounted = ref(false);

// Props
const props = defineProps({
    modelValue: {
        type: Boolean,
        default: false,
    },
});

// Emits
const emit = defineEmits(['update:modelValue', 'success']);

const closeModal = () => {
    emit('update:modelValue', false);
};

const handleSuccess = () => {
    emit('success');
    // Auto-close modal after 5 seconds to let user see success message
    setTimeout(() => {
        closeModal();
    }, 5000);
};

// Handle Escape key to close modal
const handleEscape = (event) => {
    if (event.key === 'Escape' && props.modelValue) {
        closeModal();
    }
};

// Initialize mounted state
onMounted(() => {
    isMounted.value = true;
});

// Prevent body scroll when modal is open
watch(() => props.modelValue, async (isOpen) => {
    if (isOpen) {
        // Use nextTick to ensure DOM is ready
        await nextTick();
        document.body.style.overflow = 'hidden';
        document.body.style.paddingRight = `${window.innerWidth - document.documentElement.clientWidth}px`;
        window.addEventListener('keydown', handleEscape);
    } else {
        document.body.style.overflow = '';
        document.body.style.paddingRight = '';
        window.removeEventListener('keydown', handleEscape);
    }
});

// Cleanup on unmount
onUnmounted(() => {
    document.body.style.overflow = '';
    document.body.style.paddingRight = '';
    window.removeEventListener('keydown', handleEscape);
    isMounted.value = false;
});
</script>
