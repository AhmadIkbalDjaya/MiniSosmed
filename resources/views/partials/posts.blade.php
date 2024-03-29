@foreach ($posts as $post)
    <div class="bg-white rounded-3 mb-3 shadow-sm">
        <div class="px-3 pt-3 headerPost d-flex justify-content-between">
            <div class="d-flex gap-3">
                <a href="/profile/{{ $post->user->username }}" class="">
                    <img src="{{ asset('storage/' . $post->user->biodata->profile_image) }}" alt="twbs" width="35" height="35" class="rounded-circle flex-shrink-0 mt-2">
                </a>
                <div class="d-flex flex-column">
                    <a href="/profile/{{ $post->user->username }}" class="text-decoration-none text-dark">
                        <small><b>{{ $post->user->name }}</b></small>
                    </a>
                    <small class="text-black-50">{{ $post->created_at->diffForHumans() }}</small>
                </div>
            </div>
            @if ($post->user->id == auth()->user()->id)
            <div class="dropdown">
                <button class="border-0 rounded-circle fw-bold bg-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    ...
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal{{ $post->id }}">
                            <i class="fa-solid fa-pencil"></i> Edit Postingan
                        </button>
                    </li>
                    <li>
                        <form action="/post/{{ $post->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="dropdown-item text-danger" onclick="return confirm('Are you sure?')"><i class="fa-regular fa-trash-can"></i> Hapus Postingan</button>
                        </form>
                    </li>
                </ul>
            </div>
            @endif
        </div>
        <div class="px-3 mainPost mt-3">
            <p>{!! $post->body !!}</p>
        </div>
        @if ($post->image)
            <div class="imagePost d-flex justify-content-center">
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid w-100 border-top" alt="{{ $post->user->name }} Post Image">
            </div>
        @endif
        <div class="footerPost mt-0 border-top py-1">
            <div class="lcs d-flex justify-content-around px-4">
                    <button class="bg-transparent border-0 p-0" type="button" id="tombolLike" onclick="like({{ $post->id }})">
                        @if (!Auth::user()->hasLike($post->id))
                            <i class="fa-regular fa-thumbs-up"></i>
                        @elseif(Auth::user()->hasLike($post->id))
                            <i class="fa-solid fa-thumbs-up"></i>
                        @endif
                        {{ $post->like->count() }}  Like
                    </button>
                <button class="bg-transparent border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#commentPost{{ $post->id }}" aria-expanded="false" aria-controls="commentPost{{ $post->id }}">
                    <i class="fa-regular fa-message"></i> {{ $post->comment->count() }} Comment
                </button>
            </div>
        </div>
        {{-- Comment --}}
        @include('partials.comment')
    </div>
    @include('partials.modals.editPostModal')
@endforeach
