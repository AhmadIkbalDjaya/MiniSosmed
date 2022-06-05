<div class="p-3 bg-white rounded-3 mb-5 shadow-sm">
    <div class="headerPost d-flex justify-content-between">
        <div class="d-flex gap-3">
            <a href="/profile/{{ $post->user->username }}" class="">
                <img src="https://source.unsplash.com/32x32" alt="twbs" width="32" height="32" class="img-fluid rounded-circle flex-shrink-0 mt-2">
            </a>
            <div class="d-flex flex-column">
                <a href="/profile/{{ $post->user->username }}" class="text-decoration-none text-dark">
                    <small><b>{{ $post->user->name }}</b></small>
                </a>
                <small class="text-black-50">{{ $post->updated_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
    <div class="mainPost mt-3">
        <p>{{ $post->body }}</p>
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