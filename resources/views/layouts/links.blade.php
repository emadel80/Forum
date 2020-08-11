@guest
    <li>
        <a href="{{ route('login') }}">{{ _('Login') }}</a>
    </li>
    @if (Route::has('register'))
        <li>
            <a href="{{ route('register') }}">{{ _('Register') }}</a>
        </li>
    @endif
@else
    <li>
        <a class="dropdown-trigger" href="#!" data-target="auth-user-dropdown">
            {{ _('Account') }}
            <i class="material-icons right">arrow_drop_down</i>
        </a>
    </li> 
@endguest