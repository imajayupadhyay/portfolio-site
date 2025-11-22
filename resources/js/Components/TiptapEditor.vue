<template>
    <div class="tiptap-editor-container">
        <!-- Toolbar -->
        <div class="tiptap-toolbar">
            <!-- Text Formatting -->
            <div class="toolbar-group">
                <button
                    @click="editor.chain().focus().toggleBold().run()"
                    :class="{ 'is-active': editor?.isActive('bold') }"
                    class="toolbar-btn"
                    type="button"
                    title="Bold (Ctrl+B)"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M11 3H6a1 1 0 000 2h1.5v10H6a1 1 0 000 2h5a4 4 0 001.866-7.538A4 4 0 0011 3zm-.5 12H9.5V9h1.5a2 2 0 110 4zm.5-6h-2V5h2a2 2 0 110 4z"/>
                    </svg>
                </button>

                <button
                    @click="editor.chain().focus().toggleItalic().run()"
                    :class="{ 'is-active': editor?.isActive('italic') }"
                    class="toolbar-btn"
                    type="button"
                    title="Italic (Ctrl+I)"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 3a1 1 0 011 1v1.5h1a1 1 0 110 2h-.5l-2 10H11a1 1 0 110 2H7a1 1 0 110-2h.5l2-10H9a1 1 0 110-2h1V4a1 1 0 011-1z"/>
                    </svg>
                </button>

                <button
                    @click="editor.chain().focus().toggleUnderline().run()"
                    :class="{ 'is-active': editor?.isActive('underline') }"
                    class="toolbar-btn"
                    type="button"
                    title="Underline (Ctrl+U)"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6 3a1 1 0 011 1v6a3 3 0 106 0V4a1 1 0 112 0v6a5 5 0 01-10 0V4a1 1 0 011-1zM4 17a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1z"/>
                    </svg>
                </button>

                <button
                    @click="editor.chain().focus().toggleStrike().run()"
                    :class="{ 'is-active': editor?.isActive('strike') }"
                    class="toolbar-btn"
                    type="button"
                    title="Strikethrough"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 13h2v2H9v-2zm0-8h2v6H9V5z" fill-rule="evenodd" clip-rule="evenodd"/>
                        <path d="M4 9h12v2H4V9z"/>
                    </svg>
                </button>

                <button
                    @click="editor.chain().focus().toggleCode().run()"
                    :class="{ 'is-active': editor?.isActive('code') }"
                    class="toolbar-btn"
                    type="button"
                    title="Inline Code"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>

            <div class="toolbar-divider"></div>

            <!-- Headings -->
            <div class="toolbar-group">
                <button
                    @click="editor.chain().focus().toggleHeading({ level: 2 }).run()"
                    :class="{ 'is-active': editor?.isActive('heading', { level: 2 }) }"
                    class="toolbar-btn"
                    type="button"
                    title="Heading 2"
                >
                    <span class="text-sm font-bold">H2</span>
                </button>

                <button
                    @click="editor.chain().focus().toggleHeading({ level: 3 }).run()"
                    :class="{ 'is-active': editor?.isActive('heading', { level: 3 }) }"
                    class="toolbar-btn"
                    type="button"
                    title="Heading 3"
                >
                    <span class="text-sm font-bold">H3</span>
                </button>

                <button
                    @click="editor.chain().focus().setParagraph().run()"
                    :class="{ 'is-active': editor?.isActive('paragraph') }"
                    class="toolbar-btn"
                    type="button"
                    title="Paragraph"
                >
                    <span class="text-sm">P</span>
                </button>
            </div>

            <div class="toolbar-divider"></div>

            <!-- Lists -->
            <div class="toolbar-group">
                <button
                    @click="editor.chain().focus().toggleBulletList().run()"
                    :class="{ 'is-active': editor?.isActive('bulletList') }"
                    class="toolbar-btn"
                    type="button"
                    title="Bullet List"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 6a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 14a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"/>
                    </svg>
                </button>

                <button
                    @click="editor.chain().focus().toggleOrderedList().run()"
                    :class="{ 'is-active': editor?.isActive('orderedList') }"
                    class="toolbar-btn"
                    type="button"
                    title="Numbered List"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 8a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 12a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"/>
                    </svg>
                </button>

                <button
                    @click="editor.chain().focus().toggleCodeBlock().run()"
                    :class="{ 'is-active': editor?.isActive('codeBlock') }"
                    class="toolbar-btn"
                    type="button"
                    title="Code Block"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <button
                    @click="editor.chain().focus().toggleBlockquote().run()"
                    :class="{ 'is-active': editor?.isActive('blockquote') }"
                    class="toolbar-btn"
                    type="button"
                    title="Blockquote"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm2.5 3a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm6.207.293a1 1 0 00-1.414 0l-6 6a1 1 0 101.414 1.414l6-6a1 1 0 000-1.414zM12.5 10a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>

            <div class="toolbar-divider"></div>

            <!-- Table -->
            <div class="toolbar-group">
                <button
                    @click="editor.chain().focus().insertTable({ rows: 3, cols: 3, withHeaderRow: true }).run()"
                    class="toolbar-btn"
                    type="button"
                    title="Insert Table"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 1v2h2V5H5zm4 0v2h2V5H9zm4 0v2h2V5h-2zm2 4h-2v2h2V9zM9 9v2h2V9H9zm-4 0v2h2V9H5zm0 4v2h2v-2H5zm4 0v2h2v-2H9zm4 0v2h2v-2h-2z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <button
                    v-if="editor?.isActive('table')"
                    @click="editor.chain().focus().deleteTable().run()"
                    class="toolbar-btn"
                    type="button"
                    title="Delete Table"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <button
                    v-if="editor?.isActive('table')"
                    @click="editor.chain().focus().addColumnAfter().run()"
                    class="toolbar-btn"
                    type="button"
                    title="Add Column"
                >
                    <span class="text-xs font-bold">Col+</span>
                </button>

                <button
                    v-if="editor?.isActive('table')"
                    @click="editor.chain().focus().addRowAfter().run()"
                    class="toolbar-btn"
                    type="button"
                    title="Add Row"
                >
                    <span class="text-xs font-bold">Row+</span>
                </button>
            </div>

            <div class="toolbar-divider"></div>

            <!-- Link -->
            <div class="toolbar-group">
                <button
                    @click="setLink"
                    :class="{ 'is-active': editor?.isActive('link') }"
                    class="toolbar-btn"
                    type="button"
                    title="Add Link"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <button
                    v-if="editor?.isActive('link')"
                    @click="editor.chain().focus().unsetLink().run()"
                    class="toolbar-btn"
                    type="button"
                    title="Remove Link"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9l1.293 1.293a1 1 0 01-1.414 1.414L8 10.414l-1.293 1.293a1 1 0 01-1.414-1.414L6.586 9 5.293 7.707a1 1 0 011.414-1.414L8 7.586l1.293-1.293a1 1 0 011.414 0zM13 7a1 1 0 011 1v5.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L14 13.586V8a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>

            <div class="toolbar-divider"></div>

            <!-- Undo/Redo -->
            <div class="toolbar-group">
                <button
                    @click="editor.chain().focus().undo().run()"
                    :disabled="!editor?.can().undo()"
                    class="toolbar-btn"
                    type="button"
                    title="Undo"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a2 2 0 012 2v4a1 1 0 11-2 0v-4H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <button
                    @click="editor.chain().focus().redo().run()"
                    :disabled="!editor?.can().redo()"
                    class="toolbar-btn"
                    type="button"
                    title="Redo"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a2 2 0 01-2-2V5a1 1 0 112 0v4h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Editor Content -->
        <div class="tiptap-editor-content">
            <EditorContent :editor="editor" />
        </div>
    </div>
</template>

<script setup>
import { watch, onBeforeUnmount } from 'vue';
import { useEditor, EditorContent } from '@tiptap/vue-3';
import StarterKit from '@tiptap/starter-kit';
import { Underline } from '@tiptap/extension-underline';
import { Link } from '@tiptap/extension-link';
import { Table } from '@tiptap/extension-table';
import { TableRow } from '@tiptap/extension-table-row';
import { TableCell } from '@tiptap/extension-table-cell';
import { TableHeader } from '@tiptap/extension-table-header';

const props = defineProps({
    modelValue: {
        type: String,
        default: '',
    },
});

const emit = defineEmits(['update:modelValue']);

const editor = useEditor({
    content: props.modelValue,
    extensions: [
        StarterKit,
        Underline,
        Link.configure({
            openOnClick: false,
            HTMLAttributes: {
                class: 'text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 transition-colors',
            },
        }),
        Table.configure({
            resizable: true,
            HTMLAttributes: {
                class: 'border-collapse table-auto w-full my-4',
            },
        }),
        TableRow,
        TableHeader.configure({
            HTMLAttributes: {
                class: 'border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 px-4 py-2 text-left font-semibold',
            },
        }),
        TableCell.configure({
            HTMLAttributes: {
                class: 'border border-gray-300 dark:border-gray-600 px-4 py-2',
            },
        }),
    ],
    editorProps: {
        attributes: {
            class: 'tiptap-content focus:outline-none',
        },
    },
    onUpdate: ({ editor }) => {
        emit('update:modelValue', editor.getHTML());
    },
});

