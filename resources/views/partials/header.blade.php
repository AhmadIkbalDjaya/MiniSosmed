<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Minsos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "dashboard") ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "profile") ? 'active' : '' }}" href="/profile/ahmad-ikbal-djaya">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "login") ? 'active' : '' }}" href="/login">Login</a>
                </li>
            </ul>
            <form class="d-flex" action="/search">
                <input class="form-control me-2" type="search" placeholder="Search User" name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>