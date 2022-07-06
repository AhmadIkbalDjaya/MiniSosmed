@extends('layouts.main')
@section('header')
    @include('partials.header')
@endsection
@section('main')
<div class="container">
    <div class="headerProfile row justify-content-center mt-0 ">
        @include('profile.headerProfile')
    </div>
    <div class="row mt-5 justify-content-center mb-5">
        <div class="col-md-10 row align-items-md-stretch justify-content-md-center px-0">
            <div class="col-md-6 followerList">
                <div class="bg-white shadow-sm rounded-3 p-3 mb-3">
                    <h3>Pengikut {{ $user->followers->count() }}</h3>
                    <div class="list mt-3">
                        @if ($user->followers->count())
                            @foreach ($user->followers()->get() as $f)
                            <div class="col-md-12 d-flex gap-3 mb-3">
                                <a href="/profile/{{ $f->username }}">
                                    <img src="{{ asset('storage/' . $f->biodata->profile_image) }}" alt="" class="rounded-circle" width="60" height="60">
                                </a>
                                <div class="mt-1">
                                    <a href="/profile/{{ $f->username }}" class="text-decoration-none text-dark">
                                        <h6 class="mb-0">{{ $f->name }}</h6>
                                    </a>
                                    <small>{{ $f->followers()->count() }} Pengikut</small>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <h5 class="text-center">Anda Belum Punya Pengikut</h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6 followingList">
                <div class="bg-white shadow-sm rounded-3 p-3 mb-3">
                    <h3>Mengikuti {{ $user->follows->count() }}</h3>
                    <div class="list mt-3">
                        @if ($user->follows->count())
                            @foreach ($user->follows()->get() as $f)
                            <div class="col-md-12 d-flex gap-3 mb-3">
                                <a href="/profile/{{ $f->username }}">
                                    <img src="{{ asset('storage/' . $f->biodata->profile_image) }}" alt="" class="rounded-circle" width="60" height="60">
                                </a>
                                <div class="mt-1">
                                    <a href="/profile/{{ $f->username }}" class="text-decoration-none text-dark">
                                        <h6 class="mb-0">{{ $f->name }}</h6>
                                    </a>
                                    <small>{{ $f->followers()->count() }} Pengikut</small>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <h5 class="text-center">Anda Belum Punya Pengikut</h5>
                        @endif
                    </div>
                </div>
            </div>
            

        </div>
    </div>
</div>
@include('partials.modals.imageModal')
@endsection