// Watch for external changes to modelValue
watch(() => props.modelValue, (value) => {
    const isSame = editor.value?.getHTML() === value;
    if (!isSame) {
        editor.value?.commands.setContent(value, false);
    }
});

const setLink = () => {
    const previousUrl = editor.value?.getAttributes('link').href;
    const url = window.prompt('URL', previousUrl);

    if (url === null) {
        return;
    }

    if (url === '') {
        editor.value?.chain().focus().extendMarkRange('link').unsetLink().run();
        return;
    }

    editor.value?.chain().focus().extendMarkRange('link').setLink({ href: url }).run();
};

onBeforeUnmount(() => {
    editor.value?.destroy();
});
</script>

<style scoped>
/* Container */
.tiptap-editor-container {
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    overflow: hidden;
    background-color: white;
}

:global(.dark) .tiptap-editor-container {
    border-color: #4b5563;
    background-color: #1f2937;
}

/* Toolbar Styles */
.tiptap-toolbar {
    background: linear-gradient(to right, #f9fafb, #f3f4f6);
    border-bottom: 1px solid #d1d5db;
    padding: 0.5rem;
    display: flex;
    flex-wrap: wrap;
    gap: 0.25rem;
    align-items: center;
}

:global(.dark) .tiptap-toolbar {
    background: linear-gradient(to right, #374151, #1f2937);
    border-bottom-color: #4b5563;
}

.toolbar-group {
    display: flex;
    gap: 0.25rem;
    align-items: center;
}

.toolbar-divider {
    width: 1px;
    height: 1.5rem;
    background-color: #d1d5db;
    margin: 0 0.25rem;
}

:global(.dark) .toolbar-divider {
    background-color: #4b5563;
}

.toolbar-btn {
    padding: 0.5rem;
    border-radius: 0.375rem;
    color: #374151;
    transition: all 0.2s;
}

.toolbar-btn:hover:not(:disabled) {
    background-color: white;
}

.toolbar-btn:disabled {
    opacity: 0.3;
    cursor: not-allowed;
}

:global(.dark) .toolbar-btn {
    color: #d1d5db;
}

:global(.dark) .toolbar-btn:hover:not(:disabled) {
    background-color: #4b5563;
}

.toolbar-btn.is-active {
    background-color: #dbeafe;
    color: #1d4ed8;
}

:global(.dark) .toolbar-btn.is-active {
    background-color: rgba(30, 58, 138, 0.4);
    color: #60a5fa;
}

/* Editor Content Area */
.tiptap-editor-content {
    padding: 1.5rem;
    min-height: 400px;
    max-height: 600px;
    overflow-y: auto;
    background-color: white;
}

:global(.dark) .tiptap-editor-content {
    background-color: #1f2937;
}

/* Prose Styles for Content */
.tiptap-editor-content :deep(.tiptap-content) {
    color: #111827;
}

:global(.dark) .tiptap-editor-content :deep(.tiptap-content) {
    color: #f3f4f6;
}

/* Paragraphs */
.tiptap-editor-content :deep(p) {
    margin-bottom: 1rem;
    line-height: 1.75;
    font-size: 1rem;
    color: #1f2937;
}

:global(.dark) .tiptap-editor-content :deep(p) {
    color: #e5e7eb;
}

.tiptap-editor-content :deep(p:last-child) {
    margin-bottom: 0;
}

/* Headings */
.tiptap-editor-content :deep(h2) {
    font-size: 1.875rem;
    font-weight: 700;
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: #111827;
    border-bottom: 2px solid #e5e7eb;
    padding-bottom: 0.5rem;
}

:global(.dark) .tiptap-editor-content :deep(h2) {
    color: white;
    border-bottom-color: #374151;
}

.tiptap-editor-content :deep(h3) {
    font-size: 1.5rem;
    font-weight: 600;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
    color: #111827;
}

:global(.dark) .tiptap-editor-content :deep(h3) {
    color: white;
}

.tiptap-editor-content :deep(h2:first-child),
.tiptap-editor-content :deep(h3:first-child) {
    margin-top: 0;
}

/* Lists */
.tiptap-editor-content :deep(ul),
.tiptap-editor-content :deep(ol) {
    padding-left: 2rem;
    margin-bottom: 1rem;
}

.tiptap-editor-content :deep(ul) {
    list-style-type: disc;
}

.tiptap-editor-content :deep(ol) {
    list-style-type: decimal;
}

.tiptap-editor-content :deep(li) {
    color: #1f2937;
    line-height: 1.75;
    margin-bottom: 0.5rem;
}

:global(.dark) .tiptap-editor-content :deep(li) {
    color: #e5e7eb;
}

.tiptap-editor-content :deep(li > p) {
    margin-bottom: 0.5rem;
}

.tiptap-editor-content :deep(li > ul),
.tiptap-editor-content :deep(li > ol) {
    margin-top: 0.5rem;
    margin-bottom: 0;
}

/* Code */
.tiptap-editor-content :deep(code) {
    background-color: #f3f4f6;
    color: #db2777;
    padding: 0.125rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.875rem;
    font-family: monospace;
}

:global(.dark) .tiptap-editor-content :deep(code) {
    background-color: #111827;
    color: #f9a8d4;
}

/* Code Blocks */
.tiptap-editor-content :deep(pre) {
    background-color: #111827;
    color: #f3f4f6;
    border-radius: 0.5rem;
    padding: 1rem;
    margin: 1rem 0;
    overflow-x: auto;
}

:global(.dark) .tiptap-editor-content :deep(pre) {
    background-color: #000;
}

.tiptap-editor-content :deep(pre code) {
    background-color: transparent;
    color: #f3f4f6;
    padding: 0;
    font-size: 0.875rem;
    line-height: 1.5;
}

/* Blockquotes */
.tiptap-editor-content :deep(blockquote) {
    border-left: 4px solid #3b82f6;
    padding-left: 1rem;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    margin: 1rem 0;
    font-style: italic;
    background-color: #eff6ff;
    color: #374151;
}

:global(.dark) .tiptap-editor-content :deep(blockquote) {
    border-left-color: #60a5fa;
    background-color: rgba(30, 58, 138, 0.2);
    color: #d1d5db;
}

.tiptap-editor-content :deep(blockquote p) {
    margin-bottom: 0.5rem;
}

.tiptap-editor-content :deep(blockquote p:last-child) {
    margin-bottom: 0;
}

/* Tables */
.tiptap-editor-content :deep(table) {
    border-collapse: collapse;
    width: 100%;
    margin: 1.5rem 0;
    font-size: 0.875rem;
}

.tiptap-editor-content :deep(th) {
    border: 1px solid #d1d5db;
    background-color: #f3f4f6;
    padding: 0.75rem 1rem;
    text-align: left;
    font-weight: 700;
    color: #111827;
}

:global(.dark) .tiptap-editor-content :deep(th) {
    border-color: #4b5563;
    background-color: #374151;
    color: white;
}

.tiptap-editor-content :deep(td) {
    border: 1px solid #d1d5db;
    padding: 0.75rem 1rem;
    color: #1f2937;
}

:global(.dark) .tiptap-editor-content :deep(td) {
    border-color: #4b5563;
    color: #e5e7eb;
}

.tiptap-editor-content :deep(tr:nth-child(even)) {
    background-color: #f9fafb;
}

:global(.dark) .tiptap-editor-content :deep(tr:nth-child(even)) {
    background-color: rgba(31, 41, 55, 0.5);
}

.tiptap-editor-content :deep(tr:hover) {
    background-color: #f3f4f6;
    transition: background-color 0.2s;
}

:global(.dark) .tiptap-editor-content :deep(tr:hover) {
    background-color: rgba(55, 65, 81, 0.5);
}

/* Links */
.tiptap-editor-content :deep(a) {
    color: #2563eb;
    text-decoration: underline;
    transition: color 0.2s;
}

.tiptap-editor-content :deep(a:hover) {
    color: #1e40af;
}

:global(.dark) .tiptap-editor-content :deep(a) {
    color: #60a5fa;
}

:global(.dark) .tiptap-editor-content :deep(a:hover) {
    color: #93c5fd;
}

/* Strong/Bold */
.tiptap-editor-content :deep(strong) {
    font-weight: 700;
    color: #111827;
}

:global(.dark) .tiptap-editor-content :deep(strong) {
    color: white;
}

/* Emphasis/Italic */
.tiptap-editor-content :deep(em) {
    font-style: italic;
}

/* Underline */
.tiptap-editor-content :deep(u) {
    text-decoration: underline;
}

/* Strikethrough */
.tiptap-editor-content :deep(s) {
    text-decoration: line-through;
    color: #6b7280;
}

:global(.dark) .tiptap-editor-content :deep(s) {
    color: #9ca3af;
}

/* Horizontal Rule */
.tiptap-editor-content :deep(hr) {
    border: none;
    border-top: 2px solid #d1d5db;
    margin: 2rem 0;
}

:global(.dark) .tiptap-editor-content :deep(hr) {
    border-top-color: #4b5563;
}

/* Focus States */
.tiptap-editor-content :deep(.tiptap-content:focus) {
    outline: none;
}

/* Scrollbar Styling */
.tiptap-editor-content::-webkit-scrollbar {
    width: 8px;
}

.tiptap-editor-content::-webkit-scrollbar-track {
    background: #f3f4f6;
}

:global(.dark) .tiptap-editor-content::-webkit-scrollbar-track {
    background: #374151;
}

.tiptap-editor-content::-webkit-scrollbar-thumb {
    background: #9ca3af;
    border-radius: 9999px;
}

.tiptap-editor-content::-webkit-scrollbar-thumb:hover {
    background: #6b7280;
}

:global(.dark) .tiptap-editor-content::-webkit-scrollbar-thumb {
    background: #6b7280;
}

:global(.dark) .tiptap-editor-content::-webkit-scrollbar-thumb:hover {
    background: #9ca3af;
}
</style>
