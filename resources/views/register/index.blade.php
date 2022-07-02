@extends('layouts.main')

@section('main')
<div class="row justify-content-center bg-light w-100 mx-0 min-vh-100 align-content-center">
    <div class="col-md-4 bg-white rounded-4 shadow py-3 px-3">
        <h1 class="h3 mb-3 fw-normal">Registrasi</h1>
        <form action="/register" method="post">
            @csrf
            <input type="text" name="name" class="form-control rounded-4 mt-3 @error('name') is-invalid @enderror" id="name" placeholder="Nama" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <input type="email" name="email" class="form-control rounded-4 mt-3 @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <input type="password" name="password" class="form-control rounded-4 mt-3 @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Registrasi</button>
        </form>
        <small class="text-center d-block mt-3">Sudah Punya Akun? <a href="/login" class="text-decoration-none">Login Sekarang</a></small>
    </div>
</div>
@endsection