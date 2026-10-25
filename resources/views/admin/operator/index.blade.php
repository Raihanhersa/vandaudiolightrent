@extends('layouts.admin.app')
@section('title', 'Kelola Operator')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Daftar operator</h5>
    <a href="{{ route('admin.operator.create') }}" class="btn btn-primary">
      <i class="icon-base bx bx-plus me-1"></i> Tambah operator
    </a>
  </div>

  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama operator</th>
          <th>Email</th>
          <th>No. telepon</th>
          <th>Spesialisasi</th>
          <th>Tgl bergabung</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($dataOperator as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_operator }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->no_telepon }}</td>
            <td>{{ $item->spesialisasi }}</td>
            <td>{{ $item->tanggal_bergabung ? date('d M Y', strtotime($item->tanggal_bergabung)) : '-' }}</td>
            <td>
              @if ($item->status == 'aktif')
                <span class="badge bg-label-success me-1">Aktif</span>
              @else
                <span class="badge bg-label-danger me-1">Nonaktif</span>
              @endif
            </td>
            <td>
              <a href="{{ route('admin.operator.edit', $item->operator_id) }}" class="btn btn-info btn-sm me-1">
                <i class="icon-base bx bx-edit-alt me-1"></i> Edit
              </a>

              <form action="{{ route('admin.operator.destroy', $item->operator_id) }}" method="POST"
                    class="d-inline" onsubmit="return confirm('Yakin ingin menghapus operator ini?')">
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
            <td colspan="8" class="text-center text-body-secondary py-4">Belum ada data operator.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
