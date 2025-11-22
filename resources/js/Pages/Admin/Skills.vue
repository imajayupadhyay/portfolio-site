<template>
    <Head title="Skills" />

    <AdminLayout page-title="Skills" :user="user">
        <div class="space-y-6">
            <!-- Page Settings -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between cursor-pointer" @click="showSettings = !showSettings">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Page Settings</h2>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Manage section heading and description</p>
                    </div>
                    <ChevronDownIcon :class="['w-5 h-5 text-gray-500 transition-transform', showSettings ? 'rotate-180' : '']" />
                </div>
                <form v-show="showSettings" @submit.prevent="saveSettings" class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Badge Text</label>
                            <input v-model="settingsForm.skills_badge" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Heading</label>
                            <input v-model="settingsForm.skills_heading" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                            <textarea v-model="settingsForm.skills_description" rows="2" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button type="submit" :disabled="savingSettings" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all disabled:opacity-50">
                            {{ savingSettings ? 'Saving...' : 'Save Settings' }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Categories and Skills -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Skill Categories</h2>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">{{ categories.length }} categories</p>
                    </div>
                    <button @click="openCategoryModal()" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all flex items-center gap-2">
                        <PlusIcon class="w-5 h-5" />
                        Add Category
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <div v-for="category in categories" :key="category.id" class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
                        <!-- Category Header -->
                        <div class="bg-gray-50 dark:bg-gray-900/50 p-4 flex items-center justify-between">
                            <div class="flex items-center gap-3 flex-1">
                                <h3 class="font-semibold text-gray-900 dark:text-white">{{ category.name }}</h3>
                                <span :class="['px-2 py-1 text-xs rounded-full', category.is_active ? 'bg-green-100 dark:bg-green-900/50 text-green-600' : 'bg-gray-100 dark:bg-gray-700 text-gray-500']">
                                    {{ category.is_active ? 'Active' : 'Inactive' }}
                                </span>
                                <span class="px-2 py-1 text-xs rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400">
                                    Grid: {{ category.grid_cols }} cols
                                </span>
                                <span class="text-sm text-gray-500">{{ category.skills.length }} skills</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <button @click="openSkillModal(null, category.id)" class="p-2 text-green-600 hover:bg-green-100 dark:hover:bg-green-900/50 rounded-lg transition-colors" title="Add Skill">
                                    <PlusIcon class="w-5 h-5" />
                                </button>
                                <button @click="openCategoryModal(category)" class="p-2 text-blue-600 hover:bg-blue-100 dark:hover:bg-blue-900/50 rounded-lg transition-colors">
                                    <PencilIcon class="w-5 h-5" />
                                </button>
                                <button @click="confirmDeleteCategory(category)" class="p-2 text-red-600 hover:bg-red-100 dark:hover:bg-red-900/50 rounded-lg transition-colors">
                                    <TrashIcon class="w-5 h-5" />
                                </button>
                            </div>
                        </div>

                        <!-- Skills in Category -->
                        <div class="p-4">
                            <div v-if="category.skills.length > 0" class="grid grid-cols-1 md:grid-cols-2 gap-3" :class="getGridClass(category.grid_cols)">
                                <div v-for="skill in category.skills" :key="skill.id" class="flex items-center justify-between p-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                                    <div class="flex items-center gap-3 flex-1">
                                        <div class="w-8 h-8 rounded-lg flex items-center justify-center" :style="{ backgroundColor: skill.color + '20' }">
                                            <div class="w-5 h-5 rounded" :style="{ backgroundColor: skill.color }"></div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2">
                                                <span class="font-medium text-gray-900 dark:text-white text-sm">{{ skill.name }}</span>
                                                <span :class="['px-1.5 py-0.5 text-xs rounded-full', skill.is_active ? 'bg-green-100 dark:bg-green-900/50 text-green-600' : 'bg-gray-100 dark:bg-gray-700 text-gray-500']">
                                                    {{ skill.is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </div>
                                            <span class="text-xs text-gray-500">{{ skill.icon }}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <button @click="openSkillModal(skill, category.id)" class="p-1.5 text-blue-600 hover:bg-blue-100 dark:hover:bg-blue-900/50 rounded transition-colors">
                                            <PencilIcon class="w-4 h-4" />
                                        </button>
                                        <button @click="confirmDeleteSkill(skill)" class="p-1.5 text-red-600 hover:bg-red-100 dark:hover:bg-red-900/50 rounded transition-colors">
                                            <TrashIcon class="w-4 h-4" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div v-else class="text-center py-6 text-gray-500 text-sm">
                                No skills in this category yet
                            </div>
                        </div>
                    </div>
                    <div v-if="categories.length === 0" class="text-center py-12 text-gray-500">No categories yet</div>
                </div>
            </div>
        </div>

        <!-- Category Modal -->
        <Transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-if="showCategoryModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showCategoryModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-lg" @click.stop>
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ editingCategory ? 'Edit Category' : 'Add Category' }}</h3>
                    </div>
                    <form @submit.prevent="saveCategory" class="p-6 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category Name</label>
                            <input v-model="categoryForm.name" type="text" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="e.g., Cloud Platforms, DevOps & Tools" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Icon (optional)</label>
                            <input v-model="categoryForm.icon" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Icon name or class" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Grid Columns</label>
                            <select v-model.number="categoryForm.grid_cols" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                <option :value="2">2 columns</option>
                                <option :value="3">3 columns</option>
                                <option :value="4">4 columns</option>
                                <option :value="5">5 columns</option>
                                <option :value="6">6 columns</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-3">
                            <input v-model="categoryForm.is_active" type="checkbox" id="category_active" class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
                            <label for="category_active" class="text-gray-700 dark:text-gray-300">Active</label>
                        </div>
                        <div class="flex gap-3 pt-4">
                            <button type="button" @click="showCategoryModal = false" class="flex-1 px-4 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium">Cancel</button>
                            <button type="submit" class="flex-1 px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all">{{ editingCategory ? 'Update' : 'Create' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </Transition>

        <!-- Skill Modal -->
        <Transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-if="showSkillModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showSkillModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-lg" @click.stop>
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ editingSkill ? 'Edit Skill' : 'Add Skill' }}</h3>
                    </div>
                    <form @submit.prevent="saveSkill" class="p-6 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
                            <select v-model.number="skillForm.skill_category_id" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500">
                                <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Skill Name</label>
                            <input v-model="skillForm.name" type="text" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="e.g., AWS, Docker, Python" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Icon Name</label>
                            <input v-model="skillForm.icon" type="text" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="e.g., aws, docker, python" />
                            <p class="mt-1 text-xs text-gray-500">Must match icon names in SkillCard.vue</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Color (Hex)</label>
                            <input v-model="skillForm.color" type="text" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="#FF9900" />
                        </div>
                        <div class="flex items-center gap-3">
                            <input v-model="skillForm.is_active" type="checkbox" id="skill_active" class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
                            <label for="skill_active" class="text-gray-700 dark:text-gray-300">Active</label>
                        </div>
                        <div class="flex gap-3 pt-4">
                            <button type="button" @click="showSkillModal = false" class="flex-1 px-4 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium">Cancel</button>
                            <button type="submit" class="flex-1 px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all">{{ editingSkill ? 'Update' : 'Create' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </Transition>

        <!-- Delete Category Confirmation -->
        <Transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-if="showDeleteCategoryModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showDeleteCategoryModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md p-6" @click.stop>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-red-100 dark:bg-red-900/50 flex items-center justify-center">
                            <TrashIcon class="w-8 h-8 text-red-600" />
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Delete Category?</h3>
                        <p class="text-gray-500 dark:text-gray-400">This will also delete all skills in this category. This action cannot be undone.</p>
                    </div>
                    <div class="mt-6 flex gap-3">
                        <button @click="showDeleteCategoryModal = false" class="flex-1 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium">Cancel</button>
                        <button @click="deleteCategory" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-xl font-medium hover:bg-red-700 transition-colors">Delete</button>
                    </div>
                </div>
            </div>
        </Transition>

        <!-- Delete Skill Confirmation -->
        <Transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-if="showDeleteSkillModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showDeleteSkillModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md p-6" @click.stop>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-red-100 dark:bg-red-900/50 flex items-center justify-center">
                            <TrashIcon class="w-8 h-8 text-red-600" />
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Delete Skill?</h3>
                        <p class="text-gray-500 dark:text-gray-400">This action cannot be undone.</p>
                    </div>
                    <div class="mt-6 flex gap-3">
                        <button @click="showDeleteSkillModal = false" class="flex-1 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium">Cancel</button>
                        <button @click="deleteSkill" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-xl font-medium hover:bg-red-700 transition-colors">Delete</button>
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
import { PlusIcon, PencilIcon, TrashIcon, ChevronDownIcon } from '@heroicons/vue/24/outline';

const props = defineProps({
    user: Object,
    categories: Array,
    settings: Object,
});

const showSettings = ref(false);
const showCategoryModal = ref(false);
const showSkillModal = ref(false);
const showDeleteCategoryModal = ref(false);
const showDeleteSkillModal = ref(false);
const editingCategory = ref(null);
const editingSkill = ref(null);
const deletingCategory = ref(null);
const deletingSkill = ref(null);
const savingSettings = ref(false);

const settingsForm = reactive({
    skills_badge: props.settings.skills_badge || 'My Tech Stack',
    skills_heading: props.settings.skills_heading || 'Skills & Technologies',
    skills_description: props.settings.skills_description || 'Expertise across cloud platforms, DevOps tools, and modern development technologies',
});

const categoryForm = reactive({
    name: '',
    icon: '',
    grid_cols: 5,
    is_active: true,
});

const skillForm = reactive({
    skill_category_id: null,
    name: '',
    icon: '',
    color: '',
    is_active: true,
});

const saveSettings = () => {
    savingSettings.value = true;
    router.put('/admin/skills-settings', settingsForm, {
        preserveScroll: true,
        onFinish: () => savingSettings.value = false,
    });
};

const openCategoryModal = (category = null) => {
    editingCategory.value = category;
    if (category) {
        categoryForm.name = category.name;
        categoryForm.icon = category.icon || '';
        categoryForm.grid_cols = category.grid_cols;
        categoryForm.is_active = category.is_active;
    } else {
        categoryForm.name = '';
        categoryForm.icon = '';
        categoryForm.grid_cols = 5;
        categoryForm.is_active = true;
    }
    showCategoryModal.value = true;
};

const saveCategory = () => {
    if (editingCategory.value) {
        router.put(`/admin/skills/categories/${editingCategory.value.id}`, categoryForm, {
            preserveScroll: true,
            onSuccess: () => showCategoryModal.value = false,
        });
    } else {
        router.post('/admin/skills/categories', categoryForm, {
            preserveScroll: true,
            onSuccess: () => showCategoryModal.value = false,
        });
    }
};

const confirmDeleteCategory = (category) => {
    deletingCategory.value = category;
    showDeleteCategoryModal.value = true;
};

const deleteCategory = () => {
    router.delete(`/admin/skills/categories/${deletingCategory.value.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            showDeleteCategoryModal.value = false;
            deletingCategory.value = null;
        },
    });
};

const openSkillModal = (skill = null, categoryId = null) => {
    editingSkill.value = skill;
    if (skill) {
        skillForm.skill_category_id = skill.skill_category_id;
        skillForm.name = skill.name;
        skillForm.icon = skill.icon;
        skillForm.color = skill.color;
        skillForm.is_active = skill.is_active;
    } else {
        skillForm.skill_category_id = categoryId;
        skillForm.name = '';
        skillForm.icon = '';
        skillForm.color = '';
        skillForm.is_active = true;
    }
    showSkillModal.value = true;
};

const saveSkill = () => {
    if (editingSkill.value) {
        router.put(`/admin/skills/items/${editingSkill.value.id}`, skillForm, {
            preserveScroll: true,
            onSuccess: () => showSkillModal.value = false,
        });
    } else {
        router.post('/admin/skills/items', skillForm, {
            preserveScroll: true,
            onSuccess: () => showSkillModal.value = false,
        });
    }
};

const confirmDeleteSkill = (skill) => {
    deletingSkill.value = skill;
    showDeleteSkillModal.value = true;
};

const deleteSkill = () => {
    router.delete(`/admin/skills/items/${deletingSkill.value.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            showDeleteSkillModal.value = false;
            deletingSkill.value = null;
        },
    });
};

const getGridClass = (cols) => {
    const gridClasses = {
        2: 'lg:grid-cols-2',
        3: 'lg:grid-cols-3',
        4: 'lg:grid-cols-4',
        5: 'lg:grid-cols-5',
        6: 'lg:grid-cols-6',
    };
    return gridClasses[cols] || 'lg:grid-cols-5';
};
</script>
