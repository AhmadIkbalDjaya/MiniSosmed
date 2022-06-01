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
                    <a href="profile">
                        <img src="https://github.com/twbs.png" alt="twbs" width="100" height="100" class="rounded-circle flex-shrink-0 mt-1 profileImg">
                    </a>
                    <div class="d-flex gap-1 w-100 justify-content-between mt-4">
                        <div>
                            <a href="profile" class="text-decoration-none">
                                <h3 class="">Andi Ikbal Djaya</h6>
                                <h6>9999999999999999 Pengikut</h6>
                            </a>
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
                                    <p>Nama Lengkap: Ahmad Ikbal Djaya</p>
                                    <p>Panggilan: Ikbal</p>
                                    <p>Asal: Pangkep</p>
                                    <p>Jenis Kelamin: Laki-Laki</p>
                                    <p>Agama: Islam</p>
                                    <p>Asal Sekolah: SMAN 11 Pangkep</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <main class="col-md-7 main">
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
            
        </div>
    </main>
</section>
@endsection