@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card card-vertical-align">
                <div class="card-content">
                    <span class="card-title teal-text text-lighten-1 text-strong center-align">
                        {{ _('Register') }}
                    </span>
                    <div class="row">
                        <form class="col s12" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="name"
                                            class="validate"
                                            type="text"
                                            name="name"
                                            value="{{ old('name') }}"
                                            required
                                            autocomplete="name"
                                            autofocus>
                                    <label for="name">{{ _('Name') }}</label>

                                    @error('name')
                                        <span class="text-strong">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" 
                                            class="validate" 
                                            type="email" 
                                            name="email" 
                                            value="{{ old('email') }}"
                                            required
                                            autocomplete="email">
                                    <label for="email">{{ _('Email') }}</label>

                                    @error('email')
                                    <span class="text-strong">
                                        {{ $message }}
                                    </span>                                        
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" 
                                            class="validate" 
                                            type="password" 
                                            name="password" 
                                            required 
                                            autocomplete="new-password">
                                    <label for="password">{{ _('Password') }}</label>

                                    @error('password')
                                    <span class="text-strong">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    <input id="password-confirm" 
                                            class="validate" 
                                            type="password" 
                                            name="password-confirmation" 
                                            required 
                                            autocomplete="new-password">
                                    <label for="password-confirm">{{ _('Confirm Password') }}</label>
                                </div>
                            </div>
                            <div class="row row-form" style="padding-left: 2rem;">
                                <div class="col s12">
                                    <button class="btn waves-effect waves-light" type="submit">
                                        <i class="material-icons right">send</i>
                                        {{ _('Register') }}
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
