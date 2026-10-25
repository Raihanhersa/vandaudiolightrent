@extends('layouts.admin.app')
@section('title', 'Kelola Layanan')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Daftar layanan</h5>
    <a href="{{ route('admin.layanan.create') }}" class="btn btn-primary">
      <i class="icon-base bx bx-plus me-1"></i> Tambah layanan
    </a>
  </div>

  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama layanan</th>
          <th>Kategori</th>
          <th>Harga / hari</th>
          <th>Stok</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($dataLayanan as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_layanan }}</td>
            <td>{{ $item->kategori }}</td>
            <td>Rp {{ number_format($item->harga_per_hari, 0, ',', '.') }}</td>
            <td>{{ $item->stok }}</td>
            <td>
              @if ($item->status == 'tersedia')
                <span class="badge bg-label-success me-1">Tersedia</span>
              @else
                <span class="badge bg-label-danger me-1">Tidak tersedia</span>
              @endif
            </td>
            <td>
               <a href="{{ route('admin.layanan.edit', $item->layanan_id) }}" class="btn btn-info btn-sm">
                <i class="icon-base bx bx-edit-alt me-1"></i> Edit
                </a>
                <form action="{{ route('admin.layanan.destroy', $item->layanan_id) }}" method="POST"
        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
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
            <td colspan="7" class="text-center text-body-secondary py-4">Belum ada data layanan.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
