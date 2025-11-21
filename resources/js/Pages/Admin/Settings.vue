<template>
    <Head title="Settings" />

    <AdminLayout page-title="Contact Page Settings" :user="user">
        <div class="space-y-6">
            <!-- Contact Settings -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Contact Information</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Manage your contact page details</p>
                </div>
                <form @submit.prevent="saveSettings" class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div v-for="setting in settingsForm" :key="setting.key" :class="setting.type === 'textarea' ? 'md:col-span-2' : ''">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                {{ setting.label }}
                            </label>
                            <textarea
                                v-if="setting.type === 'textarea'"
                                v-model="setting.value"
                                rows="3"
                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            ></textarea>
                            <div v-else-if="setting.type === 'boolean'" class="flex items-center gap-3">
                                <button
                                    type="button"
                                    @click="setting.value = setting.value === '1' ? '0' : '1'"
                                    :class="[
                                        'relative w-14 h-8 rounded-full transition-colors duration-200',
                                        setting.value === '1' ? 'bg-green-500' : 'bg-gray-300 dark:bg-gray-600'
                                    ]"
                                >
                                    <span
                                        :class="[
                                            'absolute top-1 w-6 h-6 bg-white rounded-full shadow transition-transform duration-200',
                                            setting.value === '1' ? 'translate-x-7' : 'translate-x-1'
                                        ]"
                                    ></span>
                                </button>
                                <span class="text-gray-700 dark:text-gray-300">{{ setting.value === '1' ? 'Enabled' : 'Disabled' }}</span>
                            </div>
                            <input
                                v-else
                                :type="setting.type === 'email' ? 'email' : setting.type === 'phone' ? 'tel' : 'text'"
                                v-model="setting.value"
                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            />
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button
                            type="submit"
                            :disabled="savingSettings"
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all disabled:opacity-50"
                        >
                            {{ savingSettings ? 'Saving...' : 'Save Settings' }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Social Links -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Social Links</h2>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Manage your social media links</p>
                    </div>
                    <button
                        @click="openSocialModal()"
                        class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all flex items-center gap-2"
                    >
                        <PlusIcon class="w-5 h-5" />
                        Add Link
                    </button>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div
                            v-for="link in socialLinks"
                            :key="link.id"
                            class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl border border-gray-200 dark:border-gray-700"
                        >
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 rounded-xl flex items-center justify-center"
                                    :style="{ backgroundColor: link.color }"
                                    v-html="link.icon"
                                ></div>
                                <div>
                                    <h3 class="font-medium text-gray-900 dark:text-white">{{ link.name }}</h3>
                                    <a :href="link.url" target="_blank" class="text-sm text-blue-600 hover:underline truncate block max-w-xs">{{ link.url }}</a>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span
                                    :class="[
                                        'px-2 py-1 text-xs rounded-full',
                                        link.is_active ? 'bg-green-100 dark:bg-green-900/50 text-green-600' : 'bg-gray-100 dark:bg-gray-700 text-gray-500'
                                    ]"
                                >
                                    {{ link.is_active ? 'Active' : 'Inactive' }}
                                </span>
                                <button
                                    @click="openSocialModal(link)"
                                    class="p-2 text-blue-600 hover:bg-blue-100 dark:hover:bg-blue-900/50 rounded-lg transition-colors"
                                >
                                    <PencilIcon class="w-5 h-5" />
                                </button>
                                <button
                                    @click="confirmDeleteSocial(link)"
                                    class="p-2 text-red-600 hover:bg-red-100 dark:hover:bg-red-900/50 rounded-lg transition-colors"
                                >
                                    <TrashIcon class="w-5 h-5" />
                                </button>
                            </div>
                        </div>
                        <div v-if="socialLinks.length === 0" class="text-center py-8 text-gray-500">
                            No social links added yet
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Link Modal -->
        <Transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition ease-in duration-150"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div v-if="showSocialModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showSocialModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-lg" @click.stop>
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            {{ editingSocial ? 'Edit Social Link' : 'Add Social Link' }}
                        </h3>
                    </div>
                    <form @submit.prevent="saveSocialLink" class="p-6 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                            <input
                                v-model="socialForm.name"
                                type="text"
                                required
                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500"
                                placeholder="e.g., LinkedIn"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">URL</label>
                            <input
                                v-model="socialForm.url"
                                type="url"
                                required
                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500"
                                placeholder="https://..."
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Icon Color</label>
                            <input
                                v-model="socialForm.color"
                                type="color"
                                class="w-full h-12 rounded-xl cursor-pointer"
                            />
                        </div>
                        <div class="flex items-center gap-3">
                            <input
                                v-model="socialForm.is_active"
                                type="checkbox"
                                id="is_active"
                                class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                            />
                            <label for="is_active" class="text-gray-700 dark:text-gray-300">Active</label>
                        </div>
                        <div class="flex gap-3 pt-4">
                            <button
                                type="button"
                                @click="showSocialModal = false"
                                class="flex-1 px-4 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"
                            >
                                Cancel
                            </button>
                            <button
                                type="submit"
                                class="flex-1 px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all"
                            >
                                {{ editingSocial ? 'Update' : 'Add' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </Transition>

        <!-- Delete Confirmation -->
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
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Delete Social Link?</h3>
                        <p class="text-gray-500 dark:text-gray-400">This action cannot be undone.</p>
                    </div>
                    <div class="mt-6 flex gap-3">
                        <button
                            @click="showDeleteModal = false"
                            class="flex-1 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium"
                        >
                            Cancel
                        </button>
                        <button
                            @click="deleteSocialLink"
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
import { ref, reactive } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import AdminLayout from '../../Layouts/AdminLayout.vue';
import { PlusIcon, PencilIcon, TrashIcon } from '@heroicons/vue/24/outline';

const props = defineProps({
    user: Object,
    settings: Array,
    socialLinks: Array,
});

const settingsForm = ref([...props.settings]);
const savingSettings = ref(false);
const showSocialModal = ref(false);
const showDeleteModal = ref(false);
const editingSocial = ref(null);
const deletingSocial = ref(null);

const socialForm = reactive({
    name: '',
    url: '',
    color: '#3b82f6',
    is_active: true,
});

const saveSettings = () => {
    savingSettings.value = true;
    router.put('/admin/contact', {
        settings: settingsForm.value.map(s => ({ key: s.key, value: s.value }))
    }, {
        preserveScroll: true,
        onFinish: () => savingSettings.value = false,
    });
};

const openSocialModal = (link = null) => {
    editingSocial.value = link;
    if (link) {
        socialForm.name = link.name;
        socialForm.url = link.url;
        socialForm.color = link.color;
        socialForm.is_active = link.is_active;
    } else {
        socialForm.name = '';
        socialForm.url = '';
        socialForm.color = '#3b82f6';
        socialForm.is_active = true;
    }
    showSocialModal.value = true;
};

const saveSocialLink = () => {
    if (editingSocial.value) {
        router.put(`/admin/contact/social/${editingSocial.value.id}`, socialForm, {
            preserveScroll: true,
            onSuccess: () => showSocialModal.value = false,
        });
    } else {
        router.post('/admin/contact/social', socialForm, {
            preserveScroll: true,
            onSuccess: () => showSocialModal.value = false,
        });
    }
};

const confirmDeleteSocial = (link) => {
    deletingSocial.value = link;
    showDeleteModal.value = true;
};

const deleteSocialLink = () => {
    router.delete(`/admin/contact/social/${deletingSocial.value.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            showDeleteModal.value = false;
            deletingSocial.value = null;
        },
    });
};
</script>
