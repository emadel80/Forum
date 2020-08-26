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
                                    <div class="input-field col s12">
                                        <input type="text" id="title" class="validate" name="title">
                                        <label for="title">Title</label> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="body" class="materialize-textarea" name="body"></textarea>
                                        <label for="body">Body</label>
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