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
        <nav class="p-4 space-y-2 overflow-y-auto" style="max-height: calc(100vh - 6rem);">
            <template v-for="item in menuItems" :key="item.name">
                <!-- Dropdown Group -->
                <div v-if="item.children">
                    <button
                        @click="toggleDropdown(item.name)"
                        :class="[
                            'w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group',
                            isGroupActive(item.children)
                                ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400'
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
                        <span v-if="!isCollapsed" class="font-medium flex-1 text-left">{{ item.name }}</span>
                        <ChevronDownIcon
                            v-if="!isCollapsed"
                            :class="[
                                'w-4 h-4 transition-transform',
                                openDropdowns.includes(item.name) ? 'rotate-180' : ''
                            ]"
                        />
                    </button>

                    <!-- Dropdown Items -->
                    <Transition
                        enter-active-class="transition ease-out duration-200"
                        enter-from-class="opacity-0 -translate-y-1"
                        enter-to-class="opacity-100 translate-y-0"
                        leave-active-class="transition ease-in duration-150"
                        leave-from-class="opacity-100 translate-y-0"
                        leave-to-class="opacity-0 -translate-y-1"
                    >
                        <div
                            v-if="openDropdowns.includes(item.name) && !isCollapsed"
                            class="ml-4 mt-2 space-y-1 border-l-2 border-gray-200 dark:border-gray-700 pl-2"
                        >
                            <a
                                v-for="child in item.children"
                                :key="child.name"
                                :href="child.href"
                                :class="[
                                    'flex items-center gap-3 px-3 py-2 rounded-lg transition-all duration-300 group text-sm',
                                    isActive(child.href)
                                        ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg shadow-blue-500/30'
                                        : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-gray-900 dark:hover:text-white'
                                ]"
                            >
                                <component
                                    :is="child.icon"
                                    class="w-4 h-4 flex-shrink-0 transition-transform group-hover:scale-110"
                                />
                                <span class="font-medium">{{ child.name }}</span>
                            </a>
                        </div>
                    </Transition>
                </div>

                <!-- Single Item -->
                <a
                    v-else
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
            </template>
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
import { ref, onMounted } from 'vue';
import {
    HomeIcon,
    FolderIcon,
    EnvelopeIcon,
    PhoneIcon,
    AcademicCapIcon,
    SparklesIcon,
    BriefcaseIcon,
    Square3Stack3DIcon,
    CodeBracketIcon,
    BookOpenIcon,
    Bars3Icon,
    UserGroupIcon,
    ChevronDownIcon,
    GlobeAltIcon
} from '@heroicons/vue/24/outline';

defineProps({
    isCollapsed: {
        type: Boolean,
        default: false
    }
});

defineEmits(['toggle']);

const openDropdowns = ref(['Homepage']); // Homepage open by default

const menuItems = [
    { name: 'Dashboard', href: '/admin/dashboard', icon: HomeIcon },
    { name: 'Admins', href: '/admin/admins', icon: UserGroupIcon },
    {
        name: 'Homepage',
        icon: GlobeAltIcon,
        children: [
            { name: 'Hero Section', href: '/admin/hero', icon: SparklesIcon },
            { name: 'Experience', href: '/admin/experience', icon: BriefcaseIcon },
            { name: 'Certifications', href: '/admin/certifications', icon: AcademicCapIcon },
            { name: 'Skills', href: '/admin/skills', icon: CodeBracketIcon },
        ]
    },
    { name: 'Projects', href: '/admin/projects', icon: FolderIcon },
    { name: 'Blog', href: '/admin/blog', icon: BookOpenIcon },
    { name: 'Messages', href: '/admin/messages', icon: EnvelopeIcon },
    { name: 'Contact Page', href: '/admin/contact', icon: PhoneIcon },
    { name: 'Header', href: '/admin/header', icon: Bars3Icon },
    { name: 'Footer', href: '/admin/footer', icon: Square3Stack3DIcon },
];

const toggleDropdown = (name) => {
    const index = openDropdowns.value.indexOf(name);
    if (index > -1) {
        openDropdowns.value.splice(index, 1);
    } else {
        openDropdowns.value.push(name);
    }
};

const isActive = (href) => {
    return window.location.pathname === href;
};

const isGroupActive = (children) => {
    return children.some(child => isActive(child.href));
};

// Auto-open dropdown if one of its children is active
onMounted(() => {
    menuItems.forEach(item => {
        if (item.children && isGroupActive(item.children)) {
            if (!openDropdowns.value.includes(item.name)) {
                openDropdowns.value.push(item.name);
            }
        }
    });
});
</script>
