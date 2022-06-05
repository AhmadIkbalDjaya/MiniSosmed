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
                    <a class="nav-link {{ ($active === "dashboard") ? 'active' : '' }}" href="/"><i class="bi bi-house-fill"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "profile") ? 'active' : '' }}" href="/profile/{{ auth()->user()->username }}"><i class="bi bi-person-fill"></i> Profile</a>
                </li>
            @auth
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link bg-transparent border-0"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
            @endauth
            </ul>
            
        </div>
    </div>
</nav>