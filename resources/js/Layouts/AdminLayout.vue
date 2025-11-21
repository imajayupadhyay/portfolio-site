<template>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <!-- Background decorations -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-500/5 dark:bg-purple-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-500/5 dark:bg-blue-500/10 rounded-full blur-3xl"></div>
        </div>

        <!-- Sidebar -->
        <Sidebar :is-collapsed="sidebarCollapsed" @toggle="sidebarCollapsed = !sidebarCollapsed" />

        <!-- Topbar -->
        <Topbar
            :page-title="pageTitle"
            :user="user"
            :sidebar-collapsed="sidebarCollapsed"
        />

        <!-- Main Content -->
        <main
            :class="[
                'relative z-10 pt-16 min-h-screen transition-all duration-300',
                sidebarCollapsed ? 'ml-20' : 'ml-64'
            ]"
        >
            <div class="p-6">
                <slot />
            </div>
        </main>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Sidebar from '../Components/Admin/Sidebar.vue';
import Topbar from '../Components/Admin/Topbar.vue';

defineProps({
    pageTitle: {
        type: String,
        default: 'Dashboard'
    },
    user: {
        type: Object,
        default: null
    }
});

const sidebarCollapsed = ref(false);

onMounted(() => {
    // Initialize theme
    const savedTheme = localStorage.getItem('theme') || 'dark';
    if (savedTheme === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
});
</script>
