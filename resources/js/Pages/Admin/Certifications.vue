<template>
    <Head title="Certifications" />

    <AdminLayout page-title="Certifications" :user="user">
        <!-- Page Settings -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Section Settings</h2>
                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Customize the certifications section heading</p>
            </div>
            <form @submit.prevent="saveSettings" class="p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Badge Text</label>
                        <input v-model="settingsForm.certifications_badge" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Professional Certifications" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Heading</label>
                        <input v-model="settingsForm.certifications_heading" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Industry Certifications" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                        <input v-model="settingsForm.certifications_description" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Validated expertise..." />
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all">Save Settings</button>
                </div>
            </form>
        </div>

        <!-- Certifications List -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Certifications</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">{{ certifications.length }} certifications</p>
                </div>
                <button @click="openModal()" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all flex items-center gap-2">
                    <PlusIcon class="w-5 h-5" />
                    Add Certification
                </button>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div
                        v-for="cert in certifications"
                        :key="cert.id"
                        class="relative p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl border border-gray-200 dark:border-gray-700"
                    >
                        <div class="flex items-start gap-4">
                            <div
                                class="w-16 h-16 rounded-xl flex items-center justify-center flex-shrink-0"
                                :style="{ background: `linear-gradient(135deg, ${cert.gradient_from}, ${cert.gradient_to})` }"
                            >
                                <img v-if="cert.badge_image" :src="cert.badge_image" :alt="cert.title" class="w-12 h-12 object-contain" />
                                <AcademicCapIcon v-else class="w-8 h-8 text-white" />
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="font-medium text-gray-900 dark:text-white truncate">{{ cert.title }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ cert.level }} - {{ cert.code }}</p>
                                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ cert.provider }}</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <span :class="['px-2 py-1 text-xs rounded-full', cert.is_active ? 'bg-green-100 dark:bg-green-900/50 text-green-600' : 'bg-gray-100 dark:bg-gray-700 text-gray-500']">
                                {{ cert.is_active ? 'Active' : 'Inactive' }}
                            </span>
                            <div class="flex gap-2">
                                <button @click="openModal(cert)" class="p-2 text-blue-600 hover:bg-blue-100 dark:hover:bg-blue-900/50 rounded-lg transition-colors">
                                    <PencilIcon class="w-4 h-4" />
                                </button>
                                <button @click="confirmDelete(cert)" class="p-2 text-red-600 hover:bg-red-100 dark:hover:bg-red-900/50 rounded-lg transition-colors">
                                    <TrashIcon class="w-4 h-4" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="certifications.length === 0" class="text-center py-8 text-gray-500">No certifications yet</div>
            </div>
        </div>

        <!-- Modal -->
        <Transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-xl max-h-[90vh] overflow-hidden" @click.stop>
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ editing ? 'Edit Certification' : 'Add Certification' }}</h3>
                    </div>
                    <form @submit.prevent="save" class="p-6 space-y-4 overflow-y-auto max-h-[60vh]">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                <input v-model="form.title" type="text" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="AWS Certified Developer" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Level</label>
                                <input v-model="form.level" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Associate" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Code</label>
                                <input v-model="form.code" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="DVA-C02" />
                            </div>
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Provider</label>
                                <input v-model="form.provider" type="text" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Amazon Web Services" />
                            </div>
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Badge Image</label>
                                <div class="flex items-center gap-4">
                                    <div v-if="form.badge_image" class="w-20 h-20 rounded-xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center overflow-hidden">
                                        <img :src="form.badge_image" alt="Badge" class="w-full h-full object-contain" />
                                    </div>
                                    <div class="flex-1">
                                        <input
                                            type="file"
                                            ref="badgeInput"
                                            @change="uploadBadge"
                                            accept="image/*"
                                            class="hidden"
                                        />
                                        <button
                                            type="button"
                                            @click="$refs.badgeInput.click()"
                                            :disabled="uploading"
                                            class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors disabled:opacity-50"
                                        >
                                            {{ uploading ? 'Uploading...' : (form.badge_image ? 'Change Image' : 'Upload Image') }}
                                        </button>
                                        <p class="text-xs text-gray-500 mt-1">PNG, JPG, SVG up to 2MB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Credential URL</label>
                                <input v-model="form.credential_url" type="url" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="https://credly.com/..." />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Gradient From</label>
                                <input v-model="form.gradient_from" type="color" class="w-full h-12 rounded-xl cursor-pointer" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Gradient To</label>
                                <input v-model="form.gradient_to" type="color" class="w-full h-12 rounded-xl cursor-pointer" />
                            </div>
                            <div class="col-span-2 flex items-center gap-3">
                                <input v-model="form.is_active" type="checkbox" id="cert_active" class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
                                <label for="cert_active" class="text-gray-700 dark:text-gray-300">Active</label>
                            </div>
                        </div>
                        <div class="flex gap-3 pt-4">
                            <button type="button" @click="showModal = false" class="flex-1 px-4 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium">Cancel</button>
                            <button type="submit" class="flex-1 px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all">{{ editing ? 'Update' : 'Create' }}</button>
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
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Delete Certification?</h3>
                        <p class="text-gray-500 dark:text-gray-400">This action cannot be undone.</p>
                    </div>
                    <div class="mt-6 flex gap-3">
                        <button @click="showDeleteModal = false" class="flex-1 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium">Cancel</button>
                        <button @click="deleteCert" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-xl font-medium hover:bg-red-700 transition-colors">Delete</button>
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
import { PlusIcon, PencilIcon, TrashIcon, AcademicCapIcon } from '@heroicons/vue/24/outline';

