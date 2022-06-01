<link rel="stylesheet" href="css/profile.css">
@extends('layouts.main')

@section('main')
<section>
    
    <div class="pt-3 row justify-content-center headerProfile">
        <div class="coverImgCon col-md-10">
            <img src="img/cover/sampulMark.jpg" alt="Sampul Mark" class="coverImg rounded-top">
        </div>
        <div class="col-md-10">
            <div class="list-group bg-white shadow-sm">
                <div class="list-group-item list-group-item-action d-flex gap-3 py-2 bg-transparent border-0">
                    <img src="https://github.com/twbs.png" alt="twbs" width="100" height="100" class="rounded-circle flex-shrink-0 mt-1 profileImg">
                    <div class="d-flex gap-1 w-100 justify-content-between mt-4">
                        <div>
                            <h3 class="">{{ $user->username }}</h6>
                            <h6>9999999999999999 Pengikut</h6>
                        </div>
                        <a href="Ikuti">
                            <button type="button" class="btn btn-primary py-0">Ikuti</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="mt-5 row justify-content-center">
        <div class="col-md-10 row align-items-md-stretch justify-content-md-center">
            <aside class="col-md-5 sidebar mb-5">
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
                                            <td>{{ $bio->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Birthday</td>
                                            <td>:</td>
                                            <td>{{ $bio->birthday }}</td>
                                        </tr>
                                        <tr>
                                            <td>Genre</td>
                                            <td>:</td>
                                            <td>{{ $bio->genre }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <main class="col-md-7 main">
                <div class="h-100 p-0 rounded-3">
                    @foreach ($posts as $post)
                    <div class="p-3 bg-white rounded-3 mb-5 shadow-sm">
                        <div class="headerPost d-flex justify-content-between">
                            <div class="d-flex gap-3">
                                <a href="/profile/{{ $post->user->username }}" class="">
                                    <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0 mt-2">
                                </a>
                                <div class="d-flex flex-column">
                                    <a href="" class="text-decoration-none">
                                        <small><b>{{ $post->user->username }}</b></small>
                                    </a>
                                    <small>{{ $post->created_at }}</small>
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
            
        </div>
    </main>
</section>
@endsection