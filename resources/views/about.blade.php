@extends('layouts.main')
@section('header')
    @include('partials.header')
@endsection
@section('main')
<main class="container-lg mt-5 pt-5">
    <div class="row align-items-md-stretch justify-content-center">
        <div class="col-md-8">
            <div class="bg-white shadow p-3 rounded-4">
                <h1>About Minsos</h1>
                <p>Minsos adalah singkatan dari Mini Sosmed. Minsos dibuat sebagai final projec dari mata kuliah pemrograman web2.</p>
                <hr>
                <div class="dibuatMenggunakan w-100">
                    <h4>Dibuat menggunakan</h4>
                    <div class="d-flex w-100 gy-3 justify-content-between flex-wrap">
                        <div class="col-md-4 mb-2">
                            <a href="https://www.w3schools.com/html/" target="_blank" class="hoverEffect border px-2 text-dark text-decoration-none rounded-1">
                                <i class="fa-brands fa-html5"></i> Html
                            </a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="https://www.w3schools.com/Css/" target="_blank" class="hoverEffect border px-2 text-dark text-decoration-none rounded-1">
                                <i class="fa-brands fa-css3-alt"></i> Css
                            </a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="https://www.w3schools.com/js/DEFAULT.asp" target="_blank" class="hoverEffect border px-2 text-dark text-decoration-none rounded-1">
                                <i class="fa-brands fa-js-square"></i> Javascript
                            </a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="https://getbootstrap.com/" target="_blank" class="hoverEffect border px-2 text-dark text-decoration-none rounded-1">
                                <i class="fa-brands fa-bootstrap"></i> Bootstrap
                            </a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="https://jquery.com/" target="_blank" class="hoverEffect border px-2 text-dark text-decoration-none rounded-1">
                                <i class="fa-brands fa-js-square"></i> Jquery
                            </a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="https://laravel.com/" target="_blank" class="hoverEffect border px-2 text-dark text-decoration-none rounded-1">
                                <i class="fa-brands fa-laravel"></i> Laravel
                            </a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <a href="https://fontawesome.com/" target="_blank" class="hoverEffect border px-2 text-dark text-decoration-none rounded-1">
                                <i class="fa-solid fa-font-awesome"></i> Font Awesome
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="contact">
                    <h4>Contact</h4>
                    <div class="px-2 text-dark text-decoration-none rounded-2 fs-6">
                        <i class="fa-solid fa-envelope"></i> minsos@gmail.com
                    </div>
                    <h6>Developer</h6>
                    <div class="px-2 text-dark text-decoration-none rounded-2 fs-6">
                        <i class="fa-solid fa-envelope"></i> ikbaldjaya@gmail.com
                    </div>
                </div>
                <hr>
                <div class="copyDanGit d-flex justify-content-between">
                    <span class="copyright small">
                        &copy; Ahmad Ikbal Djaya 2022
                    </span>
                    <div class="contact">
                        <a href="https://github.com/AhmadIkbalDjaya/MiniSosmed" target="_blank" class="px-2 text-dark text-decoration-none rounded-2 fs-6">
                            <i class="fa-brands fa-github"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection