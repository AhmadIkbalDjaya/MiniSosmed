@extends('layouts.main')
@section('header')
    @include('partials.header')
@endsection
@section('main')
<section class="container">
    <div class="row justify-content-center headerProfile mt-0 ">
        <div class="coverImgCon col-md-10 px-0">
            <img src="https://source.unsplash.com/1200x400" alt="Sampul Mark" class="coverImg rounded-top img-fluid mt-5 pt-2">
        </div>
        <div class="col-md-10 border-b shadow-sm bg-white rounded-bottom text-center">
            <div class="row px-0 py-2">
                <div class="col-md-2">
                    <img src="https://source.unsplash.com/100x100" alt="twbs" class="rounded-circle flex-shrink-0 mt-1 profileImg img-fluid">
                </div>
                <div class="col-md-8">
                    <h3 class="">{{ $user->name }}</h6>
                    <h6 class="d-flex justify-content-around mx-5">
                        <span class="border py-1 px-2 rounded-3">
                            {{ $user->followers->count() }} Pengikut
                        </span>
                        <span class="border py-1 px-2 rounded-3">
                            {{ $user->follows->count() }} Diikuti
                        </span>
                    </h6>
                </div>
                <div class="col-md-2">
                    @if (Auth::user()->isNot($user))
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
                    {{-- @else
                        <button class="btn btn-primary">Edit Profile</button> --}}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <main class="mt-5 row justify-content-center">
        <div class="col-md-10 row align-items-md-stretch justify-content-md-center px-0">
            <aside class="col-lg-5 sidebar mb-5">
                <div class="bg-white p-3 shadow-sm rounded-3 mb-3">
                    <h5 class="card-title">Biodata</h5>
                    <div class="list-group">
                        <div class="list-group-item list-group-item-action d-flex gap-3 py-2 bg-transparent border-0 px-lg-0 m-0">
                            <div class="d-flex gap-1 w-100 justify-content-between">
                                <div class="w-100">
                                    <table class="table-borderless table">
                                        <tr>
                                            <td>Name</td>
                                            <td>:</td>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Birthday</td>
                                            <td>:</td>
                                            <td>
                                                @if (!empty($bio->birthday))
                                                    {{ $bio->birthday }}
                                                @else
                                                    Data Belum Ditambahkan
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Genre</td>
                                            <td>:</td>
                                            <td>
                                                @if (!empty($bio->genre))
                                                    {{ $bio->genre }}
                                                @else
                                                    Data Belum Ditambahkan
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>:</td>
                                            <td>
                                                @if (!empty($bio->address))
                                                    {{ $bio->address }}
                                                @else
                                                    Data Belum Ditambahkan
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                    @if ($user->username == auth()->user()->username)
                                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#bioModal">
                                        Edit Biodata
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-3 shadow-sm rounded-3 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-title">Pengikut</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $user->followers->count() }} Pengikut</h6>
                        </div>
                        <div class="col-12">
                            <div class="row gap-y">
                                @if ($user->followers->count())
                                    @foreach ($user->followers()->limit(6)->get() as $f)
                                    <div class="col-4 mb-2">
                                        <div class="card border-0">
                                            <a href="/profile/{{ $f->username }}">
                                                <img src="https://source.unsplash.com/100x100" class="card-img-top rounded-3" alt="...">
                                            </a>
                                            <div class="card-body p-0">
                                                <a href="/profile/{{ $f->username }}" class="text-dark text-decoration-none">
                                                    <p class="fs-6 mb-0 fw-bolder">{{ $f->name }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <h6 class="text-center text-black-50">Tidak Mempunyai Pengikut</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-3 shadow-sm rounded-3 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-title">Mengikuti</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $user->follows->count() }} Diikuti</h6>
                        </div>
                        <div class="col-12">
                            <div class="row gap-y">
                                @if ($user->follows->count())
                                    @foreach ($user->follows()->limit(6)->get() as $f)
                                    <div class="col-4 mb-2">
                                        <div class="card border-0">
                                            <a href="/profile/{{ $f->username }}">
                                                <img src="https://source.unsplash.com/100x100" class="card-img-top rounded-3" alt="...">
                                            </a>
                                            <div class="card-body p-0">
                                                <a href="/profile/{{ $f->username }}" class="text-dark text-decoration-none">
                                                    <p class="fs-6 mb-0 fw-bolder">{{ $f->name }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <h6 class="text-center text-black-50">Tidak Mengikuti Siapapun</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <main class="col-lg-7 main">
                <div class="h-100 p-0 rounded-3">
                    @if ($user->username == auth()->user()->username)
                        <div class="p-3 bg-white rounded-3 mb-3 shadow-sm d-flex justify-content-between gap-2">
                            <a href="/profile/{{ auth()->user()->username }}">
                                <img src="https://source.unsplash.com/100x100" alt="twbs" width="35" height="35" class="rounded-circle flex-shrink-0 mt-1">
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-light w-100 fs-6 text-start rounded-pill text-black-50" data-bs-toggle="modal" data-bs-target="#postModal">
                                Apa yang anda pikirkan, {{ auth()->user()->name }}?
                            </button>
                        </div>
                    @endif
                    @if ($posts->count())
                        @foreach ($posts as $post)
                            @include('partials.posts')
                        @endforeach
                    @else
                        <h4 class="text-center">No Post Found</h4>
                    @endif
                </div>
            </main>
        </div>
    </main>
</section>
{{-- Biodata Modal --}}
<div class="modal fade" id="bioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Biodata</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="col-12 d-flex">
                    <a href="/profile/{{ auth()->user()->username }}">
                        <img src="https://source.unsplash.com/100x100" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0 mt-1 img-fluid">
                    </a>
                    <div class="w-100 justify-content-between mt-1 ms-2">
                        <div>
                            <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <form action="/profile/bio" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" name="birthday" class="form-control" id="birthday" value="{{ auth()->user()->biodata->birthday }}">
                        </div>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="genre">
                                @if (auth()->user()->biodata->genre == 'Laki-Laki')
                                    <option value="Laki-Laki" selected>Laki-Laki</option>
                                    <option value="Perempuan">Perempuan<option>
                                @else
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan" selected>Perempuan<option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ auth()->user()->biodata->address }}">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Posting</button>
            </form>
            </div>
        </div>
    </div>
</div>
@include('partials.postModal')
@endsection