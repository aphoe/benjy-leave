<!--- Sidemenu -->
<div id="sidebar-menu" class="slimscroll-menu">
    <ul class="metismenu" id="menu-bar">
        <li class="menu-title">Navigation</li>
        <li>
            <a href="{{ url('/') }}">
                <i data-feather="user" class="icon-dual"></i>
                <span> Profile </span>
            </a>
        </li>
        @hasanyrole('admin|manager|staff')
        <li>
            <a href="{{ url('dashboard') }}">
                <i data-feather="home"></i>
                <span> Admin </span>
            </a>
        </li>
        @endhasanyrole

        <li class="menu-title">Perfomance</li>
        <li>
            <a href="javascript: void(0);">
                <i data-feather="battery-charging"></i>
                <span> Leave </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">Leave types
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('user/leave/type') }}">All types</a>
                        </li>
                        <li>
                            <a href="{{ url('user/leave/type/available') }}">Available</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">Leave applications
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('user/leave/application') }}">My applications</a>
                        </li>
                        <li>
                            <a href="{{ url('user/leave/application/create') }}">Apply</a>
                        </li>
                        <li>
                            <a href="{{ url('user/leave/status') }}">Status</a>
                        </li>
                        <li>
                            <a href="{{ url('user/leave/history') }}">History</a>
                        </li>
                    </ul>
                </li>
                @if($user->has('reportFroms')->count() > 0)
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">Leave approval
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('user/leave/supervisor/approval') }}">Requests</a>
                        </li>
                        {{--
                        TODO: Accepted leave supervisor approval page
                            - Ended leave supervisor approval page
                        --}}
                        <li>
                            <a href="{{ url('user/leave/supervisor/approval/accepted') }}">Accepted</a>
                        </li>
                        <li>
                            <a href="{{ url('user/leave/supervisor/approval/ended') }}">Ended</a>
                        </li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">Leave relieve
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('user/leave/relieve') }}">Requests</a>
                        </li>
                        {{--
                        TODO: Accepted leave relieve page
                            - Ended leave relieve page
                        --}}
                        <li>
                            <a href="{{ url('user/leave/relieve/accepted') }}">Accepted</a>
                        </li>
                        <li>
                            <a href="{{ url('user/leave/relieve/ended') }}">Ended</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="menu-title">Account Settings</li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i data-feather="log-out"></i>
                <span> {{ __('Logout') }} </span>
            </a>
        </li>
    </ul>
</div>
<!-- End Sidebar -->
