@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card card-vertical-align">
                <div class="card-content">
                    <span class="card-title teal-text text-lighten-1 center-align">
                       <h2 class="thread-card-title">{{ _('Login') }}</h2>
                    </span>
                    <div class="row">
                        <form class="col s12" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="row pt-1">
                                <div class="input-field col s12">
                                    <input id="email" 
                                            class="validate" 
                                            type="email" 
                                            name="email" 
                                            value="{{ old('email') }}"
                                            required
                                            autocomplete="email"
                                            autofocus>
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
                                            autocomplete="current-password">
                                    <label for="password">{{ _('Password') }}</label>

                                    @error('password')
                                    <span class="text-strong">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-field col s12" style="padding-bottom: 1.4rem;">
                                    <label>
                                        <input id="remember" class="filled-in" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span>{{ _('Remember Me') }}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="card-action card-action-container">
                                <div class="row row-form">
                                    <div class="col s12 m2 l2">
                                        <button class="btn waves-effect waves-light" type="submit">
                                            {{ _('Login') }}
                                            <i class="material-icons left">login</i>
                                        </button>
                                    </div>
                                    <div class="col s12 m10 l10">
                                        @if (Route::has('password.request'))
                                            <a class="waves-effect waves-light btn"
                                                href="{{ route('password.request') }}">
                                                    {{ _('Forgot Password?') }}
                                                    <i class="material-icons left">vpn_lock</i>
                                            </a>
                                        @endif
                                    </div>
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
