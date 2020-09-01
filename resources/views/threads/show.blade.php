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
    @if (auth()->check())
        <div class="row">
            <form 
                class="col s12" 
                method="POST" 
                action="{{ route('replies.store', [
                    $thread->channel->slug, 
                    $thread->id
                ]) }}">
                @csrf
                <div class="row pt-1">
                    <div class="input-field col s10">
                        <i class="material-icons teal-text text-accent-4 prefix">mode_edit</i>
                        <textarea id="body" class="materialize-textarea" name="body"></textarea>
                        <label for="body">Message</label>
                    </div>
                    <div class="input-field col s2">
                        <button class="btn waves-effect waves-light ml-2" type="submit" name="reply">
                            Reply
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @else
        <div class="row">
            <div class="col s12">
                <p class="center-align">
                    Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.
                </p>
            </div>
        </div>
    @endif
</div>
@endsection

