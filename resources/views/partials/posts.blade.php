<div class="bg-white rounded-3 mb-3 shadow-sm">
    <div class="px-3 pt-3 headerPost d-flex justify-content-between">
        <div class="d-flex gap-3">
            <a href="/profile/{{ $post->user->username }}" class="">
                <img src="https://source.unsplash.com/32x32" alt="twbs" width="32" height="32" class="img-fluid rounded-circle flex-shrink-0 mt-2">
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
                        Edit Postingan
                    </button>
                </li>
                <li>
                    <form action="/post/{{ $post->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">Hapus Postingan</button>
                    </form>
                </li>
            </ul>
        </div>
        @endif
    </div>
    <div class="px-3 mainPost mt-3">
        <p>{!! $post->body !!}</p>
    </div>
    <div class="imagePost d-flex justify-content-center">
        @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->user->name }} Post Image">
        @endif
    </div>
    <div class="footerPost mt-3">
        <hr>
        <div class="lcs d-flex justify-content-between px-4">
            <p><i class="bi bi-hand-thumbs-up"></i> Like</p>
            <p><i class="bi bi-chat-square"></i> Comment</p>
            <p>Share</p>
        </div>
    </div>
</div>
{{-- modal edit post --}}
<div class="modal fade" id="editModal{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Postingan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="col-12 d-flex">
                    <a href="/profile/{{ auth()->user()->username }}">
                        <img src="https://source.unsplash.com/100x100" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0 mt-1 img-fluid">
                    </a>
                    <div class="w-100 justify-content-between mt-1 ms-2">
                        <div>
                            <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <form action="/post/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        @error('body')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="editBody{{ $post->id }}" type="hidden" name="body" required value="{{ $post->body }}">
                        <trix-editor input="editBody{{ $post->id }}"></trix-editor>
                        <div class="mb-3">
                            <label for="editImage" class="form-label"><br><b>Upload Gambar</b></label>
                            <input type="hidden" name="oldImage" value="{{ $post->image }}">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="edit-img-preview img-fluid mb-3 d-block">
                            @else
                                <img class="edit-img-preview img-fluid mb-3">
                            @endif
                            <input class="form-control form-control-sm @error('image') is-invalid @enderror" type="file" id="editImage" name="image" onchange="previewEditImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ubah Postingan</button>
            </form>
            </div>
        </div>
    </div>
</div>
