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
                <div class="relative">
                    <button
                        @click="toggleNotifications"
                        class="relative w-10 h-10 rounded-xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white transition-all duration-300"
                    >
                        <BellIcon class="w-5 h-5" />
                        <span
                            v-if="unreadCount > 0"
                            class="absolute -top-1 -right-1 min-w-[18px] h-[18px] px-1 bg-gradient-to-r from-red-500 to-pink-500 rounded-full text-[10px] font-bold text-white flex items-center justify-center shadow-lg"
                        >
                            {{ unreadCount > 99 ? '99+' : unreadCount }}
                        </span>
                    </button>

                    <!-- Notifications Dropdown -->
                    <Transition
                        enter-active-class="transition ease-out duration-200"
                        enter-from-class="opacity-0 scale-95 -translate-y-2"
                        enter-to-class="opacity-100 scale-100 translate-y-0"
                        leave-active-class="transition ease-in duration-150"
                        leave-from-class="opacity-100 scale-100 translate-y-0"
                        leave-to-class="opacity-0 scale-95 -translate-y-2"
                    >
                        <div
                            v-if="showNotifications"
                            class="absolute right-0 mt-2 w-96 bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 overflow-hidden z-50"
                        >
                            <!-- Header -->
                            <div class="p-4 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20">
                                <div class="flex items-center justify-between">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Notifications</h3>
                                    <button
                                        v-if="notifications.length > 0"
                                        @click="markAllAsRead"
                                        class="text-xs text-blue-600 dark:text-blue-400 hover:underline font-medium"
                                    >
                                        Clear All
                                    </button>
                                </div>
                                <p v-if="unreadCount > 0" class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    You have {{ unreadCount }} unread message{{ unreadCount !== 1 ? 's' : '' }}
                                </p>
                            </div>

                            <!-- Notifications List -->
                            <div class="max-h-96 overflow-y-auto">
                                <div v-if="notifications.length === 0" class="p-8 text-center">
                                    <BellIcon class="w-12 h-12 mx-auto text-gray-300 dark:text-gray-600 mb-3" />
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">No new notifications</p>
                                </div>
                                <div v-else>
                                    <div
                                        v-for="notification in notifications"
                                        :key="notification.id"
                                        class="p-4 border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors cursor-pointer group"
                                        @click="viewNotification(notification.id)"
                                    >
                                        <div class="flex gap-3">
                                            <div class="flex-shrink-0">
                                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center">
                                                    <EnvelopeIcon class="w-5 h-5 text-white" />
                                                </div>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-start justify-between gap-2">
                                                    <p class="font-medium text-sm text-gray-900 dark:text-white truncate">
                                                        {{ notification.title }}
                                                    </p>
                                                    <button
                                                        @click.stop="markAsRead(notification.id)"
                                                        class="opacity-0 group-hover:opacity-100 transition-opacity"
                                                        title="Mark as read"
                                                    >
                                                        <CheckCircleIcon class="w-5 h-5 text-green-500 hover:text-green-600" />
                                                    </button>
                                                </div>
                                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 line-clamp-2">
                                                    {{ notification.message }}
                                                </p>
                                                <div class="flex items-center gap-2 mt-2">
                                                    <span class="text-xs text-gray-400">{{ notification.time }}</span>
                                                    <span class="text-gray-300 dark:text-gray-600">•</span>
                                                    <span class="text-xs text-blue-600 dark:text-blue-400">{{ notification.email }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div v-if="notifications.length > 0" class="p-3 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                                <a
                                    href="/admin/messages"
                                    class="block text-center text-sm text-blue-600 dark:text-blue-400 hover:underline font-medium"
                                >
                                    View All Messages
                                </a>
                            </div>
                        </div>
                    </Transition>
                </div>

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
import axios from 'axios';
import {
    SunIcon,
    MoonIcon,
    BellIcon,
    UserIcon,
    Cog6ToothIcon,
    ChevronDownIcon,
    ArrowRightOnRectangleIcon,
    EnvelopeIcon,
    CheckCircleIcon
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
const showNotifications = ref(false);
const isDarkMode = ref(false);
const notifications = ref([]);
const unreadCount = ref(0);
let notificationInterval = null;

const toggleTheme = () => {
    isDarkMode.value = !isDarkMode.value;
    if (isDarkMode.value) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    localStorage.setItem('theme', isDarkMode.value ? 'dark' : 'light');
};

const toggleNotifications = () => {
    showNotifications.value = !showNotifications.value;
    if (showNotifications.value) {
        fetchNotifications();
    }
};

const fetchNotifications = async () => {
    try {
        const response = await axios.get('/admin/notifications');
        notifications.value = response.data.notifications;
        unreadCount.value = response.data.unread_count;
    } catch (error) {
        console.error('Failed to fetch notifications:', error);
    }
};

const markAsRead = async (id) => {
    try {
        await axios.post(`/admin/notifications/${id}/read`);
        await fetchNotifications();
    } catch (error) {
        console.error('Failed to mark notification as read:', error);
    }
};

const markAllAsRead = async () => {
    try {
        await axios.post('/admin/notifications/read-all');
        await fetchNotifications();
    } catch (error) {
        console.error('Failed to mark all notifications as read:', error);
    }
};

const viewNotification = (id) => {
    markAsRead(id);
    router.visit('/admin/messages');
    showNotifications.value = false;
};

const logout = () => {
    router.post('/admin/logout');
};

const handleClickOutside = (e) => {
    if (!e.target.closest('.relative')) {
        showUserMenu.value = false;
        showNotifications.value = false;
    }
};

onMounted(() => {
    isDarkMode.value = localStorage.getItem('theme') === 'dark';
    document.addEventListener('click', handleClickOutside);

    // Fetch notifications on mount
    fetchNotifications();

    // Poll for new notifications every 30 seconds
    notificationInterval = setInterval(() => {
        fetchNotifications();
    }, 30000);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
    if (notificationInterval) {
        clearInterval(notificationInterval);
    }
});
</script>
