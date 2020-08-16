<div class="card">
    <div class="card-content">
        <article>
            <span class="card-title reply-card-title">
                <a href="#">
                    {{ $reply->owner->name }}
                </a> 
                said {{ $reply->created_at->diffForHumans() }}...
            </span>
            <div class="card-action"></div>
            <span>{{ $reply->body }}</span>
        </article>    
    </div>
</div>