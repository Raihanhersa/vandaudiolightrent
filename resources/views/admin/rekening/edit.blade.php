@extends('layouts.admin.app')
@section('title', 'Edit Rekening')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Edit Rekening</h5>
    <a href="{{ route('admin.rekening.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
  </div>
  <div class="card-body">
    <form action="{{ route('admin.rekening.update', $dataRekening->rekening_id) }}" method="POST">
      @csrf
        @method('PUT')
      <div class="mb-6">
        <label class="form-label" for="nama_rekening">Nama rekening</label>
        <input type="text" class="form-control" id="nama_rekening" name="nama_rekening">
      </div>

      <div class="mb-6">
        <label class="form-label" for="kategori">Kategori</label>
        <select class="form-select" id="kategori" name="kategori">
          <option value="">Pilih kategori</option>
          <option value="Sound System">Sound System</option>
          <option value="Videotron">Videotron</option>
          <option value="Lighting">Lighting</option>
          <option value="Paket Lengkap">Paket Lengkap</option>
        </select>
      </div>


<div class="mb-6">
    <label class="form-label" for="nama_bank">Nama Bank</label>
    <input type="text" id="nama_bank" name="nama_bank"
        class="form-control @error('nama_bank') is-invalid @enderror"
        value="{{ old('nama_bank') }}" placeholder="Contoh: BCA">
    @error('nama_bank')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-6">
    <label class="form-label" for="nomor_rekening">Nomor Rekening</label>
    <input type="text" id="nomor_rekening" name="nomor_rekening"
        class="form-control @error('nomor_rekening') is-invalid @enderror"
        value="{{ old('nomor_rekening') }}" placeholder="Masukkan nomor rekening">
    @error('nomor_rekening')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-6">
    <label class="form-label" for="atas_nama">Atas Nama</label>
    <input type="text" id="atas_nama" name="atas_nama"
        class="form-control @error('atas_nama') is-invalid @enderror"
        value="{{ old('atas_nama') }}" placeholder="Masukkan nama pemilik rekening">
    @error('atas_nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-6">
    <label class="form-label" for="status">Status</label>
    <select id="status" name="status"
        class="form-select @error('status') is-invalid @enderror">
        <option value="">Pilih status</option>
        <option value="aktif" {{ old('status', 'aktif') == 'aktif' ? 'selected' : '' }}>
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

  </div>
</div>
@endsection
