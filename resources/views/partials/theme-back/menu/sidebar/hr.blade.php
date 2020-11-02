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
                <span> Dashboard </span>
            </a>
        </li>
        @endhasanyrole

        <li class="menu-title">Staff Management</li>
        @canany(['staff-admin', 'staff-role-admin', 'staff-create', 'staff-role-view'])
        <li>
            <a href="javascript: void(0);">
                <i data-feather="users"></i>
                <span> Staff Members </span>
                <span class="menu-arrow"></span>
            </a>

            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ url('staff') }}">All Members</a>
                </li>
                <li>
                    <a href="{{ url('staff/search') }}">Search</a>
                </li>
                @can('staff-create')
                <li>
                    <a href="{{ url('staff/create') }}">New Staff Member</a>
                </li>
                @endcan
            </ul>
        </li>
        @endcanany
        @can('staff-admin')
        <li>
            <a href="javascript: void(0);">
                <i data-feather="package"></i>
                <span> Staff Requests </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="javascript: void(0);" aria-expanded="false"> Name Change
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('staff/user-change/0') }}">Pending Requests</a>
                        </li>
                        <li>
                            <a href="{{ url('staff/user-change/1') }}">Processed Requests</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" aria-expanded="false"> Identity Uploads
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('staff/identity-upload/0') }}">Pending Approval</a>
                        </li>
                        <li>
                            <a href="{{ url('staff/identity-upload/1') }}">Processed</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" aria-expanded="false"> Education records
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('staff/education-record/status') }}">All records</a>
                        </li>
                        @foreach(\App\Enums\EducationRecordStatus::toArray() as $label=>$id)
                        <li>
                            <a href="{{ url('staff/education-record/status/' . $id) }}">{{ $label }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </li>
        @endcan

        @canany(['staff-admin', 'staff-role-admin', 'staff-create', 'staff-role-view'])
        <li>
            <a href="javascript: void(0);">
                <i data-feather="monitor"></i>
                <span> Management </span>
                <span class="menu-arrow"></span>
            </a>

            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">Employment Records
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('staff/employment-record') }}">Alphabetical Order</a>
                        </li>
                        <li>
                            <a href="{{ url('staff/employment-record/order/number') }}">Employee No.</a>
                        </li>
                        <li>
                            <a href="{{ url('staff/employment-record/order/all') }}">All Employees</a>
                        </li>
                        <li>
                            <a href="{{ url('staff/employment-record/order/former') }}">Former Employees</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">Staff Job Titles
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('staff/job-title/staff') }}">Staff &amp; Titles</a>
                        </li>
                        <li>
                            <a href="{{ url('staff/job-title') }}">All Titles</a>
                        </li>
                        {{--<li>
                            <a href="{{ url('staff/job-title/search') }}">Search</a>
                        </li>--}}
                        <li>
                            <a href="{{ url('staff/job-title/history') }}">Title History</a>
                        </li>
                        @canany(['staff-admin','staff-create'])
                        <li>
                            <a href="{{ url('staff/job-title/record/create') }}">New Title Record</a>
                        </li>
                        @endcanany
                    </ul>
                </li>
            </ul>
        </li>
        @endcanany

        <li class="menu-title">Performance</li>
        @canany(['leave-super-admin', 'leave-admin', 'leave-view'])
        <li>
            <a href="javascript: void(0);">
                <i data-feather="battery-charging"></i>
                <span> Leave Management </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ url('performance/leave/calendar') }}">Leave Calendar</a>
                </li>
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">Leave types
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('performance/leave/type') }}">All types</a>
                        </li>
                        @canany(['leave-super-admin', 'leave-admin'])
                        <li>
                            <a href="{{ url('performance/leave/type/create') }}">New type</a>
                        </li>
                        @endcanany
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">Leave settings
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('performance/leave/setting') }}">All settings</a>
                        </li>
                        @canany(['leave-super-admin', 'leave-admin'])
                        <li>
                            <a href="{{ url('performance/leave/setting/create') }}">New setting</a>
                        </li>
                        @endcanany
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">Leave applications
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        @canany(['leave-super-admin', 'leave-admin'])
                        <li>
                            <a href="{{ url('performance/leave/application') }}">Pending requests</a>
                        </li>
                        @endcanany
                        <li>
                            <a href="{{ url('performance/leave/application') }}">Approved</a>
                        </li>
                        <li>
                            <a href="{{ url('performance/leave/application') }}">Ended</a>
                        </li>
                        @canany(['leave-super-admin', 'leave-admin'])
                        <li>
                            <a href="{{ url('performance/leave/application') }}">All ({{ date('Y') }})</a>
                        </li>
                        <li>
                            <a href="{{ url('performance/leave/application') }}">History</a>
                        </li>
                        @endcanany
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);">
                <i data-feather="heart"></i>
                <span> Holidays </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ url('performance/holiday') }}">All holidays</a>
                </li>
                <li>
                    <a href="{{ url('performance/holiday/create') }}">New holiday</a>
                </li>
            </ul>
        </li>
        @endcanany

        @canany(['settings-super-admin', 'settings-admin', 'settings-view', 'sms-admin', 'sms-view', 'staff-admin'])
        <li class="menu-title">Settings</li>
        <li>
            <a href="javascript: void(0);">
                <i data-feather="settings"></i>
                <span> {{ config('project.appNameShort') }} Settings </span>
                <span class="menu-arrow"></span>
            </a>

            <ul class="nav-second-level" aria-expanded="false">
                @canany(['settings-super-admin', 'settings-admin', 'settings-view'])
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false">Roles &amp; Permissions
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-third-level" aria-expanded="false">
                            <li>
                                <a href="{{ url('setting/app/role') }}">Roles</a>
                            </li>
                            <li>
                                <a href="{{ url('setting/app/permission') }}">All Permissions</a>
                            </li>
                        </ul>
                    </li>
                @endcanany

                @canany(['sms-admin', 'sms-view'])
                <li>
                    <a href="javascript: void(0);" aria-expanded="false"> SMS
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('setting/app/sms/gateway') }}">SMS Gateways</a>
                        </li>
                        {{--<li>
                            <a href="{{ url('setting/app/sms/reports') }}">Delivery Reports</a>
                        </li>--}}
                    </ul>
                </li>
                @endcanany
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);">
                <i data-feather="briefcase"></i>
                <span> Company Settings </span>
                <span class="menu-arrow"></span>
            </a>

            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ url('setting/company') }}">Company Info</a>
                </li>
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">Units
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('setting/unit') }}">All Units</a>
                        </li>
                        @canany(['settings-super-admin'])
                        <li>
                            <a href="{{ url('setting/unit/create') }}">Create Unit</a>
                        </li>
                        @endcanany
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">Branches
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('setting/branch-type') }}">Branch Types</a>
                        </li>
                        <li>
                            <a href="{{ url('setting/branch') }}">Branches</a>
                        </li>
                        @canany(['settings-super-admin'])
                        <li>
                            <a href="{{ url('setting/branch/create') }}">Create Branch</a>
                        </li>
                        @endcanany
                    </ul>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i data-feather="users"></i>
                <span> Staff Settings</span>
                <span class="menu-arrow"></span>
            </a>

            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">Employment Types
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('setting/staff/employment-type') }}">Employment Types</a>
                        </li>
                        @canany(['settings-super-admin'])
                            <li>
                                <a href="{{ url('setting/staff/employment-type/create') }}">Create Employment Type</a>
                            </li>
                        @endcanany
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" aria-expanded="false">Job Titles
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level" aria-expanded="false">
                        <li>
                            <a href="{{ url('setting/staff/job-title') }}">All Titles</a>
                        </li>
                        @canany(['settings-super-admin', 'staff-admin'])
                            <li>
                                <a href="{{ url('setting/staff/job-title/create') }}">Create Title</a>
                            </li>
                        @endcanany
                    </ul>
                </li>
            </ul>
        </li>
        @endcanany

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
