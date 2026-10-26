@extends('layouts.user.app')
@section('title', 'Login')

@section('content')
<div class="untree_co-section">
  <div class="container">
    <div class="col-md-5 mx-auto border rounded p-4 bg-white">
      <h2 class="h3 mb-4 text-black text-center">Login</h2>

      @if (session('error'))
        <div class="alert alert-danger" role="alert">
          {{ session('error') }}
        </div>
      @endif

      <form action="{{ route('login.proses') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
          <label class="text-black" for="username">Username</label>
          <input type="text" id="username" name="username"
                 class="form-control @error('username') is-invalid @enderror"
                 value="{{ old('username') }}">
          @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group mb-4">
          <label class="text-black" for="password">Password</label>
          <input type="password" id="password" name="password"
                 class="form-control @error('password') is-invalid @enderror">
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>

      <p class="text-center mt-3 mb-0">Belum punya akun?
        <a href="{{ route('register') }}">Register</a>
      </p>
    </div>
  </div>
</div>
@endsection