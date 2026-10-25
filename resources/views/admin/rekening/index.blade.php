
@extends('layouts.admin.app')
@section('title', 'Kelola Rekening')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar rekening</h5>
        <a href="{{ route('admin.rekening.create') }}" class="btn btn-primary">
            <i class="icon-base bx bx-plus me-1"></i> Tambah rekening
        </a>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bank</th>
                    <th>Nomor rekening</th>
                    <th>Atas nama</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody class="table-border-bottom-0">
                @forelse ($dataRekening as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_bank }}</td>
                        <td>{{ $item->nomor_rekening }}</td>
                        <td>{{ $item->atas_nama }}</td>
                        <td>
                            @if ($item->status == 'aktif')
                                <span class="badge bg-label-success me-1">Aktif</span>
                            @else
                                <span class="badge bg-label-danger me-1">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.rekening.edit', $item->rekening_id) }}"
                               class="btn btn-info btn-sm me-1">
                                <i class="icon-base bx bx-edit-alt me-1"></i> Edit
                            </a>

                            <form action="{{ route('admin.rekening.destroy', $item->rekening_id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus rekening ini?')">
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
                        <td colspan="6" class="text-center text-body-secondary py-4">
                            Belum ada data rekening.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

