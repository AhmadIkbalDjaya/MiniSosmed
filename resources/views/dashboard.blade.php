@extends('layouts.main')
@section('header')
    @include('partials.header')
@endsection
@section('main')
<main class="container-lg mt-5 pt-5">
    <div class="row align-items-md-stretch justify-content-md-center">
        <main class="col-lg-7 main">
            <div class="h-100 p-0 rounded-3">
                <div class="p-3 bg-white rounded-3 mb-3 shadow-sm d-flex justify-content-between gap-2">
                    <a href="/profile/{{ auth()->user()->username }}">
                        <img src="{{ asset('storage/' . auth()->user()->biodata->profile_image) }}" alt="twbs" width="35" height="35" class="rounded-circle flex-shrink-0 mt-1">
                    </a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-light w-100 fs-6 text-start rounded-pill text-black-50" data-bs-toggle="modal" data-bs-target="#postModal">
                        Apa yang anda pikirkan, {{ auth()->user()->name }}?
                    </button>
                </div>
                <div id="readPost">

                </div>
            </div>
        </main>
        <aside class="col-md-4" id="sidebar">
            <div class="bg-transparent rounded-3 mb-3">
                <h6 class="text-black-50">Mungkin Anda Mengenal</h6>
                <div class="list-group" id="saranTeman">
                    {{-- @foreach ($users->slice(0, 8)  as $user)
                        <div class="list-group-item list-group-item-action d-flex gap-3 py-2 bg-transparent border-0 px-lg-0 m-0">
                            <a href="/profile/{{ $user->username }}">
                                <img src="{{ asset('storage/' . $user->biodata->profile_image) }}" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0 mt-1">
                            </a>
                            <div class="d-flex gap-1 w-100 justify-content-between mt-1">
                                <div>
                                    <a href="/profile/{{ $user->username }}" class="text-decoration-none text-dark">
                                        <h6 class="mb-0">{{ $user->name}}</h6>
                                    </a>
                                </div>
                                <form action="/follow/{{ $user->username }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary py-0">
                                        @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                                            Unfollow
                                        @else
                                            Follow
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>
            <div class="about rounded-3 mb-3 d-flex justify-content-between w-100 small">
                @include('partials.about')
            </div>
        </aside>
    </div>
</main>
@include('partials.modals.postModal')
@endsection