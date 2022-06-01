<link rel="stylesheet" href="css/dashboard.css">
@extends('layouts.main')

@section('main')
<main class="mt-5 container-lg">
    <div class="row align-items-md-stretch justify-content-md-center">
        <main class="col-md-8 main">
            <div class="h-100 p-0 rounded-3">
                {{-- <h2>Change the background</h2> --}}
                <div class="p-3 bg-white rounded-3 mb-5 shadow-sm">
                    <div class="headerPost d-flex justify-content-between">
                        <div class="d-flex gap-3">
                            <a href="profile" class="">
                                <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0 mt-2">
                            </a>
                            <div class="d-flex flex-column">
                                <a href="" class="text-decoration-none">
                                    <small><b>Ahmad Ikbal Djaya</b></small>
                                </a>
                                <small>31 Mei 2022</small>
                            </div>
                        </div>
                    </div>
                    <div class="mainPost mt-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab obcaecati deleniti quas, itaque earum corrupti fugit ducimus ullam atque soluta, ipsum illum doloremque quae blanditiis corporis, voluptatibus voluptatem amet deserunt. Alias maiores quae cumque ut labore impedit blanditiis, vero repellat provident natus suscipit dolores tempora porro fugiat laudantium dolorum quisquam necessitatibus accusamus ratione doloribus. Eaque explicabo eius sit mollitia beatae neque suscipit. Error odio pariatur ullam facilis, corrupti doloribus aut soluta cupiditate molestiae quos maiores omnis incidunt, minus esse aperiam optio delectus reiciendis ab? Necessitatibus doloribus, facilis quaerat ratione, reiciendis dignissimos atque accusantium voluptatum qui, perspiciatis iste? Laborum, mollitia eius.</p>
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
            </div>
        </main>
        <aside class="col-md-4 sidebar">
            <div class="h-100 bg-transparent rounded-3">
                <h6>Mungkin Anda Mengenal</h6>
                <div class="list-group">
                    <div class="list-group-item list-group-item-action d-flex gap-3 py-2 bg-transparent border-0 px-lg-0 m-0">
                        <a href="profile">
                            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0 mt-1">
                        </a>
                        <div class="d-flex gap-1 w-100 justify-content-between">
                            <div>
                                <a href="profile" class="text-decoration-none">
                                    <h6 class="mb-0">Andi Ahmad Zulkifli Basma</h6>
                                </a>
                            </div>
                            <a href="Ikuti">
                                <button type="button" class="btn btn-primary py-0">Ikuti</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</main>
@endsection