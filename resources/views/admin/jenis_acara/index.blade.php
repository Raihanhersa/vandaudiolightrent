@extends('layouts.admin.app')
@section('title', 'Kelola Jenis Acara')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Daftar jenis acara</h5>
    <a href="{{ route('admin.jenis-acara.create') }}" class="btn btn-primary">
      <i class="icon-base bx bx-plus me-1"></i> Tambah jenis acara
    </a>
  </div>

  <div class="card-body pb-0">
    <form action="{{ route('admin.jenis-acara.index') }}" method="GET" class="d-flex gap-2">
      <input type="text" name="cari" value="{{ $cari }}" class="form-control"
             placeholder="Cari jenis acara atau keterangan...">
      <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>
  </div>

  <div class="table-responsive text-nowrap mt-3">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama jenis</th>
          <th>Keterangan</th>
          <th>Jumlah acara</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($dataJenis as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_jenis }}</td>
            <td>{{ $item->keterangan ?? '-' }}</td>
            <td><span class="badge bg-label-primary">{{ $item->jumlah_acara }}</span></td>
            <td>
              <a href="{{ route('admin.jenis-acara.edit', $item->jenis_acara_id) }}"
                 class="btn btn-info btn-sm me-1">
                <i class="icon-base bx bx-edit-alt me-1"></i> Edit
              </a>

              <form action="{{ route('admin.jenis-acara.destroy', $item->jenis_acara_id) }}" method="POST"
                    class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jenis acara ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  <i class="icon-base bx bx-trash me-1"></i> Hapus
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center text-body-secondary py-4">Belum ada data jenis acara.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
