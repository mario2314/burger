import './bootstrap';
import { createApp } from 'vue';
import BlogSection from './components/BlogSection.vue';
import ImagePreview from './components/ImagePreview.vue';
import BlogTable from './components/BlogTable.vue';

const blogTableEl = document.getElementById('blog-table-app');
if (blogTableEl) {
    createApp(BlogTable, {
        listUrl: blogTableEl.dataset.listUrl,
        createUrl: blogTableEl.dataset.createUrl,
    }).mount(blogTableEl);
}

const imgPreviewEl = document.getElementById('image-preview-app');
if (imgPreviewEl) {
    createApp({
        components: { ImagePreview },
        data() { return { value: imgPreviewEl.dataset.value || '' }; },
        template: '<ImagePreview v-model="value" />',
    }).mount(imgPreviewEl);
}

const blogEl = document.getElementById('blog-app');
if (blogEl) {
    createApp(BlogSection, {
        posts: JSON.parse(blogEl.dataset.posts),
        tags: JSON.parse(blogEl.dataset.tags || '[]'),
        label: blogEl.dataset.label,
        title: blogEl.dataset.title,
        subtitle: blogEl.dataset.subtitle,
    }).mount(blogEl);
}