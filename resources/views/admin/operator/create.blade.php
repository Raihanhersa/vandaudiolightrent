@extends('layouts.admin.app')
@section('title', 'Tambah Operator')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Tambah Operator</h5>
    <a href="{{ route('admin.operator.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
  </div>
  @if ($errors->any())
  <div class="alert alert-danger" role="alert">Periksa kembali isian Anda, ada data yang belum benar.</div>
@endif
  <div class="card-body">
    <form action="{{ route('admin.operator.store') }}" method="POST">
      @csrf



<div class="mb-6">
    <label class="form-label" for="nama_operator">Nama Operator</label>
    <input type="text" id="nama_operator" name="nama_operator"
        class="form-control @error('nama_operator') is-invalid @enderror"
        value="{{ old('nama_operator') }}">
    @error('nama_operator')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-6">
    <label class="form-label" for="email">Email</label>
    <input type="email" id="email" name="email"
        class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email') }}">
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-6">
    <label class="form-label" for="no_telepon">No. Telepon</label>
    <input type="text" id="no_telepon" name="no_telepon"
        class="form-control @error('no_telepon') is-invalid @enderror"
        value="{{ old('no_telepon') }}">
    @error('no_telepon')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-6">
    <label class="form-label" for="spesialisasi">Spesialisasi</label>
    <select id="spesialisasi" name="spesialisasi"
        class="form-select @error('spesialisasi') is-invalid @enderror">
        <option value="">Pilih spesialisasi</option>
        @foreach (['Sound System', 'Videotron', 'Lighting', 'Semua'] as $s)
            <option value="{{ $s }}" {{ old('spesialisasi') == $s ? 'selected' : '' }}>
                {{ $s }}
            </option>
        @endforeach
    </select>
    @error('spesialisasi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-6">
    <label class="form-label" for="tanggal_bergabung">Tanggal Bergabung</label>
    <input type="date" id="tanggal_bergabung" name="tanggal_bergabung"
        class="form-control @error('tanggal_bergabung') is-invalid @enderror"
        value="{{ old('tanggal_bergabung') }}">
    @error('tanggal_bergabung')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-6">
    <label class="form-label" for="status">Status</label>
    <select id="status" name="status"
        class="form-select @error('status') is-invalid @enderror">
        <option value="">Pilih status</option>
        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>
            Aktif
        </option>
        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>
            Nonaktif
        </option>
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection
