{{-- Image Modal --}}
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="col-12 d-flex">
                    <a href="/profile/{{ auth()->user()->username }}">
                        <img src="{{ asset('storage/'. auth()->user()->biodata->profile_image) }}" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0 mt-1 img-fluid">
                    </a>
                    <div class="w-100 justify-content-between mt-1 ms-2">
                        <div>
                            <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <form action="/profile/image" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="editProfileImage" class="form-label"><br><b>Gambar Profile</b></label>
                            <input type="hidden" name="oldImage" value="{{ $bio->profile_image }}">
                            @if ($bio->profile_image)
                                <img src="{{ asset('storage/' . $bio->profile_image) }}" class="edit-profile-img-preview img-fluid mb-3 d-block">
                            @else
                                <img class="edit-profile-img-preview img-fluid mb-3">
                            @endif
                            <input class="form-control form-control-sm @error('profile_image') is-invalid @enderror" type="file" id="editProfileImage" name="profile_image" onchange="previewEditProfileImage()">
                            @error('profile_image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
            </div>
        </div>
    </div>
</div>