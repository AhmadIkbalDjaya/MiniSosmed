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
                    @if ($posts->count())
                        
                        @foreach ($posts as $post)
                        <div class="p-3 bg-white rounded-3 mb-5 shadow-sm">
                            <div class="headerPost d-flex justify-content-between">
                                <div class="d-flex gap-3">
                                    <a href="/profile/{{ $post->user->username }}" class="">
                                        <img src="https://source.unsplash.com/32x32" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0 mt-2 img-fluid">
                                    </a>
                                    <div class="d-flex flex-column">
                                        <a href="" class="text-decoration-none text-dark">
                                            <small><b>{{ $post->user->name }}</b></small>
                                        </a>
                                        <small class="text-black-50">{{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="mainPost mt-3">
                                <p>{{ $post->body }}</p>
                            </div>
                            <div class="footerPost mt-3">
                                <hr>
                                <div class="lcs d-flex justify-content-between px-4">
                                    <p><i class="bi bi-hand-thumbs-up"></i> Like</p>
                                    <p><i class="bi bi-chat-square"></i> Comment</p>
                                    <p>Share</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <h4 class="text-center">No Post Found</h4>
                    @endif
                </div>
            </main>
            
        </div>
    </main>
</section>
@endsection