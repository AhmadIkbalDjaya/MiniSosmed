@extends('layouts.main')
@section('header')
    @include('partials.header')
@endsection
@section('main')
<main class="container-lg mt-5 pt-5">
    <div class="row align-items-md-stretch justify-content-center">
        @if ($users->count())
            @foreach ($users as $user)
                <main class="col-md-8 row bg-white p-3 rounded-3 shadow mb-3 justify-content-center">
                    <div class="col-md-12 d-flex gap-3">
                        <div>
                            <img src="https://source.unsplash.com/60x60" alt="" class="rounded-circle img-fluid" width="60" height="60">
                        </div>
                        <div class="mt-1">
                            <a href="/profile/{{ $user->username }}" class="text-decoration-none text-dark">
                                <h5 class="mb-0">{{ $user->name }}</h5>
                            </a>
                            <small>999 Pengikut</small>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <button class="btn btn-primary w-100">Ikuti</button>
                    </div>
                </main>
            @endforeach
        @else
            <h4 class="text-center">No User Found</h4>
        @endif
    </div>
</main>
@endsection