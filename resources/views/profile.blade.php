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
                    <h6>999999 Pengikut</h6>
                </div>
                <div class="col-md-2">
                    <a href="Ikuti">
                        <button type="button" class="btn btn-primary py-0">Ikuti</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <main class="mt-5 row justify-content-center">
        <div class="col-md-10 row align-items-md-stretch justify-content-md-center px-0">
            <aside class="col-lg-5 sidebar mb-5">
                <div class="bg-white p-3 shadow-sm rounded-3">
                    <h4>Biodata</h4>
                    <div class="list-group">
                        <div class="list-group-item list-group-item-action d-flex gap-3 py-2 bg-transparent border-0 px-lg-0 m-0">
                            <div class="d-flex gap-1 w-100 justify-content-between">
                                <div>
                                    <table class="table-borderless">
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
                                    </table>
                                </div>
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
                                <img src="https://source.unsplash.com/100x100" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0 mt-1">
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
{{-- modal upload post --}}
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Postingan</h5>
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
                    <form>
                        <input id="body" type="hidden" name="body">
                        <trix-editor input="body"></trix-editor>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Posting</button>
            </div>
        </div>
    </div>
</div>
@endsection