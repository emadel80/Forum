<ul id="auth-user-dropdown" class="dropdown-content">
    <li>
        @include('auth.links.logout')
        <form id="logout-form"
                class="hide" 
                action="{{ route('logout') }}" 
                method="POST">
            @csrf
        </form>
    </li>
</ul>
<nav>
    <div class="nav-wrapper">
        <a href="{{ url('/') }}" class="brand-logo">
            {{ config('app.name', 'Laravel') }}
        </a>
        <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="mobile-nav" class="left hide-on-med-and-down">
            <li>
                <a href="{{ route('threads.index') }}">
                    {{ _('All Threads') }}
                </a>
            </li>
        </ul>
        <ul class="right hide-on-med-and-down">
            @guest
                @include('auth.links.guest')
            @else 
                <li>
                    <a class="dropdown-trigger" href="#!" data-target="auth-user-dropdown">
                        {{ auth()->user()->name }}
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile-menu">
    <li>
        <a href="{{ route('threads.index') }}">
            {{ _('All Threads') }}
        </a>
    </li> 
    @guest
        @include('auth.links.guest')
    @else
        <li>
            <a href="#">{{ auth()->user()->name }}</a>
        </li>
        <li>
            @include('auth.links.logout')
        </li>
    @endguest
</ul>


