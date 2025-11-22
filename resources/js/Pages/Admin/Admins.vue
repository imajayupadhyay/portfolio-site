<template>
    <Head title="Admin Management" />

    <AdminLayout page-title="Admin Management" :user="user">
        <!-- Admin List -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Administrators</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">{{ admins.length }} admin{{ admins.length !== 1 ? 's' : '' }}</p>
                </div>
                <button @click="openModal()" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all flex items-center gap-2">
                    <PlusIcon class="w-5 h-5" />
                    Add Admin
                </button>
            </div>
            <div class="p-6 space-y-4">
                <div v-for="admin in admins" :key="admin.id" class="relative p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl border border-gray-200 dark:border-gray-700">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 to-purple-600 flex items-center justify-center flex-shrink-0">
                            <UserIcon class="w-6 h-6 text-white" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-2">
                                <div>
                                    <h3 class="font-medium text-gray-900 dark:text-white">{{ admin.name }}</h3>
                                    <p class="text-sm text-blue-600 dark:text-blue-400">{{ admin.email }}</p>
                                </div>
                                <span v-if="admin.id === user.id" class="px-2 py-1 text-xs rounded-full bg-green-100 dark:bg-green-900/50 text-green-600">You</span>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Joined {{ formatDate(admin.created_at) }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex gap-2">
                            <button @click="openPasswordModal(admin)" class="px-3 py-2 text-sm text-amber-600 hover:bg-amber-100 dark:hover:bg-amber-900/50 rounded-lg transition-colors flex items-center gap-1">
                                <KeyIcon class="w-4 h-4" />
                                Change Password
                            </button>
                            <button @click="openModal(admin)" class="p-2 text-blue-600 hover:bg-blue-100 dark:hover:bg-blue-900/50 rounded-lg transition-colors">
                                <PencilIcon class="w-4 h-4" />
                            </button>
                            <button @click="confirmDelete(admin)" :disabled="admin.id === user.id" class="p-2 text-red-600 hover:bg-red-100 dark:hover:bg-red-900/50 rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                <TrashIcon class="w-4 h-4" />
                            </button>
                        </div>
                    </div>
                </div>
                <div v-if="admins.length === 0" class="text-center py-8 text-gray-500">No administrators yet</div>
            </div>
        </div>

        <!-- Add/Edit Modal -->
        <Transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md" @click.stop>
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ editing ? 'Edit Admin' : 'Add Admin' }}</h3>
                    </div>
                    <form @submit.prevent="save" class="p-6 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name *</label>
                            <input v-model="form.name" type="text" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="John Doe" />
                            <p v-if="errors.name" class="text-red-500 text-xs mt-1">{{ errors.name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email *</label>
                            <input v-model="form.email" type="email" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="admin@example.com" />
                            <p v-if="errors.email" class="text-red-500 text-xs mt-1">{{ errors.email }}</p>
                        </div>
                        <div v-if="!editing">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password *</label>
                            <input v-model="form.password" type="password" :required="!editing" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="••••••••" />
                            <p v-if="errors.password" class="text-red-500 text-xs mt-1">{{ errors.password }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Minimum 8 characters</p>
                        </div>
                        <div v-if="!editing">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Confirm Password *</label>
                            <input v-model="form.password_confirmation" type="password" :required="!editing" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="••••••••" />
                        </div>
                        <div class="flex justify-end gap-2 pt-4">
                            <button type="button" @click="showModal = false" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-xl transition-colors">
                                Cancel
                            </button>
                            <button type="submit" :disabled="processing" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all disabled:opacity-50">
                                {{ processing ? 'Saving...' : (editing ? 'Update' : 'Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </Transition>

        <!-- Password Modal -->
        <Transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-if="showPasswordModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showPasswordModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md" @click.stop>
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Change Password</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ passwordForm.name }}</p>
                    </div>
                    <form @submit.prevent="savePassword" class="p-6 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">New Password *</label>
                            <input v-model="passwordForm.password" type="password" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="••••••••" />
                            <p v-if="errors.password" class="text-red-500 text-xs mt-1">{{ errors.password }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Minimum 8 characters</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Confirm New Password *</label>
                            <input v-model="passwordForm.password_confirmation" type="password" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="••••••••" />
                        </div>
                        <div class="flex justify-end gap-2 pt-4">
                            <button type="button" @click="showPasswordModal = false" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-xl transition-colors">
                                Cancel
                            </button>
                            <button type="submit" :disabled="processing" class="px-6 py-2 bg-gradient-to-r from-amber-600 to-orange-600 text-white rounded-xl font-medium hover:shadow-lg transition-all disabled:opacity-50">
                                {{ processing ? 'Updating...' : 'Update Password' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </Transition>

        <!-- Delete Confirmation -->
        <Transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-if="showDeleteModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showDeleteModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md" @click.stop>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 rounded-full bg-red-100 dark:bg-red-900/50 flex items-center justify-center">
                                <ExclamationTriangleIcon class="w-6 h-6 text-red-600" />
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Delete Admin</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">This action cannot be undone</p>
                            </div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 mb-6">
                            Are you sure you want to delete <strong>{{ deleteTarget?.name }}</strong>?
                        </p>
                        <div class="flex justify-end gap-2">
                            <button type="button" @click="showDeleteModal = false" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-xl transition-colors">
                                Cancel
                            </button>
                            <button @click="deleteAdmin" :disabled="processing" class="px-6 py-2 bg-gradient-to-r from-red-600 to-pink-600 text-white rounded-xl font-medium hover:shadow-lg transition-all disabled:opacity-50">
                                {{ processing ? 'Deleting...' : 'Delete' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
    </AdminLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Head, router, usePage } from '@inertiajs/vue3';
import AdminLayout from '../../Layouts/AdminLayout.vue';
import {
    PlusIcon,
    PencilIcon,
    TrashIcon,
    UserIcon,
    KeyIcon,
    ExclamationTriangleIcon
} from '@heroicons/vue/24/outline';

const props = defineProps({
    admins: Array,
    user: Object
});

const page = usePage();
const errors = computed(() => page.props.errors || {});

const showModal = ref(false);
const showPasswordModal = ref(false);
const showDeleteModal = ref(false);
const editing = ref(false);
const processing = ref(false);
const deleteTarget = ref(null);

const form = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
});

const passwordForm = ref({
    id: null,
    name: '',
    password: '',
    password_confirmation: ''
});

const openModal = (admin = null) => {
    editing.value = !!admin;
    if (admin) {
        form.value = {
            id: admin.id,
            name: admin.name,
            email: admin.email,
            password: '',
            password_confirmation: ''
        };
    } else {
        form.value = {
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        };
    }
    showModal.value = true;
};

const openPasswordModal = (admin) => {
    passwordForm.value = {
        id: admin.id,
        name: admin.name,
        password: '',
        password_confirmation: ''
    };
    showPasswordModal.value = true;
};

const save = () => {
    processing.value = true;

    if (editing.value) {
        router.put(`/admin/admins/${form.value.id}`, {
            name: form.value.name,
            email: form.value.email
        }, {
            onSuccess: () => {
                showModal.value = false;
                processing.value = false;
            },
            onError: () => {
                processing.value = false;
            }
        });
    } else {
        router.post('/admin/admins', form.value, {
            onSuccess: () => {
                showModal.value = false;
                processing.value = false;
            },
            onError: () => {
                processing.value = false;
            }
        });
    }
};

const savePassword = () => {
    processing.value = true;

    router.put(`/admin/admins/${passwordForm.value.id}/password`, {
        password: passwordForm.value.password,
        password_confirmation: passwordForm.value.password_confirmation
    }, {
        onSuccess: () => {
            showPasswordModal.value = false;
            processing.value = false;
            passwordForm.value = {
                id: null,
                name: '',
                password: '',
                password_confirmation: ''
            };
        },
        onError: () => {
            processing.value = false;
        }
    });
};

const confirmDelete = (admin) => {
    if (admin.id === props.user.id) {
        alert('You cannot delete your own account');
        return;
    }
    deleteTarget.value = admin;
    showDeleteModal.value = true;
};

const deleteAdmin = () => {
    processing.value = true;
    router.delete(`/admin/admins/${deleteTarget.value.id}`, {
        onSuccess: () => {
            showDeleteModal.value = false;
            deleteTarget.value = null;
            processing.value = false;
        },
        onError: () => {
            processing.value = false;
        }
    });
};

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    });
};
</script>
