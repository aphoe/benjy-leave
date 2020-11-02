<a href="{{ url('/') }}" class="dropdown-item notify-item">
    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
    <span>My Profile</span>
</a>

<a href="{{ url('profile/setting') }}" class="dropdown-item notify-item">
    <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
    <span>Settings</span>
</a>

<a href="{{ url('support') }}" class="dropdown-item notify-item">
    <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
    <span>Support</span>
</a>

<a href="{{ url('login/locked') }}" class="dropdown-item notify-item">
    <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
    <span>Lock Screen</span>
</a>

<div class="dropdown-divider"></div>

<a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
    <span>{{ __('Logout') }}</span>
</a>
