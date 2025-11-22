<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with('category')->orderBy('order')->orderBy('created_at', 'desc')->get();
        $categories = BlogCategory::orderBy('order')->orderBy('name')->get();

        return Inertia::render('Admin/Blog', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'featured_image_url' => 'nullable|string',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'author' => 'nullable|string',
            'tags' => 'nullable|array',
            'read_time' => 'nullable|integer|min:1',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blog-images', 'public');
            $validated['featured_image'] = '/storage/' . $imagePath;
        } elseif ($request->filled('featured_image_url')) {
            $validated['featured_image'] = $validated['featured_image_url'];
        }

        unset($validated['featured_image_url']);

        BlogPost::create($validated);

        return redirect()->back()->with('success', 'Blog post created successfully.');
    }

    public function update(Request $request, BlogPost $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . $post->id,
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'featured_image_url' => 'nullable|string',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'author' => 'nullable|string',
            'tags' => 'nullable|array',
            'read_time' => 'nullable|integer|min:1',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if it exists and is stored locally
            if ($post->featured_image && str_starts_with($post->featured_image, '/storage/')) {
                $oldImagePath = str_replace('/storage/', '', $post->featured_image);
                \Storage::disk('public')->delete($oldImagePath);
            }

            $imagePath = $request->file('featured_image')->store('blog-images', 'public');
            $validated['featured_image'] = '/storage/' . $imagePath;
        } elseif ($request->filled('featured_image_url')) {
            $validated['featured_image'] = $validated['featured_image_url'];
        } else {
            // Keep the existing image if no new one is provided
            unset($validated['featured_image']);
        }

        unset($validated['featured_image_url']);

        $post->update($validated);

        return redirect()->back()->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $post)
    {
        // Delete associated image if it exists and is stored locally
        if ($post->featured_image && str_starts_with($post->featured_image, '/storage/')) {
            $imagePath = str_replace('/storage/', '', $post->featured_image);
            \Storage::disk('public')->delete($imagePath);
        }

        $post->delete();

        return redirect()->back()->with('success', 'Blog post deleted successfully.');
    }

    // Blog Category CRUD Methods

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name',
            'slug' => 'nullable|string|max:255|unique:blog_categories,slug',
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:7',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        BlogCategory::create($validated);

        return redirect()->back()->with('success', 'Blog category created successfully.');
    }

    public function updateCategory(Request $request, BlogCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name,' . $category->id,
            'slug' => 'nullable|string|max:255|unique:blog_categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'color' => 'nullable|string|max:7',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $category->update($validated);

        return redirect()->back()->with('success', 'Blog category updated successfully.');
    }

    public function destroyCategory(BlogCategory $category)
    {
        // Check if category has posts
        if ($category->posts()->count() > 0) {
            return redirect()->back()->withErrors(['error' => 'Cannot delete category with existing posts. Please reassign or delete the posts first.']);
        }

        $category->delete();

        return redirect()->back()->with('success', 'Blog category deleted successfully.');
    }
}
