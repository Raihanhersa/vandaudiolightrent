@extends('layouts.admin')
@section('title', 'Kelola Layanan')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Daftar layanan</h5>
    <a href="{{ route('admin.layanan.create') }}" class="btn btn-primary">
      <i class="icon-base bx bx-plus me-1"></i> Tambah layanan
    </a>
  </div>
  <div class="card-body">
    
  </div>
</div>
@endsection
