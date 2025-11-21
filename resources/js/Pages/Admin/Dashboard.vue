<template>
    <Head title="Dashboard" />

    <AdminLayout page-title="Dashboard" :user="user">
        <!-- Welcome Card -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-600 to-purple-600 flex items-center justify-center shadow-lg shadow-blue-500/30">
                    <span class="text-2xl font-bold text-white">{{ user.name.charAt(0) }}</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Hello, {{ user.name }}!</h1>
                    <p class="text-gray-500 dark:text-gray-400 mt-1">Welcome to your admin dashboard</p>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/30 dark:to-blue-800/30 rounded-xl p-6 border border-blue-200 dark:border-blue-800">
                    <div class="text-blue-600 dark:text-blue-400 text-sm font-medium">Status</div>
                    <div class="text-gray-900 dark:text-white text-2xl font-bold mt-2">Active</div>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/30 dark:to-purple-800/30 rounded-xl p-6 border border-purple-200 dark:border-purple-800">
                    <div class="text-purple-600 dark:text-purple-400 text-sm font-medium">Role</div>
                    <div class="text-gray-900 dark:text-white text-2xl font-bold mt-2">Admin</div>
                </div>
                <div class="bg-gradient-to-br from-pink-50 to-pink-100 dark:from-pink-900/30 dark:to-pink-800/30 rounded-xl p-6 border border-pink-200 dark:border-pink-800">
                    <div class="text-pink-600 dark:text-pink-400 text-sm font-medium">Last Login</div>
                    <div class="text-gray-900 dark:text-white text-2xl font-bold mt-2">Just Now</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a
                href="/admin/projects"
                class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-xl p-6 border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500 transition-all duration-300 group"
            >
                <div class="w-12 h-12 rounded-xl bg-blue-100 dark:bg-blue-900/50 flex items-center justify-center text-blue-600 dark:text-blue-400 group-hover:scale-110 transition-transform">
                    <FolderIcon class="w-6 h-6" />
                </div>
                <h3 class="mt-4 font-semibold text-gray-900 dark:text-white">Projects</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your projects</p>
            </a>

            <a
                href="/admin/messages"
                class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-xl p-6 border border-gray-200 dark:border-gray-700 hover:border-purple-500 dark:hover:border-purple-500 transition-all duration-300 group"
            >
                <div class="w-12 h-12 rounded-xl bg-purple-100 dark:bg-purple-900/50 flex items-center justify-center text-purple-600 dark:text-purple-400 group-hover:scale-110 transition-transform">
                    <EnvelopeIcon class="w-6 h-6" />
                </div>
                <h3 class="mt-4 font-semibold text-gray-900 dark:text-white">Messages</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">View contact messages</p>
            </a>

            <a
                href="/admin/profile"
                class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-xl p-6 border border-gray-200 dark:border-gray-700 hover:border-pink-500 dark:hover:border-pink-500 transition-all duration-300 group"
            >
                <div class="w-12 h-12 rounded-xl bg-pink-100 dark:bg-pink-900/50 flex items-center justify-center text-pink-600 dark:text-pink-400 group-hover:scale-110 transition-transform">
                    <UserIcon class="w-6 h-6" />
                </div>
                <h3 class="mt-4 font-semibold text-gray-900 dark:text-white">Profile</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Update your profile</p>
            </a>

            <a
                href="/admin/settings"
                class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-xl p-6 border border-gray-200 dark:border-gray-700 hover:border-gray-500 dark:hover:border-gray-500 transition-all duration-300 group"
            >
                <div class="w-12 h-12 rounded-xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-gray-600 dark:text-gray-400 group-hover:scale-110 transition-transform">
                    <Cog6ToothIcon class="w-6 h-6" />
                </div>
                <h3 class="mt-4 font-semibold text-gray-900 dark:text-white">Settings</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Configure settings</p>
            </a>
        </div>
    </AdminLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '../../Layouts/AdminLayout.vue';
import {
    FolderIcon,
    EnvelopeIcon,
    UserIcon,
    Cog6ToothIcon
} from '@heroicons/vue/24/outline';

defineProps({
    user: Object,
});
</script>
