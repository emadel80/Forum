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
</div>
@endsection

