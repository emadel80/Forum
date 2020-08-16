@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card card-vertical-align">
                <div class="card-content">
                    <article>
                        <span class="card-title thread-card-title">
                            <a href="#">
                                {{ $thread->creator->name }}
                            </a>
                            posted: {{ $thread->title }}
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
                @include('threads.reply')
            @endforeach
        </div>
    </div>
</div>
@endsection

