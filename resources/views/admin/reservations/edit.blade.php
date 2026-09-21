@extends('admin.layouts.app')
@section('title', 'Edit Reservasi')
@section('page-title', 'Edit Reservasi')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.reservations.update', $reservation) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $reservation->name) }}" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Telepon</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $reservation->phone) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $reservation->email) }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label fw-semibold">Jumlah Tamu</label>
                <input type="number" name="guests" class="form-control" min="1" value="{{ old('guests', $reservation->guests) }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label fw-semibold">Tanggal</label>
                <input type="date" name="date" class="form-control" value="{{ old('date', \Carbon\Carbon::parse($reservation->date)->format('Y-m-d')) }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label fw-semibold">Jam</label>
                <input type="text" name="time" class="form-control" value="{{ old('time', $reservation->time) }}" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Catatan</label>
            <textarea name="notes" class="form-control" rows="2">{{ old('notes', $reservation->notes) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Status</label>
            <select name="status" class="form-select" required>
                <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <button type="submit" class="btn-admin-primary">Update</button>
        <a href="{{ route('admin.reservations.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection