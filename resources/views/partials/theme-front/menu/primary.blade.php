<ul class="navbar-nav menu w_menu ml-auto mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}" role="button" aria-expanded="false">
            Home
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('features') }}" role="button" aria-expanded="false">
            Features
        </a>
    </li>
    <li class="dropdown submenu nav-item">
        <a title="About" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">About</a>
        <ul role="menu" class=" dropdown-menu">
            <li class="nav-item"><a title="About Us" class="nav-link" href="{{ url('about') }}">About Us</a></li>
            <li class="nav-item"><a title="Team" class="nav-link" href="{{ url('about/team') }}">Team</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('pricing') }}" role="button" aria-expanded="false">
            Pricing
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('resources') }}" role="button" aria-expanded="false">
            Resources
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('contact') }}" role="button" aria-expanded="false">
            Contact
        </a>
    </li>
</ul>
