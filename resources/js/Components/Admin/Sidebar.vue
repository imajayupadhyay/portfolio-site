<template>
    <aside
        :class="[
            'fixed left-0 top-0 h-full z-40 transition-all duration-300',
            isCollapsed ? 'w-20' : 'w-64',
            'bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl border-r border-gray-200 dark:border-gray-800'
        ]"
    >
        <!-- Logo -->
        <div class="flex items-center h-16 px-4 border-b border-gray-200 dark:border-gray-800">
            <a href="/" class="flex items-center gap-3 group">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl blur-md opacity-75 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-purple-600 flex items-center justify-center">
                        <span class="text-white font-bold text-lg">A</span>
                    </div>
                </div>
                <span
                    v-if="!isCollapsed"
                    class="text-lg font-bold text-gray-900 dark:text-white transition-opacity"
                >
                    Admin
                </span>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="p-4 space-y-2">
            <a
                v-for="item in menuItems"
                :key="item.name"
                :href="item.href"
                :class="[
                    'flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group',
                    isActive(item.href)
                        ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg shadow-blue-500/30'
                        : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800'
                ]"
            >
                <component
                    :is="item.icon"
                    :class="[
                        'w-5 h-5 flex-shrink-0 transition-transform group-hover:scale-110',
                        isCollapsed ? 'mx-auto' : ''
                    ]"
                />
                <span v-if="!isCollapsed" class="font-medium">{{ item.name }}</span>
            </a>
        </nav>

        <!-- Collapse Toggle -->
        <button
            @click="$emit('toggle')"
            class="absolute bottom-4 right-0 translate-x-1/2 w-8 h-8 rounded-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 flex items-center justify-center text-gray-500 hover:text-gray-900 dark:hover:text-white transition-colors shadow-lg"
        >
            <svg
                :class="['w-4 h-4 transition-transform', isCollapsed ? 'rotate-180' : '']"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
    </aside>
</template>

<script setup>
import {
    HomeIcon,
    FolderIcon,
    EnvelopeIcon,
    Cog6ToothIcon,
    UserIcon
} from '@heroicons/vue/24/outline';

defineProps({
    isCollapsed: {
        type: Boolean,
        default: false
    }
});

defineEmits(['toggle']);

const menuItems = [
    { name: 'Dashboard', href: '/admin/dashboard', icon: HomeIcon },
    { name: 'Projects', href: '/admin/projects', icon: FolderIcon },
    { name: 'Messages', href: '/admin/messages', icon: EnvelopeIcon },
    { name: 'Profile', href: '/admin/profile', icon: UserIcon },
    { name: 'Settings', href: '/admin/settings', icon: Cog6ToothIcon },
];

const isActive = (href) => {
    return window.location.pathname === href;
};
</script>
