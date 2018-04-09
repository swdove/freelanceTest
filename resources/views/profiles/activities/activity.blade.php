<div class="card border-primary mb-3">
    <div class="card-header">
        <div class="level">
            <span class="flex">
                <b>{{ $heading }}</b>
            </span>
            <span>
                {{-- {{ $thread->created_at->diffForHumans() }} --}}
            </span>
        </div>
    </div>
    <div class="card-body">
        {{ $body }}
    </div>
</div>   