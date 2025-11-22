<template>
    <Head title="Blog Management" />

    <AdminLayout>
        <div class="p-6 space-y-6">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Blog Management</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage your blog categories and posts</p>
                </div>
            </div>

            <!-- Categories Section -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Blog Categories</h2>
                    <button
                        @click="openCreateCategoryModal"
                        class="px-4 py-2 bg-purple-600 text-white rounded-lg font-medium hover:bg-purple-700 transition-all flex items-center gap-2 text-sm"
                    >
                        <PlusIcon class="w-4 h-4" />
                        New Category
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div
                        v-for="category in categories"
                        :key="category.id"
                        class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:shadow-md transition-shadow"
                    >
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <div
                                        class="w-4 h-4 rounded"
                                        :style="{ backgroundColor: category.color }"
                                    ></div>
                                    <h3 class="font-medium text-gray-900 dark:text-white">{{ category.name }}</h3>
                                    <span
                                        v-if="!category.is_active"
                                        class="text-xs px-2 py-0.5 bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-400 rounded"
                                    >
                                        Inactive
                                    </span>
                                </div>
                                <p v-if="category.description" class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ category.description }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">
                                    {{ category.posts_count || 0 }} posts
                                </p>
                            </div>
                            <div class="flex items-center gap-2">
                                <button
                                    @click="openEditCategoryModal(category)"
                                    class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300"
                                >
                                    <PencilIcon class="w-4 h-4" />
                                </button>
                                <button
                                    @click="openDeleteCategoryModal(category)"
                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
                                >
                                    <TrashIcon class="w-4 h-4" />
                                </button>
                            </div>
                        </div>
                    </div>

                    <div v-if="categories.length === 0" class="col-span-full text-center py-8 text-gray-500 dark:text-gray-400">
                        No categories yet. Create your first category to get started.
                    </div>
                </div>
            </div>

            <!-- Blog Posts Section -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Blog Posts</h2>
                        <button
                            @click="openCreateModal"
                            class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg font-medium hover:shadow-lg transform hover:scale-105 transition-all flex items-center gap-2"
                        >
                            <PlusIcon class="w-5 h-5" />
                            New Blog Post
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Published</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Views</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <tr
                                v-for="post in posts"
                                :key="post.id"
                                class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors"
                            >
                                <td class="px-6 py-4">
                                    <div class="flex items-start gap-3">
                                        <img
                                            v-if="post.featured_image"
                                            :src="post.featured_image"
                                            :alt="post.title"
                                            class="w-16 h-12 object-cover rounded-lg"
                                        />
                                        <div class="min-w-0 flex-1">
                                            <div class="flex items-center gap-2">
                                                <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                                    {{ post.title }}
                                                </p>
                                                <span
                                                    v-if="post.is_featured"
                                                    class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400"
                                                >
                                                    Featured
                                                </span>
                                            </div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ post.slug }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                        :style="{
                                            backgroundColor: post.category?.color + '20',
                                            color: post.category?.color
                                        }"
                                    >
                                        {{ post.category?.name || 'No Category' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        :class="[
                                            'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium',
                                            post.is_active
                                                ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400'
                                                : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-400'
                                        ]"
                                    >
                                        {{ post.is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ post.published_at ? new Date(post.published_at).toLocaleDateString() : 'Draft' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ post.views_count }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center gap-2">
                                        <button
                                            @click="openEditModal(post)"
                                            class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300"
                                        >
                                            <PencilIcon class="w-5 h-5" />
                                        </button>
                                        <button
                                            @click="openDeleteModal(post)"
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
                                        >
                                            <TrashIcon class="w-5 h-5" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Empty State -->
                    <div v-if="posts.length === 0" class="text-center py-12">
                        <BookOpenIcon class="mx-auto h-12 w-12 text-gray-400" />
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No blog posts</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Get started by creating a new blog post.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Create/Edit Modal -->
        <TransitionRoot appear :show="showCategoryModal" as="template">
            <Dialog as="div" @close="closeCategoryModal" class="relative z-50">
                <TransitionChild
                    as="template"
                    enter="duration-300 ease-out"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="duration-200 ease-in"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <div class="fixed inset-0 bg-black/50" />
                </TransitionChild>

                <div class="fixed inset-0 overflow-y-auto">
                    <div class="flex min-h-full items-center justify-center p-4">
                        <TransitionChild
                            as="template"
                            enter="duration-300 ease-out"
                            enter-from="opacity-0 scale-95"
                            enter-to="opacity-100 scale-100"
                            leave="duration-200 ease-in"
                            leave-from="opacity-100 scale-100"
                            leave-to="opacity-0 scale-95"
                        >
                            <DialogPanel class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white dark:bg-gray-800 p-6 shadow-xl transition-all">
                                <DialogTitle as="h3" class="text-lg font-medium text-gray-900 dark:text-white mb-6">
                                    {{ isEditingCategory ? 'Edit Category' : 'Create New Category' }}
                                </DialogTitle>

                                <form @submit.prevent="submitCategoryForm" class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Name *
                                        </label>
                                        <input
                                            v-model="categoryForm.name"
                                            type="text"
                                            required
                                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                            placeholder="e.g., Cloud Computing"
                                        />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Slug (optional - auto-generated)
                                        </label>
                                        <input
                                            v-model="categoryForm.slug"
                                            type="text"
                                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                            placeholder="cloud-computing"
                                        />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Description
                                        </label>
                                        <textarea
                                            v-model="categoryForm.description"
                                            rows="2"
                                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                            placeholder="Brief description of this category"
                                        ></textarea>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Color
                                            </label>
                                            <input
                                                v-model="categoryForm.color"
                                                type="color"
                                                class="w-full h-10 border border-gray-300 dark:border-gray-600 rounded-lg"
                                            />
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Order
                                            </label>
                                            <input
                                                v-model.number="categoryForm.order"
                                                type="number"
                                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                            />
                                        </div>
                                    </div>

                                    <div>
                                        <label class="flex items-center gap-2">
                                            <input
                                                v-model="categoryForm.is_active"
                                                type="checkbox"
                                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                            />
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Active</span>
                                        </label>
                                    </div>

                                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                                        <button
                                            type="button"
                                            @click="closeCategoryModal"
                                            class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                                        >
                                            Cancel
                                        </button>
                                        <button
                                            type="submit"
                                            class="px-4 py-2 bg-purple-600 text-white rounded-lg font-medium hover:bg-purple-700 transition-colors"
                                        >
                                            {{ isEditingCategory ? 'Update Category' : 'Create Category' }}
                                        </button>
                                    </div>
                                </form>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Category Delete Modal -->
        <TransitionRoot appear :show="showDeleteCategoryModal" as="template">
            <Dialog as="div" @close="closeDeleteCategoryModal" class="relative z-50">
                <TransitionChild
                    as="template"
                    enter="duration-300 ease-out"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="duration-200 ease-in"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <div class="fixed inset-0 bg-black/50" />
                </TransitionChild>

                <div class="fixed inset-0 overflow-y-auto">
                    <div class="flex min-h-full items-center justify-center p-4">
                        <TransitionChild
                            as="template"
                            enter="duration-300 ease-out"
                            enter-from="opacity-0 scale-95"
                            enter-to="opacity-100 scale-100"
                            leave="duration-200 ease-in"
                            leave-from="opacity-100 scale-100"
                            leave-to="opacity-0 scale-95"
                        >
                            <DialogPanel class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white dark:bg-gray-800 p-6 shadow-xl transition-all">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                                        <ExclamationTriangleIcon class="w-6 h-6 text-red-600 dark:text-red-400" />
                                    </div>
                                    <div>
                                        <DialogTitle as="h3" class="text-lg font-medium text-gray-900 dark:text-white">
                                            Delete Category
                                        </DialogTitle>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                            This action cannot be undone
                                        </p>
                                    </div>
                                </div>

                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                                    Are you sure you want to delete this category? This will fail if there are posts using this category.
                                </p>

                                <div class="flex justify-end gap-3">
                                    <button
                                        type="button"
                                        @click="closeDeleteCategoryModal"
                                        class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                                    >
                                        Cancel
                                    </button>
                                    <button
                                        type="button"
                                        @click="confirmDeleteCategory"
                                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors"
                                    >
                                        Delete Category
                                    </button>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Post Create/Edit Modal -->
        <TransitionRoot appear :show="showModal" as="template">
            <Dialog as="div" @close="closeModal" class="relative z-50">
                <TransitionChild
                    as="template"
                    enter="duration-300 ease-out"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="duration-200 ease-in"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <div class="fixed inset-0 bg-black/50" />
                </TransitionChild>

                <div class="fixed inset-0 overflow-y-auto">
                    <div class="flex min-h-full items-center justify-center p-4">
                        <TransitionChild
                            as="template"
                            enter="duration-300 ease-out"
                            enter-from="opacity-0 scale-95"
                            enter-to="opacity-100 scale-100"
                            leave="duration-200 ease-in"
                            leave-from="opacity-100 scale-100"
                            leave-to="opacity-0 scale-95"
                        >
                            <DialogPanel class="w-full max-w-4xl transform overflow-hidden rounded-2xl bg-white dark:bg-gray-800 p-6 shadow-xl transition-all">
                                <DialogTitle as="h3" class="text-lg font-medium text-gray-900 dark:text-white mb-6">
                                    {{ isEditing ? 'Edit Blog Post' : 'Create New Blog Post' }}
                                </DialogTitle>

                                <form @submit.prevent="submitForm" class="space-y-6 max-h-[70vh] overflow-y-auto pr-2">
                                    <!-- Title -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Title *
                                        </label>
                                        <input
                                            v-model="form.title"
                                            type="text"
                                            required
                                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                            placeholder="Enter blog post title"
                                        />
                                    </div>

                                    <!-- Slug -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Slug (optional - auto-generated from title)
                                        </label>
                                        <input
                                            v-model="form.slug"
                                            type="text"
                                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                            placeholder="blog-post-slug"
                                        />
                                    </div>

                                    <!-- Category and Author -->
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Category *
                                            </label>
                                            <select
                                                v-model="form.blog_category_id"
                                                required
                                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                            >
                                                <option value="">Select a category</option>
                                                <option v-for="category in activeCategories" :key="category.id" :value="category.id">
                                                    {{ category.name }}
                                                </option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Author
                                            </label>
                                            <input
                                                v-model="form.author"
                                                type="text"
                                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                                placeholder="Ajay Upadhyay"
                                            />
                                        </div>
                                    </div>

                                    <!-- Featured Image -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Featured Image
                                        </label>

                                        <!-- Image Preview -->
                                        <div v-if="imagePreview || form.featured_image" class="mb-4">
                                            <img
                                                :src="imagePreview || form.featured_image"
                                                alt="Preview"
                                                class="w-full h-48 object-cover rounded-lg border border-gray-300 dark:border-gray-600"
                                            />
                                        </div>

                                        <!-- Upload Tabs -->
                                        <div class="flex gap-2 mb-3">
                                            <button
                                                @click="uploadMethod = 'file'"
                                                type="button"
                                                :class="[
                                                    'px-4 py-2 rounded-lg text-sm font-medium transition-colors',
                                                    uploadMethod === 'file'
                                                        ? 'bg-blue-600 text-white'
                                                        : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'
                                                ]"
                                            >
                                                Upload File
                                            </button>
                                            <button
                                                @click="uploadMethod = 'url'"
                                                type="button"
                                                :class="[
                                                    'px-4 py-2 rounded-lg text-sm font-medium transition-colors',
                                                    uploadMethod === 'url'
                                                        ? 'bg-blue-600 text-white'
                                                        : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300'
                                                ]"
                                            >
                                                Use URL
                                            </button>
                                        </div>

                                        <!-- File Upload -->
                                        <div v-if="uploadMethod === 'file'">
                                            <input
                                                @change="handleImageUpload"
                                                type="file"
                                                accept="image/*"
                                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-900/30 dark:file:text-blue-400"
                                            />
                                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                                Supported: JPG, PNG, GIF, WebP (Max 5MB)
                                            </p>
                                        </div>

                                        <!-- URL Input -->
                                        <div v-else>
                                            <input
                                                v-model="form.featured_image_url"
                                                type="text"
                                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                                placeholder="https://example.com/image.jpg"
                                            />
                                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                                Enter image URL from external source
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Excerpt -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Excerpt *
                                        </label>
                                        <textarea
                                            v-model="form.excerpt"
                                            required
                                            rows="3"
                                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                            placeholder="Brief summary of the blog post"
                                        ></textarea>
                                    </div>

                                    <!-- Content -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Content *
                                        </label>
                                        <TiptapEditor v-model="form.content" />
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                            Use the toolbar above to format your blog content with headings, lists, links, and more.
                                        </p>
                                    </div>

                                    <!-- Tags -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Tags (comma-separated)
                                        </label>
                                        <input
                                            v-model="tagsInput"
                                            type="text"
                                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                            placeholder="AWS, DevOps, Cloud"
                                        />
                                    </div>

                                    <!-- Read Time, Order, Published Date -->
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Read Time (min)
                                            </label>
                                            <input
                                                v-model.number="form.read_time"
                                                type="number"
                                                min="1"
                                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                            />
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Order
                                            </label>
                                            <input
                                                v-model.number="form.order"
                                                type="number"
                                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                            />
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Published Date
                                            </label>
                                            <input
                                                v-model="form.published_at"
                                                type="datetime-local"
                                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                            />
                                        </div>
                                    </div>

                                    <!-- Meta Title and Description -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Meta Title (SEO)
                                        </label>
                                        <input
                                            v-model="form.meta_title"
                                            type="text"
                                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                            placeholder="SEO optimized title"
                                        />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Meta Description (SEO)
                                        </label>
                                        <textarea
                                            v-model="form.meta_description"
                                            rows="2"
                                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                            placeholder="SEO optimized description"
                                        ></textarea>
                                    </div>

                                    <!-- Checkboxes -->
                                    <div class="flex items-center gap-6">
                                        <label class="flex items-center gap-2">
                                            <input
                                                v-model="form.is_featured"
                                                type="checkbox"
                                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                            />
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Featured Post</span>
                                        </label>
                                        <label class="flex items-center gap-2">
                                            <input
                                                v-model="form.is_active"
                                                type="checkbox"
                                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                            />
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Active</span>
                                        </label>
                                    </div>

                                    <!-- Actions -->
                                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                                        <button
                                            type="button"
                                            @click="closeModal"
                                            class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                                        >
                                            Cancel
                                        </button>
                                        <button
                                            type="submit"
                                            class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg font-medium hover:shadow-lg transform hover:scale-105 transition-all"
                                        >
                                            {{ isEditing ? 'Update Post' : 'Create Post' }}
                                        </button>
                                    </div>
                                </form>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Post Delete Confirmation Modal -->
        <TransitionRoot appear :show="showDeleteModal" as="template">
            <Dialog as="div" @close="closeDeleteModal" class="relative z-50">
                <TransitionChild
                    as="template"
                    enter="duration-300 ease-out"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="duration-200 ease-in"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <div class="fixed inset-0 bg-black/50" />
                </TransitionChild>

                <div class="fixed inset-0 overflow-y-auto">
                    <div class="flex min-h-full items-center justify-center p-4">
                        <TransitionChild
                            as="template"
                            enter="duration-300 ease-out"
                            enter-from="opacity-0 scale-95"
                            enter-to="opacity-100 scale-100"
                            leave="duration-200 ease-in"
                            leave-from="opacity-100 scale-100"
                            leave-to="opacity-0 scale-95"
                        >
                            <DialogPanel class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white dark:bg-gray-800 p-6 shadow-xl transition-all">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                                        <ExclamationTriangleIcon class="w-6 h-6 text-red-600 dark:text-red-400" />
                                    </div>
                                    <div>
                                        <DialogTitle as="h3" class="text-lg font-medium text-gray-900 dark:text-white">
                                            Delete Blog Post
                                        </DialogTitle>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                            This action cannot be undone
                                        </p>
                                    </div>
                                </div>

                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                                    Are you sure you want to delete this blog post? All associated data will be permanently removed.
                                </p>

                                <div class="flex justify-end gap-3">
                                    <button
                                        type="button"
                                        @click="closeDeleteModal"
                                        class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
                                    >
                                        Cancel
                                    </button>
                                    <button
                                        type="button"
                                        @click="confirmDelete"
                                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors"
                                    >
                                        Delete Post
                                    </button>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>
    </AdminLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import AdminLayout from '../../Layouts/AdminLayout.vue';
