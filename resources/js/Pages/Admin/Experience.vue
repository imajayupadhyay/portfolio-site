<template>
    <Head title="Experience" />

    <AdminLayout page-title="Experience" :user="user">
        <!-- Section Settings -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Section Settings</h2>
                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Customize the experience section header</p>
            </div>
            <form @submit.prevent="saveSettings" class="p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Badge Text</label>
                        <input v-model="settingsForm.experience_badge" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Professional Journey" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Heading</label>
                        <input v-model="settingsForm.experience_heading" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Work Experience" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                        <input v-model="settingsForm.experience_description" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Building scalable cloud solutions..." />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Total Experience Text</label>
                        <input v-model="settingsForm.experience_total_text" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="3+ Years of Professional Experience" />
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all">Save Settings</button>
                </div>
            </form>
        </div>

        <!-- Experience List -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Experience</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">{{ experiences.length }} experiences</p>
                </div>
                <button @click="openModal()" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all flex items-center gap-2">
                    <PlusIcon class="w-5 h-5" />
                    Add Experience
                </button>
            </div>
            <div class="p-6 space-y-4">
                <div v-for="exp in experiences" :key="exp.id" class="relative p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl border border-gray-200 dark:border-gray-700">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" :style="{ background: `linear-gradient(135deg, ${exp.gradient_from}, ${exp.gradient_to})` }">
                            <BriefcaseIcon class="w-6 h-6 text-white" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-2">
                                <div>
                                    <h3 class="font-medium text-gray-900 dark:text-white">{{ exp.job_title }}</h3>
                                    <p class="text-sm text-blue-600 dark:text-blue-400">{{ exp.company }}</p>
                                </div>
                                <span v-if="exp.is_current" class="px-2 py-1 text-xs rounded-full bg-green-100 dark:bg-green-900/50 text-green-600">Current</span>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ exp.location }} • {{ exp.start_date }} - {{ exp.end_date || 'Present' }}</p>
                            <div class="mt-2 flex flex-wrap gap-1">
                                <span v-for="(achievement, i) in (exp.achievements || []).slice(0, 2)" :key="i" class="text-xs text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded">{{ achievement.substring(0, 40) }}...</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <span :class="['px-2 py-1 text-xs rounded-full', exp.is_active ? 'bg-green-100 dark:bg-green-900/50 text-green-600' : 'bg-gray-100 dark:bg-gray-700 text-gray-500']">
                            {{ exp.is_active ? 'Active' : 'Inactive' }}
                        </span>
                        <div class="flex gap-2">
                            <button @click="openModal(exp)" class="p-2 text-blue-600 hover:bg-blue-100 dark:hover:bg-blue-900/50 rounded-lg transition-colors">
                                <PencilIcon class="w-4 h-4" />
                            </button>
                            <button @click="confirmDelete(exp)" class="p-2 text-red-600 hover:bg-red-100 dark:hover:bg-red-900/50 rounded-lg transition-colors">
                                <TrashIcon class="w-4 h-4" />
                            </button>
                        </div>
                    </div>
                </div>
                <div v-if="experiences.length === 0" class="text-center py-8 text-gray-500">No experience entries yet</div>
            </div>
        </div>

        <!-- Modal -->
        <Transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-hidden" @click.stop>
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ editing ? 'Edit Experience' : 'Add Experience' }}</h3>
                    </div>
                    <form @submit.prevent="save" class="p-6 space-y-4 overflow-y-auto max-h-[60vh]">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Job Title *</label>
                                <input v-model="form.job_title" type="text" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Cloud Engineer" />
                            </div>
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Company *</label>
                                <input v-model="form.company" type="text" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Company Name" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Location</label>
                                <input v-model="form.location" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Noida" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Duration Badge</label>
                                <input v-model="form.duration_badge" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Current or 1 year 8 months" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Start Date *</label>
                                <input v-model="form.start_date" type="text" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Jul 2024" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">End Date</label>
                                <input v-model="form.end_date" type="text" :disabled="form.is_current" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 disabled:opacity-50" placeholder="Leave empty if current" />
                            </div>
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Achievements (one per line)</label>
                                <textarea v-model="achievementsText" rows="4" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Enter each achievement on a new line"></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Icon</label>
                                <select v-model="form.icon_type" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                    <option value="briefcase">Briefcase</option>
                                    <option value="cloud">Cloud</option>
                                    <option value="code">Code</option>
                                    <option value="server">Server</option>
                                    <option value="database">Database</option>
                                    <option value="cog">Settings/Cog</option>
                                    <option value="chart">Chart</option>
                                    <option value="users">Users/Team</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Gradient From</label>
                                <input v-model="form.gradient_from" type="color" class="w-full h-12 rounded-xl cursor-pointer" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Gradient To</label>
                                <input v-model="form.gradient_to" type="color" class="w-full h-12 rounded-xl cursor-pointer" />
                            </div>
                            <div class="col-span-2 flex items-center gap-6">
                                <label class="flex items-center gap-2">
                                    <input v-model="form.is_current" type="checkbox" class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
                                    <span class="text-gray-700 dark:text-gray-300">Current Job</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input v-model="form.is_active" type="checkbox" class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
                                    <span class="text-gray-700 dark:text-gray-300">Active</span>
                                </label>
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
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Delete Experience?</h3>
                        <p class="text-gray-500 dark:text-gray-400">This action cannot be undone.</p>
                    </div>
                    <div class="mt-6 flex gap-3">
                        <button @click="showDeleteModal = false" class="flex-1 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium">Cancel</button>
                        <button @click="deleteExp" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-xl font-medium hover:bg-red-700 transition-colors">Delete</button>
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
import { PlusIcon, PencilIcon, TrashIcon, BriefcaseIcon } from '@heroicons/vue/24/outline';

const props = defineProps({
    user: Object,
    experiences: Array,
    settings: Object,
});

const showModal = ref(false);
const showDeleteModal = ref(false);
const editing = ref(null);
const deleting = ref(null);
const achievementsText = ref('');

const settingsForm = reactive({
    experience_badge: props.settings?.experience_badge || '',
    experience_heading: props.settings?.experience_heading || '',
    experience_description: props.settings?.experience_description || '',
    experience_total_text: props.settings?.experience_total_text || '',
});

const form = reactive({
    job_title: '',
    company: '',
    location: '',
    start_date: '',
    end_date: '',
    is_current: false,
    duration_badge: '',
    achievements: [],
    icon_type: 'briefcase',
    gradient_from: '#3b82f6',
    gradient_to: '#8b5cf6',
    accent_color: '#3b82f6',
    is_active: true,
});

const openModal = (exp = null) => {
    editing.value = exp;
    if (exp) {
        Object.assign(form, exp);
        achievementsText.value = (exp.achievements || []).join('\n');
    } else {
        form.job_title = '';
        form.company = '';
        form.location = '';
        form.start_date = '';
        form.end_date = '';
        form.is_current = false;
        form.duration_badge = '';
        form.achievements = [];
        form.gradient_from = '#3b82f6';
        form.gradient_to = '#8b5cf6';
        form.is_active = true;
        achievementsText.value = '';
    }
    showModal.value = true;
};

const save = () => {
    form.achievements = achievementsText.value.split('\n').map(a => a.trim()).filter(a => a);

    if (editing.value) {
        router.put(`/admin/experience/${editing.value.id}`, form, {
            preserveScroll: true,
            onSuccess: () => showModal.value = false,
        });
    } else {
        router.post('/admin/experience', form, {
            preserveScroll: true,
            onSuccess: () => showModal.value = false,
        });
    }
};

const saveSettings = () => {
    router.put('/admin/experience-settings', settingsForm, {
        preserveScroll: true,
    });
};

const confirmDelete = (exp) => {
    deleting.value = exp;
    showDeleteModal.value = true;
};

const deleteExp = () => {
    router.delete(`/admin/experience/${deleting.value.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            showDeleteModal.value = false;
            deleting.value = null;
        },
    });
};
</script>
