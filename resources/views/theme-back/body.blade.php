@extends('theme-back.chassis')

@section('chassis')
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
            <div class="container-fluid">
                <!-- LOGO -->
                <a href="{{ url('/') }}" class="navbar-brand mr-0 mr-md-2 logo">
                    <span class="logo-lg">
                        <img src="{{ backImageUrl('logo-short.png') }}" alt="{{ config('project.appName') }}" height="24" />
                        <span class="d-inline h5 ml-1 text-logo">
                            {{ config('project.appName') }}
                            <small class="text-muted"></small>
                        </span>
                    </span>
                        <span class="logo-sm">
                        <img src="{{ backImageUrl('logo.png') }}" alt="{{ config('project.appName') }}" height="24">
                    </span>
                </a>

                <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
                    <li class="">
                        <button class="button-menu-mobile open-left disable-btn">
                            <i data-feather="menu" class="menu-icon"></i>
                            <i data-feather="x" class="close-icon"></i>
                        </button>
                    </li>
                </ul>

                <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown d-none d-lg-block" data-toggle="tooltip" data-placement="left" title="Change language">
                        <a class="nav-link dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i data-feather="globe"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @include('partials.theme-back.menu.languages')
                        </div>
                    </li>

                    <li class="dropdown notification-list" data-toggle="tooltip" data-placement="left"
                        title="{{ $new_notification }} new unread notifications">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                           aria-expanded="false">
                            <i data-feather="bell"></i>
                            @if($new_notification)
                                <span class="noti-icon-badge"></span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title border-bottom">
                                <h5 class="m-0 font-size-16">
                                    @if(count($notifications) > 0)
                                    <span class="float-right">
                                        <a href="" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>
                                    @endif
                                    Notification
                                </h5>
                            </div>

                            @if(count($notifications) > 0)
                            <div class="slimscroll noti-scroll">
                                @include('partials.theme-back.menu.notifications')
                            </div>
                            @else
                            <div class="text-center text-muted font-italic p-3">No notifications</div>
                            @endif

                            <!-- All-->
                            <a href="{{ url('profile/notification') }}"
                               class="dropdown-item text-center text-primary notify-item notify-all border-top">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list align-self-center profile-dropdown">
                        <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <div class="media user-profile ">
                                <img src="{{ isSystem() ? userPhoto($user->photo) : customerUserPhoto($user->photo) }}" alt="{{ $user->name }}" class="rounded-circle align-self-center" />
                                <div class="media-body text-left">
                                    <h6 class="pro-user-name ml-2 my-0">
                                        <span>{{ $user->name }}</span>
                                        <span class="pro-user-desc text-muted d-block mt-1">{{ $user->position }} </span>
                                    </h6>
                                </div>
                                <span data-feather="chevron-down" class="ml-2 align-self-center"></span>
                            </div>
                        </a>
                        <div class="dropdown-menu profile-dropdown-items dropdown-menu-right">
                            @include('partials.theme-back.menu.profile')
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            <div class="media user-profile mt-2 mb-2">
                <img src="{{ isSystem() ? userPhoto($user->photo) : customerUserPhoto($user->photo) }}" class="avatar-sm rounded-circle mr-2" alt="{{ $user->name }}" />
                <img src="{{ isSystem() ? userPhoto($user->photo) : customerUserPhoto($user->photo) }}" class="avatar-xs rounded-circle mr-2" alt="{{ $user->name }}" />

                <div class="media-body">
                    <h6 class="pro-user-name mt-0 mb-0">{{ $user->name }}</h6>
                    <span class="pro-user-desc">{{ $user->position ?? 'User' }}</span>
                </div>
                <div class="dropdown align-self-center profile-dropdown-menu">
                    <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                       aria-expanded="false">
                        <span data-feather="chevron-down"></span>
                    </a>
                    <div class="dropdown-menu profile-dropdown">
                        @include('partials.theme-back.menu.profile')
                    </div>
                </div>
            </div>
            <div class="sidebar-content">
                @include('partials.theme-back.menu.sidebar.' . $menu)

                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row page-title">
                        <div class="col-md-12">
                            {!! breadcrumbs($crumbs) !!}
                            <h4 class="mb-1 mt-0">{{ $title }}</h4>
                        </div>
                    </div>

                    @include('partials.theme-back.alert')

                    @yield('body')

                </div> <!-- container-fluid -->

            </div> <!-- content -->



            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            {{ date('Y') }} &copy; {{ config('project.appNameLong') }}. All Rights Reserved.
                        </div>
                        <div class="col-2 text-right">
                            <a href="#" class="text-muted">
                                <i class="fas fa-desktop"></i>
                                version: <strong>{{ config('project.version') }}</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i data-feather="x-circle"></i>
            </a>
            <h5 class="m-0">Side bar</h5>
        </div>
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
@stop