import TiptapEditor from '../../Components/TiptapEditor.vue';
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue';
import {
    PlusIcon,
    PencilIcon,
    TrashIcon,
    BookOpenIcon,
    ExclamationTriangleIcon
} from '@heroicons/vue/24/outline';

const props = defineProps({
    posts: {
        type: Array,
        default: () => []
    },
    categories: {
        type: Array,
        default: () => []
    }
});

// Active categories for dropdown
const activeCategories = computed(() => {
    return props.categories.filter(cat => cat.is_active);
});

// Category Modal State
const showCategoryModal = ref(false);
const showDeleteCategoryModal = ref(false);
const isEditingCategory = ref(false);
const selectedCategory = ref(null);

const categoryForm = ref({
    name: '',
    slug: '',
    description: '',
    color: '#3B82F6',
    is_active: true,
    order: 0,
});

// Post Modal State
const showModal = ref(false);
const showDeleteModal = ref(false);
const isEditing = ref(false);
const selectedPost = ref(null);
const tagsInput = ref('');
const uploadMethod = ref('file');
const imagePreview = ref(null);
const featuredImageFile = ref(null);

const form = ref({
    title: '',
    slug: '',
    excerpt: '',
    content: '',
    featured_image: '',
    featured_image_url: '',
    blog_category_id: '',
    author: 'Ajay Upadhyay',
    tags: [],
    read_time: 5,
    is_featured: false,
    is_active: true,
    order: 0,
    meta_title: '',
    meta_description: '',
    published_at: '',
});

// Category Functions
const resetCategoryForm = () => {
    categoryForm.value = {
        name: '',
        slug: '',
        description: '',
        color: '#3B82F6',
        is_active: true,
        order: 0,
    };
};

const openCreateCategoryModal = () => {
    resetCategoryForm();
    isEditingCategory.value = false;
    showCategoryModal.value = true;
};

const openEditCategoryModal = (category) => {
    selectedCategory.value = category;
    categoryForm.value = {
        name: category.name,
        slug: category.slug,
        description: category.description || '',
        color: category.color,
        is_active: category.is_active,
        order: category.order,
    };
    isEditingCategory.value = true;
    showCategoryModal.value = true;
};

const openDeleteCategoryModal = (category) => {
    selectedCategory.value = category;
    showDeleteCategoryModal.value = true;
};

const closeCategoryModal = () => {
    showCategoryModal.value = false;
    resetCategoryForm();
    selectedCategory.value = null;
};

const closeDeleteCategoryModal = () => {
    showDeleteCategoryModal.value = false;
    selectedCategory.value = null;
};

const submitCategoryForm = () => {
    if (isEditingCategory.value) {
        router.put(route('admin.blog.categories.update', selectedCategory.value.id), categoryForm.value, {
            onSuccess: () => {
                closeCategoryModal();
            }
        });
    } else {
        router.post(route('admin.blog.categories.store'), categoryForm.value, {
            onSuccess: () => {
                closeCategoryModal();
            }
        });
    }
};

