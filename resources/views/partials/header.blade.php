<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Minsos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between m" id="navbarSupportedContent">
            <form class="d-flex" action="/search">
                <input class="form-control me-2" type="search" placeholder="Search User" name="search" value="{{ request('search') }}" required>
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home <i class="bi bi-house-fill"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('profile/' . auth()->user()->username) ? 'active' : '' }} 
                        {{ Request::is('profile/followList/' . auth()->user()->username) ? 'active' : '' }}" href="/profile/{{ auth()->user()->username }}">Profile <i class="bi bi-person-fill"></i></a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link bg-transparent border-0">Logout <i class="bi bi-box-arrow-right"></i></button>
                    </form>
                </li>
            </ul>
            
        </div>
    </div>
</nav>