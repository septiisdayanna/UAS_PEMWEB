<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ url('dashboard') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('post') ? 'active' : '' }}" href="{{ url('post') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Posts
                </a>
            </li>
            
            @if (auth()->user()->role_id == 1)
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('categories') ? 'active' : '' }}" href="{{ url('categories') }}">
                        <span data-feather="folder" class="align-text-bottom"></span>
                        Categories
                    </a>
                </li>
            @endif

            @if (auth()->user()->role_id == 1)
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('config') ? 'active' : '' }}" href="{{ url('config') }}">
                        <span data-feather="list" class="align-text-bottom"></span>
                        Config
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link {{ request()->is('users') ? 'active' : '' }}" href="{{ url('users') }}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Users
                </a>
            </li>

            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
