<template>
    <Head title="Projects" />

    <AdminLayout page-title="Projects" :user="user">
        <div class="space-y-6">
            <!-- Page Settings -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between cursor-pointer" @click="showSettings = !showSettings">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Page Settings</h2>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Manage heading, description, and CTA section</p>
                    </div>
                    <ChevronDownIcon :class="['w-5 h-5 text-gray-500 transition-transform', showSettings ? 'rotate-180' : '']" />
                </div>
                <form v-show="showSettings" @submit.prevent="saveSettings" class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div v-for="setting in settingsForm" :key="setting.key" :class="setting.type === 'textarea' ? 'md:col-span-2' : ''">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ setting.label }}</label>
                            <textarea
                                v-if="setting.type === 'textarea'"
                                v-model="setting.value"
                                rows="2"
                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            ></textarea>
                            <input
                                v-else
                                type="text"
                                v-model="setting.value"
                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            />
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button type="submit" :disabled="savingSettings" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all disabled:opacity-50">
                            {{ savingSettings ? 'Saving...' : 'Save Settings' }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Projects List -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Projects</h2>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">{{ projects.length }} projects</p>
                    </div>
                    <button @click="openModal()" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all flex items-center gap-2">
                        <PlusIcon class="w-5 h-5" />
                        Add Project
                    </button>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div
                            v-for="project in projects"
                            :key="project.id"
                            class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl border border-gray-200 dark:border-gray-700"
                        >
                            <div class="flex-1">
                                <div class="flex items-center gap-3">
                                    <h3 class="font-medium text-gray-900 dark:text-white">{{ project.name }}</h3>
                                    <span :class="['px-2 py-1 text-xs rounded-full', project.is_active ? 'bg-green-100 dark:bg-green-900/50 text-green-600' : 'bg-gray-100 dark:bg-gray-700 text-gray-500']">
                                        {{ project.is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 line-clamp-1">{{ project.description }}</p>
                                <div class="flex flex-wrap gap-1 mt-2">
                                    <span v-for="tech in project.tech_stack" :key="tech" class="px-2 py-0.5 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs rounded-full">
                                        {{ tech }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 ml-4">
                                <button
                                    @click="moveUp(project)"
                                    :disabled="isFirst(project)"
                                    :class="['p-2 rounded-lg transition-colors', isFirst(project) ? 'text-gray-300 dark:text-gray-600 cursor-not-allowed' : 'text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700']"
                                    title="Move up"
                                >
                                    <ChevronUpIcon class="w-4 h-4" />
                                </button>
                                <button
                                    @click="moveDown(project)"
                                    :disabled="isLast(project)"
                                    :class="['p-2 rounded-lg transition-colors', isLast(project) ? 'text-gray-300 dark:text-gray-600 cursor-not-allowed' : 'text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700']"
                                    title="Move down"
                                >
                                    <ChevronDownIcon class="w-4 h-4" />
                                </button>
                                <button @click="openModal(project)" class="p-2 text-blue-600 hover:bg-blue-100 dark:hover:bg-blue-900/50 rounded-lg transition-colors">
                                    <PencilIcon class="w-5 h-5" />
                                </button>
                                <button @click="confirmDelete(project)" class="p-2 text-red-600 hover:bg-red-100 dark:hover:bg-red-900/50 rounded-lg transition-colors">
                                    <TrashIcon class="w-5 h-5" />
                                </button>
                            </div>
                        </div>
                        <div v-if="projects.length === 0" class="text-center py-8 text-gray-500">No projects yet</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Modal -->
        <Transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-hidden" @click.stop>
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ editingProject ? 'Edit Project' : 'Add Project' }}</h3>
                    </div>
                    <form @submit.prevent="saveProject" class="p-6 space-y-4 overflow-y-auto max-h-[60vh]">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Project Name</label>
                            <input v-model="projectForm.name" type="text" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                            <textarea v-model="projectForm.description" rows="3" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tech Stack (comma separated)</label>
                            <input v-model="techStackInput" type="text" placeholder="Laravel, Vue.js, MySQL" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">GitHub URL</label>
                                <input v-model="projectForm.github_url" type="url" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Live URL</label>
                                <input v-model="projectForm.detail_url" type="url" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" />
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <input v-model="projectForm.is_active" type="checkbox" id="project_active" class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
                            <label for="project_active" class="text-gray-700 dark:text-gray-300">Active</label>
                        </div>
                        <div class="flex gap-3 pt-4">
                            <button type="button" @click="showModal = false" class="flex-1 px-4 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium">Cancel</button>
                            <button type="submit" class="flex-1 px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all">{{ editingProject ? 'Update' : 'Create' }}</button>
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
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Delete Project?</h3>
                        <p class="text-gray-500 dark:text-gray-400">This action cannot be undone.</p>
                    </div>
                    <div class="mt-6 flex gap-3">
                        <button @click="showDeleteModal = false" class="flex-1 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium">Cancel</button>
                        <button @click="deleteProject" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-xl font-medium hover:bg-red-700 transition-colors">Delete</button>
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
import { PlusIcon, PencilIcon, TrashIcon, ChevronDownIcon, ChevronUpIcon } from '@heroicons/vue/24/outline';

const props = defineProps({
    user: Object,
    projects: Array,
    settings: Array,
});

const showSettings = ref(false);
const showModal = ref(false);
const showDeleteModal = ref(false);
const editingProject = ref(null);
const deletingProject = ref(null);
const savingSettings = ref(false);

const settingsForm = ref([...props.settings]);
const techStackInput = ref('');

const projectForm = reactive({
    name: '',
    description: '',
    tech_stack: [],
    github_url: '',
    detail_url: '',
    is_active: true,
});

const saveSettings = () => {
    savingSettings.value = true;
    router.put('/admin/projects-settings', {
        settings: settingsForm.value.map(s => ({ key: s.key, value: s.value }))
    }, {
        preserveScroll: true,
        onFinish: () => savingSettings.value = false,
    });
};

const openModal = (project = null) => {
    editingProject.value = project;
    if (project) {
        projectForm.name = project.name;
        projectForm.description = project.description;
        projectForm.tech_stack = project.tech_stack || [];
        projectForm.github_url = project.github_url || '';
        projectForm.detail_url = project.detail_url || '';
        projectForm.is_active = project.is_active;
        techStackInput.value = (project.tech_stack || []).join(', ');
    } else {
        projectForm.name = '';
        projectForm.description = '';
        projectForm.tech_stack = [];
        projectForm.github_url = '';
        projectForm.detail_url = '';
        projectForm.is_active = true;
        techStackInput.value = '';
    }
    showModal.value = true;
};

const saveProject = () => {
    projectForm.tech_stack = techStackInput.value.split(',').map(t => t.trim()).filter(t => t);

    if (editingProject.value) {
        router.put(`/admin/projects/${editingProject.value.id}`, projectForm, {
            preserveScroll: true,
            onSuccess: () => showModal.value = false,
        });
    } else {
        router.post('/admin/projects', projectForm, {
            preserveScroll: true,
            onSuccess: () => showModal.value = false,
        });
    }
};

const confirmDelete = (project) => {
    deletingProject.value = project;
    showDeleteModal.value = true;
};

const deleteProject = () => {
    router.delete(`/admin/projects/${deletingProject.value.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            showDeleteModal.value = false;
            deletingProject.value = null;
        },
    });
};

const moveUp = (project) => {
    router.post(`/admin/projects/${project.id}/reorder`, {
        direction: 'up',
    }, {
        preserveScroll: true,
    });
};

const moveDown = (project) => {
    router.post(`/admin/projects/${project.id}/reorder`, {
        direction: 'down',
    }, {
        preserveScroll: true,
    });
};

const isFirst = (project) => {
    return props.projects.indexOf(project) === 0;
};

const isLast = (project) => {
    return props.projects.indexOf(project) === props.projects.length - 1;
};
</script>