const confirmDeleteCategory = () => {
    router.delete(route('admin.blog.categories.destroy', selectedCategory.value.id), {
        onSuccess: () => {
            closeDeleteCategoryModal();
        }
    });
};

// Image Upload Handler
const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        featuredImageFile.value = file;

        // Create preview
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

// Post Functions
const resetForm = () => {
    form.value = {
        title: '',
        slug: '',
        excerpt: '',
        content: '',
        featured_image: '',
        featured_image_url: '',
        blog_category_id: '',
        author: 'Ajay Upadhyay',
        tags: [],
        read_time: 5,
        is_featured: false,
        is_active: true,
        order: 0,
        meta_title: '',
        meta_description: '',
        published_at: '',
    };
    tagsInput.value = '';
    imagePreview.value = null;
    featuredImageFile.value = null;
    uploadMethod.value = 'file';
};

const openCreateModal = () => {
    resetForm();
    isEditing.value = false;
    showModal.value = true;
};

const openEditModal = (post) => {
    selectedPost.value = post;
    form.value = {
        title: post.title,
        slug: post.slug,
        excerpt: post.excerpt,
        content: post.content,
        featured_image: post.featured_image || '',
        featured_image_url: '',
        blog_category_id: post.blog_category_id,
        author: post.author,
        tags: post.tags || [],
        read_time: post.read_time,
        is_featured: post.is_featured,
        is_active: post.is_active,
        order: post.order,
        meta_title: post.meta_title || '',
        meta_description: post.meta_description || '',
        published_at: post.published_at ? new Date(post.published_at).toISOString().slice(0, 16) : '',
    };
    tagsInput.value = Array.isArray(post.tags) ? post.tags.join(', ') : '';

    // Reset image upload state
    imagePreview.value = null;
    featuredImageFile.value = null;

    // Set upload method based on existing image
    if (post.featured_image && post.featured_image.startsWith('http')) {
        uploadMethod.value = 'url';
        form.value.featured_image_url = post.featured_image;
    } else {
        uploadMethod.value = 'file';
    }

    isEditing.value = true;
    showModal.value = true;
};

