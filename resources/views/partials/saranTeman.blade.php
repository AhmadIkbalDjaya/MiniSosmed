
@foreach ($users->slice(0, 8)  as $user)
    <div class="list-group-item list-group-item-action d-flex gap-3 py-2 bg-transparent border-0 px-lg-0 m-0">
        <a href="/profile/{{ $user->username }}">
            <img src="{{ asset('storage/' . $user->biodata->profile_image) }}" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0 mt-1">
        </a>
        <div class="d-flex gap-1 w-100 justify-content-between mt-1">
            <div>
                <a href="/profile/{{ $user->username }}" class="text-decoration-none text-dark">
                    <h6 class="mb-0">{{ $user->name}}</h6>
                </a>
            </div>
            {{-- <form action="/follow/{{ $user->username }}" method="post">
                @csrf --}}
                <button type="button" class="btn btn-primary py-0" onclick="followDashboard({{ $user->id }})">
                    @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                        Unfollow
                    @else
                        Follow
                    @endif
                </button>
            {{-- </form> --}}
        </div>
    </div>
@endforeach