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
                <li>
                    <button class="dropdown-item">
                        Edit
                    </button>
                </li>
                <li>
                    <form action="/comment/{{ $comment->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                    </form>
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
    <div class="createComment">
        <form action="/comment" method="POST" class="d-flex justify-content-between gap-2">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <a href="/profile/{{ auth()->user()->username }}" class="">
                <img src="https://source.unsplash.com/32x32" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            </a>
            <input class="form-control form-control-sm rounded-pill" type="text" placeholder="Tulis Komenter ..." name="body">
        </form>
    </div>
</div>