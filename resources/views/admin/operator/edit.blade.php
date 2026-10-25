@extends('layouts.admin.app')
@section('title', 'Edit Operator')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Edit Operator</h5>
    <a href="{{ route('admin.operator.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
  </div>
  <div class="card-body">
    <form action="{{ route('admin.operator.update', $dataOperator->operator_id) }}" method="POST">
      @csrf
        @method('PUT')
      <div class="mb-6">
        <label class="form-label" for="nama_operator">Nama operator</label>
        <input type="text" class="form-control" id="nama_operator" name="nama_operator">
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
        <label class="form-label" for="harga_per_hari">Harga per Hari</label>
        <input type="number" class="form-control" id="harga_per_hari"
            name="harga_per_hari" placeholder="Masukkan harga per hari">
    </div>

    <div class="mb-6">
        <label class="form-label" for="stok">Stok</label>
        <input type="number" class="form-control" id="stok"
            name="stok" placeholder="Masukkan jumlah stok">
    </div>

    <div class="mb-6">
        <label class="form-label" for="status">Status</label>
        <select class="form-select" id="status" name="status">
            <option value="">Pilih status</option>
            <option value="tersedia">Tersedia</option>
            <option value="tidak tersedia">Tidak Tersedia</option>
        </select>
    </div>

    <div class="mb-6">
        <label class="form-label" for="deskripsi">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi"
            rows="4" placeholder="Masukkan deskripsi"></textarea>
    </div>


      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
  </div>
</div>
@endsection
