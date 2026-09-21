<template>
  <section id="blog">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <span class="slbl">{{ label }}</span>
        <h2 class="stitle" v-html="title"></h2>
        <div class="sline"></div>
        <p v-if="subtitle" class="sdesc mx-auto" style="max-width:480px;">{{ subtitle }}</p>
      </div>

      <!-- Tag filter — cuma muncul kalau ada tags dikirim -->
      <div v-if="tags.length" class="text-center mb-4 d-flex flex-wrap justify-content-center gap-2">
        <button
          class="btn-filter"
          :class="{ active: activeTag === null }"
          @click="setTag(null)"
        >
          All
        </button>
        <button
          v-for="tag in tags"
          :key="tag"
          class="btn-filter"
          :class="{ active: activeTag === tag }"
          @click="setTag(tag)"
        >
          {{ tag }}
        </button>
      </div>

      <div class="row g-4">
        <div
          v-for="(post, index) in filteredPosts"
          :key="post.slug"
          class="col-md-6 col-lg-4"
          data-aos="fade-up"
          :data-aos-delay="index * 80"
        >
          <div class="blcard">
            <a :href="post.url" class="blimg d-block">
              <img :src="post.image_url" :alt="post.title" />
              <div class="bldatebdg">
                <span class="bd">{{ post.day }}</span>
                <span class="bm">{{ post.month }}</span>
              </div>
            </a>
            <div class="blbody">
              <div class="bltag">{{ post.tag }}</div>
              <div class="bltit">
                <a :href="post.url">{{ post.title }}</a>
              </div>
              <div class="blmeta">
                <span><i class="fas fa-user"></i>{{ post.author }}</span>
                <span><i class="fas fa-comment"></i>{{ post.comments_count }} Comments</span>
              </div>
              <a :href="post.url" class="blmore">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div v-if="!filteredPosts.length" class="col-12 text-center py-5">
          <p style="color:#888;">Belum ada post untuk tag ini.</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, computed, onMounted, nextTick } from 'vue';

const props = defineProps({
  posts: { type: Array, default: () => [] },
  tags: { type: Array, default: () => [] },
  label: { type: String, default: 'News & Updates' },
  title: { type: String, default: 'Our Latest <span>Blog</span> Posts' },
  subtitle: { type: String, default: '' },
});

const activeTag = ref(null);

const filteredPosts = computed(() => {
  if (!activeTag.value) return props.posts;
  return props.posts.filter(p => p.tag === activeTag.value);
});

async function setTag(tag) {
  activeTag.value = tag;
  await nextTick();
  if (window.AOS) window.AOS.refreshHard();
}

onMounted(async () => {
  await nextTick();
  if (window.AOS) window.AOS.refreshHard();
});
</script>

<style scoped>
.btn-filter {
  padding: 6px 18px;
  border-radius: 30px;
  border: 1px solid #ddd;
  background: transparent;
  font-size: 0.85rem;
  cursor: pointer;
  transition: all 0.2s;
}
.btn-filter.active,
.btn-filter:hover {
  background: #c0392b;
  color: #fff;
  border-color: #c0392b;
}
</style>