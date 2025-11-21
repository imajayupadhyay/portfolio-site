<template>
    <header
        :class="[
            'fixed top-0 right-0 h-16 z-30 transition-all duration-300',
            'bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl border-b border-gray-200 dark:border-gray-800',
            sidebarCollapsed ? 'left-20' : 'left-64'
        ]"
    >
        <div class="flex items-center justify-between h-full px-6">
            <!-- Left: Page Title / Breadcrumb -->
            <div>
                <h1 class="text-xl font-semibold text-gray-900 dark:text-white">{{ pageTitle }}</h1>
            </div>

            <!-- Right: Actions -->
            <div class="flex items-center gap-4">
                <!-- Theme Toggle -->
                <button
                    @click="toggleTheme"
                    class="w-10 h-10 rounded-xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white transition-all duration-300"
                >
                    <SunIcon v-if="isDarkMode" class="w-5 h-5" />
                    <MoonIcon v-else class="w-5 h-5" />
                </button>

                <!-- Notifications -->
                <button class="relative w-10 h-10 rounded-xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white transition-all duration-300">
                    <BellIcon class="w-5 h-5" />
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-[10px] text-white flex items-center justify-center">3</span>
                </button>

                <!-- User Menu -->
                <div class="relative">
                    <button
                        @click="showUserMenu = !showUserMenu"
                        class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
                    >
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-600 to-purple-600 flex items-center justify-center">
                            <span class="text-white font-medium text-sm">{{ user?.name?.charAt(0) || 'A' }}</span>
                        </div>
                        <div class="hidden sm:block text-left">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ user?.name }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Admin</p>
                        </div>
                        <ChevronDownIcon class="w-4 h-4 text-gray-500" />
                    </button>

                    <!-- Dropdown -->
                    <Transition
                        enter-active-class="transition ease-out duration-200"
                        enter-from-class="opacity-0 scale-95"
                        enter-to-class="opacity-100 scale-100"
                        leave-active-class="transition ease-in duration-150"
                        leave-from-class="opacity-100 scale-100"
                        leave-to-class="opacity-0 scale-95"
                    >
                        <div
                            v-if="showUserMenu"
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-200 dark:border-gray-700 py-2 z-50"
                        >
                            <a
                                href="/admin/profile"
                                class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                            >
                                <UserIcon class="w-4 h-4" />
                                Profile
                            </a>
                            <a
                                href="/admin/settings"
                                class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                            >
                                <Cog6ToothIcon class="w-4 h-4" />
                                Settings
                            </a>
                            <hr class="my-2 border-gray-200 dark:border-gray-700" />
                            <button
                                @click="logout"
                                class="flex items-center gap-2 w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20"
                            >
                                <ArrowRightOnRectangleIcon class="w-4 h-4" />
                                Logout
                            </button>
                        </div>
                    </Transition>
                </div>
            </div>
        </div>
    </header>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { router } from '@inertiajs/vue3';
import {
    SunIcon,
    MoonIcon,
    BellIcon,
    UserIcon,
    Cog6ToothIcon,
    ChevronDownIcon,
    ArrowRightOnRectangleIcon
} from '@heroicons/vue/24/outline';

defineProps({
    pageTitle: {
        type: String,
        default: 'Dashboard'
    },
    user: {
        type: Object,
        default: null
    },
    sidebarCollapsed: {
        type: Boolean,
        default: false
    }
});

const showUserMenu = ref(false);
const isDarkMode = ref(false);

const toggleTheme = () => {
    isDarkMode.value = !isDarkMode.value;
    if (isDarkMode.value) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    localStorage.setItem('theme', isDarkMode.value ? 'dark' : 'light');
};

const logout = () => {
    router.post('/admin/logout');
};

const handleClickOutside = (e) => {
    if (!e.target.closest('.relative')) {
        showUserMenu.value = false;
    }
};

onMounted(() => {
    isDarkMode.value = localStorage.getItem('theme') === 'dark';
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});
</script>
