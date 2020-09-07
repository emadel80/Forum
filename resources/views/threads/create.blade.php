@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card card-vertical-align">
                    <div class="card-content">
                        <span class="card-title center-align teal-text teal-accent-4">
                            <h2 class="thread-card-title">{{ _('Create a New Thread') }}</h2>
                        </span>
                        <div class="row">
                            <form class="col s12" method="POST" action="{{ route('threads.store') }}">
                                @csrf
                                <div class="row pt-1">
                                    <div class="input-field col s3">
                                        <select id="channel_id" name="channel_id">
                                            <option value="" disabled selected>{{ _('Choose a channel') }}</option>
                                            @foreach ($channels as $channel)
                                                <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>{{ $channel->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="channel_id" class="{{ $errors->has('channel_id') ? 'red-text' : '' }}">{{ _('Channel') }}</label>
                                        @if ($errors->has('channel_id'))
                                            @foreach ($errors->get('channel_id') as $error)
                                                <span class="helper-text red-text">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" id="title" class="validate {{ $errors->has('title') ? 'red-underline' : '' }}" name="title" value="{{ old('title') }}" required>
                                        <label for="title" class="{{ $errors->has('title') ? 'red-text' : '' }}">Title</label> 
                                        @if ($errors->has('title'))
                                            @foreach ($errors->get('title') as $error)
                                                <span class="helper-text red-text">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="body" class="materialize-textarea {{ $errors->has('body') ? 'red-underline' : '' }}" name="body" required>{{ old('body') }}</textarea>
                                        <label for="body" class="{{ $errors->has('body') ? 'red-text' : '' }}">Body</label>
                                        @if ($errors->has('body'))
                                            @foreach ($errors->get('body') as $error)
                                                <span class="helper-text red-text">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col s12">
                                        <button type="submit" class="btn waves-effect waves-light ml-2">
                                            Publish
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection