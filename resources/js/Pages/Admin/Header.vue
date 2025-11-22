<template>
    <Head title="Header" />

    <AdminLayout page-title="Header" :user="user">
        <div class="space-y-6">
            <!-- Header Social Media Links -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Header Social Media Links</h2>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">{{ socialLinks.length }} social links in header</p>
                    </div>
                    <button @click="openModal()" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all flex items-center gap-2">
                        <PlusIcon class="w-5 h-5" />
                        Add Social Link
                    </button>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div
                            v-for="link in socialLinks"
                            :key="link.id"
                            class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow"
                        >
                            <div class="flex items-center gap-3 flex-1">
                                <div class="w-10 h-10 rounded-lg flex items-center justify-center text-white" :style="{ backgroundColor: link.color || '#3b82f6' }">
                                    <svg v-if="link.icon" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" v-html="link.icon"></svg>
                                    <span v-else class="text-xs font-bold">{{ link.name.charAt(0) }}</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2">
                                        <span class="font-medium text-gray-900 dark:text-white">{{ link.name }}</span>
                                        <span :class="['px-2 py-0.5 text-xs rounded-full', link.is_active ? 'bg-green-100 dark:bg-green-900/50 text-green-600' : 'bg-gray-100 dark:bg-gray-700 text-gray-500']">
                                            {{ link.is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                    <span class="text-xs text-gray-500 truncate block">{{ link.url }}</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <button @click="openModal(link)" class="p-2 text-blue-600 hover:bg-blue-100 dark:hover:bg-blue-900/50 rounded-lg transition-colors" title="Edit">
                                    <PencilIcon class="w-5 h-5" />
                                </button>
                                <button @click="confirmDelete(link)" class="p-2 text-red-600 hover:bg-red-100 dark:hover:bg-red-900/50 rounded-lg transition-colors" title="Delete">
                                    <TrashIcon class="w-5 h-5" />
                                </button>
                            </div>
                        </div>
                        <div v-if="socialLinks.length === 0" class="col-span-full text-center py-12 text-gray-500 dark:text-gray-400">
                            <p class="text-lg mb-2">No social links yet</p>
                            <p class="text-sm">Add social media links to display in the header navigation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Link Modal -->
        <Transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-lg" @click.stop>
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ editingLink ? 'Edit Social Link' : 'Add Social Link' }}</h3>
                    </div>
                    <form @submit.prevent="saveSocialLink" class="p-6 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Platform Name</label>
                            <input v-model="socialForm.name" type="text" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="LinkedIn, GitHub, Email, etc." />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">URL</label>
                            <input v-model="socialForm.url" type="url" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="https://..." />
                            <p class="text-xs text-gray-500 mt-1">For email use: mailto:your@email.com, For phone use: tel:+1234567890</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Icon (SVG Path)</label>
                            <textarea v-model="socialForm.icon" rows="3" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 font-mono text-xs" placeholder="<path d='...'/>"></textarea>
                            <p class="text-xs text-gray-500 mt-1">Paste SVG path from <a href="https://simpleicons.org" target="_blank" class="text-blue-500 hover:underline">SimpleIcons.org</a> or use Heroicons</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Brand Color (Hex)</label>
                            <div class="flex gap-2">
                                <input v-model="socialForm.color" type="color" class="w-16 h-12 rounded-lg border border-gray-200 dark:border-gray-700 cursor-pointer" />
                                <input v-model="socialForm.color" type="text" class="flex-1 px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="#3b82f6" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Order</label>
                            <input v-model.number="socialForm.order" type="number" min="0" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="0" />
                            <p class="text-xs text-gray-500 mt-1">Lower numbers appear first</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <input v-model="socialForm.is_active" type="checkbox" id="social_active" class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
                            <label for="social_active" class="text-gray-700 dark:text-gray-300">Active</label>
                        </div>
                        <div class="flex gap-3 pt-4">
                            <button type="button" @click="showModal = false" class="flex-1 px-4 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">Cancel</button>
                            <button type="submit" class="flex-1 px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all">{{ editingLink ? 'Update' : 'Create' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </Transition>

        <!-- Delete Confirmation -->
        <Transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-if="showDeleteModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showDeleteModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md p-6" @click.stop>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-red-100 dark:bg-red-900/50 flex items-center justify-center">
                            <TrashIcon class="w-8 h-8 text-red-600" />
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Delete Social Link?</h3>
                        <p class="text-gray-500 dark:text-gray-400 mb-1">{{ deletingLink?.name }}</p>
                        <p class="text-sm text-gray-400">This action cannot be undone.</p>
                    </div>
                    <div class="mt-6 flex gap-3">
                        <button @click="showDeleteModal = false" class="flex-1 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">Cancel</button>
                        <button @click="deleteSocialLink" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-xl font-medium hover:bg-red-700 transition-colors">Delete</button>
                    </div>
                </div>
            </div>
        </Transition>
    </AdminLayout>
</template>

<script setup>
import { ref, reactive } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import AdminLayout from '../../Layouts/AdminLayout.vue';
import { PlusIcon, PencilIcon, TrashIcon } from '@heroicons/vue/24/outline';

const props = defineProps({
    user: Object,
    socialLinks: Array,
});

const showModal = ref(false);
const showDeleteModal = ref(false);
const editingLink = ref(null);
const deletingLink = ref(null);

const socialForm = reactive({
    name: '',
    url: '',
    icon: '',
    color: '#3b82f6',
    order: 0,
    is_active: true,
});

const openModal = (link = null) => {
    editingLink.value = link;
    if (link) {
        socialForm.name = link.name;
        socialForm.url = link.url;
        socialForm.icon = link.icon || '';
        socialForm.color = link.color || '#3b82f6';
        socialForm.order = link.order || 0;
        socialForm.is_active = link.is_active;
    } else {
        socialForm.name = '';
        socialForm.url = '';
        socialForm.icon = '';
        socialForm.color = '#3b82f6';
        socialForm.order = props.socialLinks.length;
        socialForm.is_active = true;
    }
    showModal.value = true;
};

const saveSocialLink = () => {
    if (editingLink.value) {
        router.put(`/admin/header/social/${editingLink.value.id}`, socialForm, {
            preserveScroll: true,
            onSuccess: () => showModal.value = false,
        });
    } else {
        router.post('/admin/header/social', socialForm, {
            preserveScroll: true,
            onSuccess: () => showModal.value = false,
        });
    }
};

const confirmDelete = (link) => {
    deletingLink.value = link;
    showDeleteModal.value = true;
};

const deleteSocialLink = () => {
    router.delete(`/admin/header/social/${deletingLink.value.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            showDeleteModal.value = false;
            deletingLink.value = null;
        },
    });
};
</script>