const openDeleteModal = (post) => {
    selectedPost.value = post;
    showDeleteModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
    resetForm();
    selectedPost.value = null;
};

const closeDeleteModal = () => {
    showDeleteModal.value = false;
    selectedPost.value = null;
};

const submitForm = () => {
    // Process tags
    const tags = tagsInput.value
        .split(',')
        .map(tag => tag.trim())
        .filter(tag => tag.length > 0);

    // Create FormData for file upload
    const formData = new FormData();

    // Append all form fields
    Object.keys(form.value).forEach(key => {
        if (key !== 'tags' && key !== 'featured_image' && form.value[key] !== null && form.value[key] !== '') {
            formData.append(key, form.value[key]);
        }
    });

    // Append tags
    tags.forEach((tag, index) => {
        formData.append(`tags[${index}]`, tag);
    });

    // Append featured image file if exists
    if (featuredImageFile.value) {
        formData.append('featured_image', featuredImageFile.value);
    } else if (uploadMethod.value === 'url' && form.value.featured_image_url) {
        formData.append('featured_image_url', form.value.featured_image_url);
    }

    const options = {
        onSuccess: () => {
            closeModal();
        },
        forceFormData: true,
    };

    if (isEditing.value) {
        formData.append('_method', 'PUT');
        router.post(route('admin.blog.update', selectedPost.value.id), formData, options);
    } else {
        router.post(route('admin.blog.store'), formData, options);
    }
};

const confirmDelete = () => {
    router.delete(route('admin.blog.destroy', selectedPost.value.id), {
        onSuccess: () => {
            closeDeleteModal();
        }
    });
};
</script>
