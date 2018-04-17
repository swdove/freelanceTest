<div class="card mb-3">
    <div class="card-header">
        <div class="level">
            <div class="flex">
                <h2>
                    <a href="/posts/{{ $post->id }}">
                        {{ $post->title }}
                    </a>
                </h2>
            </div>
            <div>
                Posted by {{ $post->user->name }} |
                {{ $post->created_at->toFormattedDateString() }}
            </div>
        </div>
    </div>
    <div class="card-body">
        {{ $post->body }}
    </div>
</div>