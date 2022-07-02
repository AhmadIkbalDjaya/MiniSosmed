{{-- Biodata Modal --}}
<div class="modal fade" id="bioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Biodata</h5>
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
                    <form action="/profile/bio" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" name="birthday" class="form-control" id="birthday" value="{{ auth()->user()->biodata->birthday }}">
                        </div>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="genre">
                                @if (auth()->user()->biodata->genre == 'Laki-Laki')
                                    <option value="Laki-Laki" selected>Laki-Laki</option>
                                    <option value="Perempuan">Perempuan<option>
                                @else
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan" selected>Perempuan<option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ auth()->user()->biodata->address }}">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Posting</button>
            </form>
            </div>
        </div>
    </div>
</div>