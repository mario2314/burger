<template>
  <div class="mt-2">
    <input
      type="text"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      class="form-control"
      :class="{ 'is-invalid': modelValue && !isValid }"
      placeholder="contoh: https://res.cloudinary.com/... atau https://images.unsplash.com/..."
      name="image"
      required
    />
    <small class="text-muted d-block mt-1">
      Domain yang diizinkan: Google, Cloudinary, Unsplash, Pexels, Pixabay, Wikimedia, Imgur, Freepik, Shutterstock
    </small>
    <div v-if="modelValue" class="mt-2">
      <span v-if="isValid" class="badge bg-success mb-2">Domain valid</span>
      <span v-else class="badge bg-danger mb-2">Domain tidak diizinkan</span>
      <div>
        <img
          v-if="isValid"
          :src="modelValue"
          @error="loadFailed = true"
          @load="loadFailed = false"
          style="width:120px;height:90px;object-fit:cover;border-radius:8px;border:1px solid #ddd;"
        />
        <small v-if="loadFailed" class="text-danger d-block">Gambar gagal dimuat, cek lagi URL-nya.</small>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const props = defineProps({
  modelValue: { type: String, default: '' },
});
defineEmits(['update:modelValue']);

const loadFailed = ref(false);

const allowedDomains = [
  'lh3.googleusercontent.com', 'lh4.googleusercontent.com', 'lh5.googleusercontent.com', 'lh6.googleusercontent.com',
  'storage.googleapis.com', 'drive.google.com',
  'res.cloudinary.com',
  'images.unsplash.com', 'plus.unsplash.com',
  'images.pexels.com', 'www.pexels.com',
  'cdn.pixabay.com',
  'upload.wikimedia.org',
  'i.imgur.com', 'imgur.com',
  'img.freepik.com',
  'images.shutterstock.com',
];

const isValid = computed(() => {
  if (!props.modelValue) return false;
  try {
    let url = props.modelValue;
    if (!url.startsWith('http://') && !url.startsWith('https://')) url = 'https://' + url;
    const hostname = new URL(url).hostname;
    return allowedDomains.some(d => hostname === d || hostname.endsWith('.' + d));
  } catch {
    return false;
  }
});
</script>