<template>
    <Head title="Hero Section" />

    <AdminLayout page-title="Hero Section" :user="user">
        <form @submit.prevent="save" class="space-y-6">
            <!-- Basic Info -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Basic Information</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Main hero section content</p>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Greeting Text</label>
                            <input v-model="form.hero_greeting" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Hello, I'm" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Your Name</label>
                            <input v-model="form.hero_name" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Ajay Upadhyay" />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Typed Roles (comma separated)</label>
                        <input v-model="rolesInput" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Software Engineer, Cloud Engineer, DevOps Engineer" />
                        <p class="text-xs text-gray-500 mt-1">These will cycle through with typing animation</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                        <textarea v-model="form.hero_description" rows="3" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Your description..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Statistics</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Highlight your achievements</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stat 1 Value</label>
                            <input v-model="form.hero_stat1_value" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="3+" />
                            <input v-model="form.hero_stat1_label" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Years Exp." />
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stat 2 Value</label>
                            <input v-model="form.hero_stat2_value" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="3" />
                            <input v-model="form.hero_stat2_label" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Certifications" />
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stat 3 Value</label>
                            <input v-model="form.hero_stat3_value" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="99.9%" />
                            <input v-model="form.hero_stat3_label" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Uptime" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Call to Action</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Button texts and links</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <h3 class="font-medium text-gray-900 dark:text-white">Primary Button</h3>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Button Text</label>
                                <input v-model="form.hero_cta1_text" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Get In Touch" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Button URL</label>
                                <input v-model="form.hero_cta1_url" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="/contact" />
                            </div>
                        </div>
                        <div class="space-y-4">
                            <h3 class="font-medium text-gray-900 dark:text-white">Resume Button</h3>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Button Text</label>
                                <input v-model="form.hero_cta2_text" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Download Resume" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Resume File</label>
                                <div class="flex items-center gap-4">
                                    <input type="file" ref="resumeInput" @change="uploadResume" accept=".pdf" class="hidden" />
                                    <button type="button" @click="$refs.resumeInput.click()" :disabled="uploadingResume" class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors disabled:opacity-50">
                                        {{ uploadingResume ? 'Uploading...' : (form.hero_resume ? 'Change Resume' : 'Upload PDF') }}
                                    </button>
                                    <span v-if="form.hero_resume" class="text-sm text-green-600 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                        Resume Uploaded
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Images -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Profile Image</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Your hero section image</p>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-6">
                        <div v-if="form.hero_profile_image" class="w-32 h-32 rounded-2xl bg-gray-100 dark:bg-gray-700 overflow-hidden">
                            <img :src="form.hero_profile_image" alt="Profile" class="w-full h-full object-cover" />
                        </div>
                        <div>
                            <input type="file" ref="imageInput" @change="uploadImage" accept="image/*" class="hidden" />
                            <button type="button" @click="$refs.imageInput.click()" :disabled="uploadingImage" class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors disabled:opacity-50">
                                {{ uploadingImage ? 'Uploading...' : (form.hero_profile_image ? 'Change Image' : 'Upload Image') }}
                            </button>
                            <p class="text-xs text-gray-500 mt-2">PNG, JPG, WEBP up to 5MB</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Floating Badges -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Floating Badges</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Badges displayed around your profile image</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-2">
                            <h3 class="font-medium text-gray-900 dark:text-white">Badge 1 (Main)</h3>
                            <input v-model="form.hero_badge1_subtitle" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Specialized in" />
                            <input v-model="form.hero_badge1_title" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Cloud & DevOps" />
                        </div>
                        <div class="space-y-2">
                            <h3 class="font-medium text-gray-900 dark:text-white">Badge 2 (Left)</h3>
                            <input v-model="form.hero_badge2_subtitle" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Certified" />
                            <input v-model="form.hero_badge2_title" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="AWS" />
                        </div>
                        <div class="space-y-2">
                            <h3 class="font-medium text-gray-900 dark:text-white">Badge 3 (Right)</h3>
                            <input v-model="form.hero_badge3_subtitle" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Certified" />
                            <input v-model="form.hero_badge3_title" type="text" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500" placeholder="Azure" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="flex justify-end">
                <button type="button" @click="showConfirmModal = true" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all">
                    Save All Changes
                </button>
            </div>
        </form>

        <!-- Confirmation Modal -->
        <Transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0" enter-to-class="opacity-100" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100" leave-to-class="opacity-0">
            <div v-if="showConfirmModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click="showConfirmModal = false">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md p-6" @click.stop>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-blue-100 dark:bg-blue-900/50 flex items-center justify-center">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Save Changes?</h3>
                        <p class="text-gray-500 dark:text-gray-400">Are you sure you want to save all changes to the hero section?</p>
                    </div>
                    <div class="mt-6 flex gap-3">
                        <button @click="showConfirmModal = false" class="flex-1 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-medium">Cancel</button>
                        <button @click="save" class="flex-1 px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all">Confirm</button>
                    </div>
                </div>
            </div>
        </Transition>
    </AdminLayout>
