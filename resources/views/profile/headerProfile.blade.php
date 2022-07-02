<div class="col-md-10 px-0 mt-5 pt-2">
    <div class="coverImgCon">
        <img src="{{ asset('storage/' . $bio->cover_image) }}" id="coverImage" alt="Sampul Mark" class="coverImg w-100">
    </div>
</div>
<div class="col-md-10 border-b shadow-sm bg-white rounded-bottom text-center">
    <div class="row px-0 py-2">
        <div class="col-md-2">
            <img src="{{ asset('storage/' . $bio->profile_image) }}" width="100" height="100" alt="twbs" class="rounded-circle flex-shrink-0 profileImg">
        </div>
        <div class="col-md-8">
            <h3 class="">{{ $user->name }}</h6>
            <h6 class="d-flex justify-content-around mx-5">
                <a href="/profile/followList/{{ $user->username }}" class="text-decoration-none text-dark">
                    <span class="border py-1 px-2 rounded-3">
                        {{ $user->followers->count() }} Pengikut
                    </span>
                </a>
                <a href="/profile/followList/{{ $user->username }}" class="text-decoration-none text-dark">
                    <span class="border py-1 px-2 rounded-3">
                        {{ $user->follows->count() }} Diikuti
                    </span>
                </a>
            </h6>
        </div>
        <div class="col-md-2">
            @if (Auth::user()->isNot($user))
                <form action="/follow/{{ $user->username }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary py-0">
                        @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                            Unfollow
                        @else
                            Follow
                        @endif
                    </button>
                </form>
            @elseif(Auth::user()->is($user))
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#imageModal">
                Edit Image
            </button>
            @endif
        </div>
    </div>
</div>