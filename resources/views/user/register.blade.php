@extends('layouts.user.app')
@section('title', 'Register')

@section('content')
<div class="untree_co-section">
  <div class="container">
    <div class="col-md-5 mx-auto border rounded p-4 bg-white">
      <h2 class="h3 mb-4 text-black text-center">Register</h2>

      <form onsubmit="return false;">
    @csrf

        <div class="form-group mb-3">
          <label class="text-black" for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group mb-3">
          <label class="text-black" for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group mb-3">
          <label class="text-black" for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group mb-4">
          <label class="text-black" for="password_confirmation">Confirm Password</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary w-100">Register</button>
      </form>

      <p class="text-center mt-3 mb-0">Sudah punya akun?
        <a href="{{ route('login') }}">Login</a>
      </p>
    </div>
  </div>
</div>
@endsection