</template>

<script setup>
import { ref, reactive, computed } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import AdminLayout from '../../Layouts/AdminLayout.vue';

const props = defineProps({
    user: Object,
    settings: Object,
});

const uploadingImage = ref(false);
const uploadingResume = ref(false);
const showConfirmModal = ref(false);

// Parse roles from JSON string
const parseRoles = (rolesStr) => {
    try {
        const parsed = JSON.parse(rolesStr || '[]');
        return Array.isArray(parsed) ? parsed.join(', ') : '';
    } catch {
        return rolesStr || '';
    }
};

const rolesInput = ref(parseRoles(props.settings?.hero_roles));

const form = reactive({
    hero_greeting: props.settings?.hero_greeting || '',
    hero_name: props.settings?.hero_name || '',
    hero_roles: props.settings?.hero_roles || '[]',
    hero_description: props.settings?.hero_description || '',
    hero_stat1_value: props.settings?.hero_stat1_value || '',
    hero_stat1_label: props.settings?.hero_stat1_label || '',
    hero_stat2_value: props.settings?.hero_stat2_value || '',
    hero_stat2_label: props.settings?.hero_stat2_label || '',
    hero_stat3_value: props.settings?.hero_stat3_value || '',
    hero_stat3_label: props.settings?.hero_stat3_label || '',
    hero_cta1_text: props.settings?.hero_cta1_text || '',
    hero_cta1_url: props.settings?.hero_cta1_url || '',
    hero_cta2_text: props.settings?.hero_cta2_text || '',
    hero_resume: props.settings?.hero_resume || '',
    hero_profile_image: props.settings?.hero_profile_image || '',
    hero_badge1_title: props.settings?.hero_badge1_title || '',
    hero_badge1_subtitle: props.settings?.hero_badge1_subtitle || '',
    hero_badge2_title: props.settings?.hero_badge2_title || '',
    hero_badge2_subtitle: props.settings?.hero_badge2_subtitle || '',
    hero_badge3_title: props.settings?.hero_badge3_title || '',
    hero_badge3_subtitle: props.settings?.hero_badge3_subtitle || '',
});

const save = () => {
    // Convert roles input to JSON array
    const rolesArray = rolesInput.value.split(',').map(r => r.trim()).filter(r => r);
    form.hero_roles = JSON.stringify(rolesArray);

    router.put('/admin/hero', form, {
        preserveScroll: true,
        onSuccess: () => {
            showConfirmModal.value = false;
        },
    });
};

const uploadImage = async (event) => {
    const file = event.target.files[0];
    if (!file) return;

    uploadingImage.value = true;
    const formData = new FormData();
    formData.append('image', file);

    try {
        const response = await fetch('/admin/hero/upload-image', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
        });
        const data = await response.json();
        form.hero_profile_image = data.path;
    } catch (error) {
        console.error('Upload failed:', error);
    } finally {
        uploadingImage.value = false;
    }
};

const uploadResume = async (event) => {
    const file = event.target.files[0];
    if (!file) return;

    uploadingResume.value = true;
    const formData = new FormData();
    formData.append('resume', file);

    try {
        const response = await fetch('/admin/hero/upload-resume', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
        });
        const data = await response.json();
        form.hero_resume = data.path;
    } catch (error) {
        console.error('Upload failed:', error);
    } finally {
        uploadingResume.value = false;
    }
};
</script>
