@extends('layouts.admin.app')
@section('title', 'Tambah Jenis Acara')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Tambah jenis acara</h5>
    <a href="{{ route('admin.jenis-acara.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        Periksa kembali isian Anda, ada data yang belum benar.
      </div>
    @endif

    <form action="{{ route('admin.jenis-acara.store') }}" method="POST">
      @csrf

      <div class="mb-6">
        <label class="form-label" for="nama_jenis">Nama jenis acara</label>
        <input type="text" id="nama_jenis" name="nama_jenis"
               class="form-control @error('nama_jenis') is-invalid @enderror"
               value="{{ old('nama_jenis') }}" placeholder="Contoh: Konser">
        @error('nama_jenis')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-6">
        <label class="form-label" for="keterangan">Keterangan</label>
        <textarea id="keterangan" name="keterangan" rows="3"
                  class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
        @error('keterangan')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection
