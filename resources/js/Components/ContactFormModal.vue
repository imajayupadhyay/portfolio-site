<template>
    <!-- Modal Overlay -->
    <Transition
        enter-active-class="transition-all duration-300 ease-out"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition-all duration-200 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="modelValue"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm overflow-y-auto"
            @click="closeModal"
        >
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
                    class="relative w-full max-w-2xl my-8"
                >
                    <!-- Close Button -->
                    <button
                        @click="closeModal"
                        class="absolute -top-4 -right-4 z-10 w-10 h-10 flex items-center justify-center rounded-full bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 shadow-lg transition-all duration-300 hover:scale-110"
                    >
                        <XMarkIcon class="w-6 h-6" />
                    </button>

                    <!-- Contact Form -->
                    <ContactForm @success="handleSuccess" />
                </div>
            </Transition>
        </div>
    </Transition>
</template>

<script setup>
import { XMarkIcon } from '@heroicons/vue/24/outline';
import ContactForm from './ContactForm.vue';

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
    // Don't close modal immediately - let user see success message
};
</script>
