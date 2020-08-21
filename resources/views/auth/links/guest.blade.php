<li>
    <a href="{{ route('login') }}">{{ _('Login') }}</a>
</li>
@if (Route::has('register'))
    <li>
        <a href="{{ route('register') }}">{{ _('Register') }}</a>
    </li>
@endif