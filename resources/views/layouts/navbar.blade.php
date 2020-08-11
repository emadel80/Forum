<ul id="auth-user-dropdown" class="dropdown-content">
    <li>
        <a href="{{ route('logout') }}" 
                onclick="event.preventDefault();$('#logout-form').submit();">
            {{ _('Logout') }}
        </a>
        <form id="logout-form" 
                action="{{ route('logout') }}" 
                method="POST" 
                style="display: none;">
            @csrf
        </form>
    </li>
</ul>
<nav>
    <div class="nav-wrapper">
        <a href="{{ url('threads') }}" class="brand-logo">
             {{ config('app.name', 'Laravel') }}
        </a>
        <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            @include('layouts.links')
        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile-menu">
    @include('layouts.links')
</ul>