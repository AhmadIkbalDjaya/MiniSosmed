<div class="collapse commentPost p-3 border-top" id="commentPost{{ $post->id }}">
    @foreach ($post->comment as $comment)
    <div class="comments d-flex justify-between gap-2 mt-2">
        <a href="" class="">
            <img src="https://source.unsplash.com/32x32" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
        </a>
        <small class="">
            <div class="bg-light p-1 rounded-3">
                <a href="" class="text-dark text-decoration-none ">
                    <b>{{ $comment->user->name }}</b>
                </a>
                <div>
                    {{ $comment->body }}
                </div> 
            </div>
            <sup class="text-black-50">{{ $comment->created_at->diffForHumans() }}</sup>
        </small>
        @if ($comment->user->id == auth()->user()->id)
        <div class="dropdown">
            <button class="border-0 rounded-circle fw-bold bg-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                ...
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                {{-- <li>
                    <button class="dropdown-item">
                        Edit
                    </button>
                </li> --}}
                <li>
                    <button class="dropdown-item text-danger" onclick="commentDelete({{ $comment->id }})">Hapus</button>
                </li>
            </ul>
        </div>
        @else
        <div class="dropdown">
            <button class="border-0 rounded-circle fw-bold bg-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                ...
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li class="dropdown-item">
                    Pilihan Belum Tersedia
                </li>
            </ul>
        </div>
        @endif
    </div>
    @endforeach
    <div class="createComment d-flex justify-content-between gap-2">
        <a href="/profile/{{ auth()->user()->username }}" class="">
            <img src="https://source.unsplash.com/32x32" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
        </a>
        <input class="form-control form-control-sm rounded-pill" type="text" placeholder="Tulis Komenter ..." name="body" id="komentar{{ $post->id }}">
        <button class="btn btn-primary" type="button" onclick="commentStore({{ $post->id }})">Komen</button>
    </div>
</div>