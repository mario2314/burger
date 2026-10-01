@extends('admin.layouts.app')
@section('title', 'Email Leads')
@section('page-title', 'Pengaturan Email Leads')
@section('content')
@if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
<div class="card-admin" style="max-width:800px;">
    <form action="{{ route('admin.leads.update') }}" method="POST">
        @csrf @method('PUT')

        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" name="leads_enabled" value="1" id="en" @checked(old('leads_enabled', $values['leads_enabled']) == '1')>
            <label class="form-check-label fw-semibold" for="en">Kirim notifikasi email setiap ada lead baru</label>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Email penerima (Gmail pribadi)</label>
            <input type="text" name="leads_recipients" class="form-control @error('leads_recipients') is-invalid @enderror" value="{{ old('leads_recipients', $values['leads_recipients']) }}" placeholder="emimario39@gmail.com">
            <div class="form-text">Pisahkan dengan koma untuk lebih dari satu penerima.</div>
            @error('leads_recipients')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Alamat pengirim</label>
                <input type="email" name="leads_from_address" class="form-control @error('leads_from_address') is-invalid @enderror" value="{{ old('leads_from_address', $values['leads_from_address']) }}" placeholder="{{ $values['mail_from_env'] }}">
                <div class="form-text">Kosong = pakai MAIL_FROM_ADDRESS di .env ({{ $values['mail_from_env'] }}). Harus sama dengan akun SMTP.</div>
                @error('leads_from_address')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Nama pengirim</label>
                <input type="text" name="leads_from_name" class="form-control" value="{{ old('leads_from_name', $values['leads_from_name']) }}" placeholder="CS Website">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Format subject email</label>
            <input type="text" name="leads_subject_template" class="form-control @error('leads_subject_template') is-invalid @enderror" value="{{ old('leads_subject_template', $values['leads_subject_template']) }}">
            @error('leads_subject_template')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-2">
            <label class="form-label fw-semibold">Format isi email</label>
            <textarea name="leads_body_template" rows="12" class="form-control font-monospace @error('leads_body_template') is-invalid @enderror">{{ old('leads_body_template', $values['leads_body_template']) }}</textarea>
            @error('leads_body_template')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-text mb-4">Variabel: <code>{name}</code> <code>{email}</code> <code>{phone}</code> <code>{subject}</code> <code>{message}</code> <code>{date}</code>. Tombol Reply di Gmail otomatis membalas ke email pengunjung.</div>

        <button class="btn-admin-primary" type="submit">Simpan</button>
    </form>
    <form action="{{ route('admin.leads.test') }}" method="POST" class="mt-3">
        @csrf
        <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-paper-plane me-1"></i> Kirim email tes (pakai pengaturan tersimpan)</button>
    </form>
</div>
@endsection
