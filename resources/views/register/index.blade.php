@extends('layouts.main')

@section('main')
<div class="row justify-content-center mt-5">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registrasion Form</h1>
            <form>
                <div class="form-floating">
                    <input type="text" class="form-control rounded-top" id="name" placeholder="Name">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="username" placeholder="username">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Registed</button>
            </form>
            <small class="text-center d-block mt-3">Allready Registed? <a href="/login">Login</a></small>
        </main>
    </div>
</div>
@endsection