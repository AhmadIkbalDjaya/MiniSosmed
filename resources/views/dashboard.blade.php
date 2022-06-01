<link rel="stylesheet" href="css/dashboard.css">
@extends('layouts.main')

@section('main')
<main class="mt-5 container-lg">
    <div class="row align-items-md-stretch justify-content-md-center">
        <main class="col-md-8 main">
            <div class="h-100 p-0 rounded-3">
                @foreach ($posts as $post)
                    <div class="p-3 bg-white rounded-3 mb-5 shadow-sm">
                        <div class="headerPost d-flex justify-content-between">
                            <div class="d-flex gap-3">
                                <a href="/profile/{{ $post->user->username }}" class="">
                                    <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0 mt-2">
                                </a>
                                <div class="d-flex flex-column">
                                    <a href="/profile/{{ $post->user->username }}" class="text-decoration-none">
                                        <small><b>{{ $post->user->username }}</b></small>
                                    </a>
                                    <small>{{ $post->updated_at }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="mainPost mt-3">
                            <p>{{ $post->body }}</p>
                        </div>
                        <div class="footerPost mt-3">
                            <hr>
                            <div class="lcs d-flex justify-content-between px-4">
                                <p>Like</p>
                                <p>Comment</p>
                                <p>Share</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
        <aside class="col-md-4 sidebar">
            <div class="h-100 bg-transparent rounded-3">
                <h6>Mungkin Anda Mengenal</h6>
                <div class="list-group">
                    @foreach ($users as $user)
                        <div class="list-group-item list-group-item-action d-flex gap-3 py-2 bg-transparent border-0 px-lg-0 m-0">
                            <a href="/profile/{{ $user->username }}">
                                <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0 mt-1">
                            </a>
                            <div class="d-flex gap-1 w-100 justify-content-between mt-1">
                                <div>
                                    <a href="/profile/{{ $user->username }}" class="text-decoration-none">
                                        <h6 class="mb-0">{{ $user->username }}</h6>
                                    </a>
                                </div>
                                <a href="Ikuti">
                                    <button type="button" class="btn btn-primary py-0">Ikuti</button>
                                </a>
                            </div>
                        </div>
                        
                    @endforeach

                </div>
            </div>
        </aside>
    </div>
</main>
@endsection