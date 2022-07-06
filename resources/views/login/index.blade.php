@extends('layouts.main')

@section('main')
<div class="row justify-content-center bg-light w-100 mx-0 min-vh-100 align-content-center">
    <div class="col-md-4 bg-white rounded-4 shadow py-3 px-3">    

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <form action='/login' method="POST">
                @csrf
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror rounded-4" id="email" placeholder="Email" value="{{ old('email') }}" autofocus required>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <input type="password" name="password" class="form-control rounded-4 mt-3" id="password" placeholder="Password" required>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="text-center d-block mt-3">Belum Registrasi? <a href="/register" class="text-decoration-none">Registrasi Sekarang!</a></small>
        </main>
    </div>
</div>
@endsection