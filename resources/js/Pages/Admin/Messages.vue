<template>
    <Head title="Messages" />

    <AdminLayout page-title="Messages" :user="user">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Contact Messages</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Manage messages from your contact form</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="px-3 py-1 text-sm bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 rounded-full">
                    {{ messages.total }} total
                </span>
                <span class="px-3 py-1 text-sm bg-yellow-100 dark:bg-yellow-900/50 text-yellow-600 dark:text-yellow-400 rounded-full">
                    {{ unreadCount }} unread
                </span>
            </div>
        </div>

        <!-- Messages Table -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-900/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Subject</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <tr
                            v-for="message in messages.data"
                            :key="message.id"
                            :class="[
                                'hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors cursor-pointer',
                                !message.is_read ? 'bg-blue-50/50 dark:bg-blue-900/10' : ''
                            ]"
                            @click="viewMessage(message)"
                        >
                            <td class="px-6 py-4">
                                <span
                                    :class="[
                                        'w-3 h-3 rounded-full inline-block',
                                        message.is_read ? 'bg-gray-300 dark:bg-gray-600' : 'bg-blue-500 animate-pulse'
                                    ]"
                                ></span>
                            </td>
                            <td class="px-6 py-4">
                                <div :class="['font-medium', !message.is_read ? 'text-gray-900 dark:text-white' : 'text-gray-600 dark:text-gray-400']">
                                    {{ message.name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ message.email }}</td>
                            <td class="px-6 py-4">
                                <div :class="['truncate max-w-xs', !message.is_read ? 'text-gray-900 dark:text-white font-medium' : 'text-gray-600 dark:text-gray-400']">
                                    {{ message.subject || 'No subject' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-500 dark:text-gray-400 text-sm">
                                {{ formatDate(message.created_at) }}
                            </td>
                            <td class="px-6 py-4 text-right" @click.stop>
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        @click="viewMessage(message)"
                                        class="p-2 text-blue-600 hover:bg-blue-100 dark:hover:bg-blue-900/50 rounded-lg transition-colors"
                                        title="View"
                                    >
                                        <EyeIcon class="w-5 h-5" />
                                    </button>
                                    <button
                                        v-if="message.is_read"
                                        @click="toggleRead(message, false)"
                                        class="p-2 text-yellow-600 hover:bg-yellow-100 dark:hover:bg-yellow-900/50 rounded-lg transition-colors"
                                        title="Mark as unread"
                                    >
                                        <EnvelopeIcon class="w-5 h-5" />
                                    </button>
                                    <button
                                        v-else
                                        @click="toggleRead(message, true)"
                                        class="p-2 text-green-600 hover:bg-green-100 dark:hover:bg-green-900/50 rounded-lg transition-colors"
                                        title="Mark as read"
                                    >
                                        <EnvelopeOpenIcon class="w-5 h-5" />
                                    </button>
                                    <button
                                        @click="confirmDelete(message)"
                                        class="p-2 text-red-600 hover:bg-red-100 dark:hover:bg-red-900/50 rounded-lg transition-colors"
                                        title="Delete"
                                    >
                                        <TrashIcon class="w-5 h-5" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="messages.data.length === 0">
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                <EnvelopeIcon class="w-12 h-12 mx-auto mb-4 opacity-50" />
                                <p>No messages yet</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div v-if="messages.last_page > 1" class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Showing {{ messages.from }} to {{ messages.to }} of {{ messages.total }}
                </p>
                <div class="flex gap-2">
                    <a
                        v-for="link in messages.links"
                        :key="link.label"
                        :href="link.url"
                        :class="[
                            'px-3 py-1 rounded-lg text-sm transition-colors',
                            link.active
                                ? 'bg-blue-600 text-white'
                                : link.url
                                    ? 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600'
                                    : 'bg-gray-50 dark:bg-gray-800 text-gray-400 cursor-not-allowed'
                        ]"
                        v-html="link.label"
                    ></a>
                </div>
            </div>
        </div>

        <!-- View Modal -->
        <Transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition ease-in duration-150"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div v-if="showViewModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showViewModal = false">
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-hidden"
                    @click.stop
                >
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Message Details</h3>
                        <button @click="showViewModal = false" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                            <XMarkIcon class="w-5 h-5 text-gray-500" />
                        </button>
                    </div>
                    <div v-if="selectedMessage" class="p-6 overflow-y-auto max-h-[60vh]">
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="text-sm text-gray-500 dark:text-gray-400">Name</label>
                                    <p class="font-medium text-gray-900 dark:text-white">{{ selectedMessage.name }}</p>
                                </div>
                                <div>
                                    <label class="text-sm text-gray-500 dark:text-gray-400">Email</label>
                                    <p class="font-medium text-gray-900 dark:text-white">
                                        <a :href="'mailto:' + selectedMessage.email" class="text-blue-600 hover:underline">{{ selectedMessage.email }}</a>
                                    </p>
                                </div>
                                <div>
                                    <label class="text-sm text-gray-500 dark:text-gray-400">Phone</label>
                                    <p class="font-medium text-gray-900 dark:text-white">{{ selectedMessage.phone || 'N/A' }}</p>
                                </div>
                                <div>
                                    <label class="text-sm text-gray-500 dark:text-gray-400">Date</label>
                                    <p class="font-medium text-gray-900 dark:text-white">{{ formatDate(selectedMessage.created_at) }}</p>
                                </div>
                            </div>
                            <div>
                                <label class="text-sm text-gray-500 dark:text-gray-400">Subject</label>
                                <p class="font-medium text-gray-900 dark:text-white">{{ selectedMessage.subject || 'No subject' }}</p>
                            </div>
                            <div>
                                <label class="text-sm text-gray-500 dark:text-gray-400">Message</label>
                                <div class="mt-2 p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl text-gray-700 dark:text-gray-300 whitespace-pre-wrap">
                                    {{ selectedMessage.message }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-3">
                        <a
                            :href="'mailto:' + selectedMessage?.email"
                            class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all"
                        >
                            Reply via Email
                        </a>
                        <button
                            @click="showViewModal = false"
                            class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </Transition>

        <!-- Delete Confirmation Modal -->
        <Transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition ease-in duration-150"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div v-if="showDeleteModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showDeleteModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md p-6" @click.stop>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-red-100 dark:bg-red-900/50 flex items-center justify-center">
                            <TrashIcon class="w-8 h-8 text-red-600" />
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Delete Message?</h3>
                        <p class="text-gray-500 dark:text-gray-400">This action cannot be undone. The message will be permanently deleted.</p>
                    </div>
                    <div class="mt-6 flex gap-3">
                        <button
                            @click="showDeleteModal = false"
                            class="flex-1 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"
                        >
                            Cancel
                        </button>
                        <button
                            @click="deleteMessage"
                            class="flex-1 px-4 py-2 bg-red-600 text-white rounded-xl font-medium hover:bg-red-700 transition-colors"
                        >
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </Transition>
    </AdminLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import AdminLayout from '../../Layouts/AdminLayout.vue';
import {
    EyeIcon,
    TrashIcon,
    EnvelopeIcon,
    EnvelopeOpenIcon,
    XMarkIcon
} from '@heroicons/vue/24/outline';

const props = defineProps({
    user: Object,
    messages: Object,
});

const showViewModal = ref(false);
const showDeleteModal = ref(false);
const selectedMessage = ref(null);

const unreadCount = computed(() => {
    return props.messages.data.filter(m => !m.is_read).length;
});

const formatDate = (date) => {
    return new Date(date).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
};

const viewMessage = (message) => {
    selectedMessage.value = message;
    showViewModal.value = true;
    if (!message.is_read) {
        router.patch(`/admin/messages/${message.id}/read`, {}, { preserveScroll: true });
    }
};

const toggleRead = (message, read) => {
    const url = read ? `/admin/messages/${message.id}/read` : `/admin/messages/${message.id}/unread`;
    router.patch(url, {}, { preserveScroll: true });
};

const confirmDelete = (message) => {
    selectedMessage.value = message;
    showDeleteModal.value = true;
};

const deleteMessage = () => {
    router.delete(`/admin/messages/${selectedMessage.value.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            showDeleteModal.value = false;
            selectedMessage.value = null;
        }
    });
};
</script>
