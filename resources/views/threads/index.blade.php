@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card card-vertical-align">
                    <div class="card-content">
                        <span class="card-title">
                            <h2>{{ _('Forum Threads') }}</h2>
                        </span>
                        @foreach ($threads as $thread)
                            <article>
                                <h4>
                                    <a href="{{ $thread->path() }}">
                                        {{ $thread->title }}
                                    </a>
                                </h4>
                                <div>{{ $thread->body }}</div>
                            </article>
                            <div class="card-action"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection