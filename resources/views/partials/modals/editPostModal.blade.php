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
                                <img src="{{ asset('storage/' . $post->image) }}" class="edit-img-preview{{ $post->id }} img-fluid mb-3 d-block">
                            @else
                                <img class="edit-img-preview img-fluid mb-3">
                            @endif
                            <input class="editImage form-control form-control-sm @error('image') is-invalid @enderror" type="file" id="editImage{{ $post->id }}" name="image" onchange="previewEditImage({{ $post->id }})">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Ubah Postingan</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>