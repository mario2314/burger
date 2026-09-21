<template>
  <div class="card-admin">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
      <h6 class="fw-bold mb-0">Daftar Blog Post</h6>
      <div class="d-flex gap-2 align-items-center">
        <input
          type="text"
          v-model="search"
          class="form-control form-control-sm"
          style="width:220px;"
          placeholder="Cari judul, penulis, tag..."
        />
        <a :href="createUrl" class="btn-admin-primary"><i class="fas fa-plus me-1"></i> Tambah</a>
      </div>
    </div>

    <div v-if="loadError" class="alert alert-danger py-2 px-3 small mb-3">
      Gagal memuat data blog post. <a href="#" @click.prevent="fetchPosts">Coba lagi</a>.
    </div>

    <div class="table-responsive">
      <table class="table table-admin">
        <thead>
          <tr><th>Gambar</th><th>Judul</th><th>Penulis</th><th>Tag</th><th>Status</th><th>Aksi</th></tr>
        </thead>
        <tbody>
          <tr v-if="loading">
            <td colspan="6" class="text-center text-muted py-3">Memuat...</td>
          </tr>
          <template v-else>
            <tr v-for="post in filteredPosts" :key="post.id">
              <td><img :src="post.image_url" style="width:60px;height:46px;border-radius:8px;object-fit:cover;" /></td>
              <td>{{ post.title }}</td>
              <td>{{ post.author }}</td>
              <td>{{ post.tag }}</td>
              <td>
                <span v-if="post.is_active" class="badge-admin-active">Aktif</span>
                <span v-else class="badge-admin-inactive">Nonaktif</span>
              </td>
              <td>
                <a :href="post.edit_url" class="btn btn-sm btn-outline-secondary"><i class="fas fa-pen"></i></a>
                <button class="btn btn-sm btn-outline-danger" @click="confirmDelete(post)">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
            <tr v-if="!filteredPosts.length">
              <td colspan="6" class="text-center text-muted py-3">
                {{ posts.length ? 'Tidak ada hasil yang cocok.' : 'Belum ada blog post' }}
              </td>
            </tr>
          </template>
        </tbody>
      </table>
    </div>

    <!-- Modal konfirmasi delete -->
    <div v-if="toDelete" class="modal-backdrop-custom" @click.self="!deleting && (toDelete = null)">
      <div class="modal-box-custom">
        <h6 class="fw-bold mb-2">Hapus Blog Post?</h6>
        <p class="mb-3" style="font-size:.9rem;color:#666;">
          Yakin mau hapus "<strong>{{ toDelete.title }}</strong>"? Tindakan ini tidak bisa dibatalkan.
        </p>
        <div v-if="deleteError" class="alert alert-danger py-2 px-3 small">{{ deleteError }}</div>
        <div class="d-flex justify-content-end gap-2">
          <button type="button" class="btn btn-outline-secondary btn-sm" :disabled="deleting" @click="toDelete = null">Batal</button>
          <button type="button" class="btn btn-danger btn-sm" :disabled="deleting" @click="doDelete">
            {{ deleting ? 'Menghapus...' : 'Ya, Hapus' }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import axios from 'axios';

const props = defineProps({
  listUrl: { type: String, default: '' },
  createUrl: { type: String, default: '' },
});

const posts = ref([]);
const loading = ref(true);
const loadError = ref(false);

const search = ref('');
const toDelete = ref(null);
const deleting = ref(false);
const deleteError = ref('');

async function fetchPosts() {
  loading.value = true;
  loadError.value = false;
  try {
    const { data } = await axios.get(props.listUrl);
    posts.value = data;
  } catch (e) {
    loadError.value = true;
  } finally {
    loading.value = false;
  }
}

onMounted(fetchPosts);

const filteredPosts = computed(() => {
  if (!search.value.trim()) return posts.value;
  const q = search.value.toLowerCase();
  return posts.value.filter(p =>
    p.title.toLowerCase().includes(q) ||
    p.author.toLowerCase().includes(q) ||
    p.tag.toLowerCase().includes(q)
  );
});

function confirmDelete(post) {
  deleteError.value = '';
  toDelete.value = post;
}

async function doDelete() {
  if (!toDelete.value) return;
  deleting.value = true;
  deleteError.value = '';
  try {
    await axios.delete(toDelete.value.destroy_url);
    posts.value = posts.value.filter(p => p.id !== toDelete.value.id);
    toDelete.value = null;
  } catch (e) {
    deleteError.value = 'Gagal menghapus blog post. Coba lagi.';
  } finally {
    deleting.value = false;
  }
}
</script>

<style scoped>
.modal-backdrop-custom {
  position: fixed; inset: 0; background: rgba(0,0,0,.5);
  display: flex; align-items: center; justify-content: center; z-index: 1050;
}
.modal-box-custom {
  background: #fff; border-radius: 12px; padding: 24px; width: 100%; max-width: 380px;
}
</style>