@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card card-vertical-align">
                <div class="card-content">
                    <article>
                        <span class="card-title">
                            <h4>{{ $thread->title }}</h4>
                        </span>
                        <div class="card-action"></div>
                        <span>{{ $thread->body }}</span>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            @foreach ($thread->replies as $reply)
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
            @endforeach
        </div>
    </div>
</div>
@endsection

