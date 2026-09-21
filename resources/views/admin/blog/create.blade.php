@extends('admin.layouts.app')
@section('title', 'Tambah Blog Post')
@section('page-title', 'Tambah Blog Post')
@section('content')
<div class="card-admin" style="max-width:750px;">
    <form action="{{ route('admin.blog.store') }}" method="POST" id="blogForm">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Judul</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Tag/Kategori</label>
            <input type="text" name="tag" class="form-control @error('tag') is-invalid @enderror" placeholder="contoh: Food & Health" value="{{ old('tag') }}" required>
            @error('tag')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Penulis</label>
            <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" required>
            @error('author')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Gambar (URL)</label>
            <div id="image-preview-app" data-value="{{ old('image') }}"></div>
            @error('image')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Isi Artikel</label>
            <textarea name="content" id="content" class="form-control" rows="10">{{ old('content') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Jumlah Komentar</label>
            <input type="number" name="comments_count" class="form-control" value="{{ old('comments_count', 0) }}">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="isActive" checked>
            <label class="form-check-label" for="isActive">Tampilkan di website</label>
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    const allowedLinkDomains = [
        'google.com', 'www.google.com',
        'sarabfood.com', 'www.sarabfood.com',
    ];

    const allowedImageDomains = [
        'lh3.googleusercontent.com', 'lh4.googleusercontent.com',
        'lh5.googleusercontent.com', 'lh6.googleusercontent.com',
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

    function isAllowedDomain(url, whitelist) {
        try {
            if (!url.startsWith('http://') && !url.startsWith('https://')) {
                url = 'https://' + url;
            }
            const hostname = new URL(url).hostname;
            return whitelist.some(domain =>
                hostname === domain || hostname.endsWith('.' + domain)
            );
        } catch { return false; }
    }

    CKEDITOR.replace('content', {
        versionCheck: false,
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic'] },
            { name: 'paragraph', items: ['NumberedList'] },
            { name: 'links', items: ['Link', 'Unlink'] }
        ],
        allowedContent: 'b strong i em ol li a[!href,target]',
        disallowedContent: 'script; *[on*]; *[style]',
        removePlugins: 'elementspath,iframe,flash,smiley,specialchar,scayt,wsc',
        resize_enabled: false,
        height: 260,
        on: {
            instanceReady: function () {
                this.on('dialogShow', function (evt) {
                    const dialog = evt.data;
                    if (dialog.getName() === 'link') {
                        dialog.on('ok', function () {
                            const url = dialog.getValueOf('info', 'url');
                            if (!isAllowedDomain(url, allowedLinkDomains)) {
                                alert('Link tidak diizinkan. Hanya domain Google dan Sarab yang boleh digunakan.');
                                return false;
                            }
                        }, null, null, 0);
                    }
                });
            }
        }
    });

    const blogForm = document.querySelector('#blogForm');

    function clearFormErrors(form) {
        form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        form.querySelectorAll('.invalid-feedback, .text-danger.small').forEach(el => el.textContent = '');
    }

    function showFormErrors(form, errors) {
        Object.entries(errors).forEach(([field, messages]) => {
            const input = form.querySelector(`[name="${field}"]`);
            const container = input ? input.closest('.mb-3') : form.querySelector(`#image-preview-app`)?.closest('.mb-3');
            if (input) input.classList.add('is-invalid');
            const feedback = container?.querySelector('.invalid-feedback, .text-danger.small');
            if (feedback) feedback.textContent = messages[0];
        });
    }

    blogForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        document.getElementById('content').value = CKEDITOR.instances.content.getData();
        const data = CKEDITOR.instances.content.getData();
        const parser = new DOMParser();
        const doc = parser.parseFromString(data, 'text/html');

        for (let link of doc.querySelectorAll('a')) {
            const href = link.getAttribute('href');
            if (href && !isAllowedDomain(href, allowedLinkDomains)) {
                alert('Gagal menyimpan: Ada link dengan domain yang tidak diizinkan di dalam artikel.');
                return;
            }
        }

        const form = e.target;
        const submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        clearFormErrors(form);

        try {
            const { data: resData } = await axios.post(form.action, new FormData(form));
            window.location.href = resData.redirect;
        } catch (err) {
            submitBtn.disabled = false;
            if (err.response && err.response.status === 422) {
                showFormErrors(form, err.response.data.errors || {});
            } else {
                alert('Terjadi kesalahan saat menyimpan data.');
            }
        }
    });
</script>
@endsection