const props = defineProps({
    user: Object,
    certifications: Array,
    settings: Object,
});

const settingsForm = reactive({
    certifications_badge: props.settings?.certifications_badge || '',
    certifications_heading: props.settings?.certifications_heading || '',
    certifications_description: props.settings?.certifications_description || '',
});

const saveSettings = () => {
    router.put('/admin/certifications-settings', settingsForm, {
        preserveScroll: true,
    });
};

const showModal = ref(false);
const showDeleteModal = ref(false);
const editing = ref(null);
const deleting = ref(null);
const uploading = ref(false);

const form = reactive({
    title: '',
    level: '',
    code: '',
    provider: '',
    badge_image: '',
    credential_url: '',
    gradient_from: '#3b82f6',
    gradient_to: '#8b5cf6',
    is_active: true,
});

const openModal = (cert = null) => {
    editing.value = cert;
    if (cert) {
        Object.assign(form, cert);
    } else {
        form.title = '';
        form.level = '';
        form.code = '';
        form.provider = '';
        form.badge_image = '';
        form.credential_url = '';
        form.gradient_from = '#3b82f6';
        form.gradient_to = '#8b5cf6';
        form.is_active = true;
    }
    showModal.value = true;
};

const save = () => {
    if (editing.value) {
        router.put(`/admin/certifications/${editing.value.id}`, form, {
            preserveScroll: true,
            onSuccess: () => showModal.value = false,
        });
    } else {
        router.post('/admin/certifications', form, {
            preserveScroll: true,
            onSuccess: () => showModal.value = false,
        });
    }
};

const uploadBadge = async (event) => {
    const file = event.target.files[0];
    if (!file) return;

    uploading.value = true;
    const formData = new FormData();
    formData.append('badge', file);

    try {
        const response = await fetch('/admin/certifications/upload-badge', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
        });
        const data = await response.json();
        form.badge_image = data.path;
    } catch (error) {
        console.error('Upload failed:', error);
    } finally {
        uploading.value = false;
    }
};

const confirmDelete = (cert) => {
    deleting.value = cert;
    showDeleteModal.value = true;
};

const deleteCert = () => {
    router.delete(`/admin/certifications/${deleting.value.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            showDeleteModal.value = false;
            deleting.value = null;
        },
    });
};
</script>
