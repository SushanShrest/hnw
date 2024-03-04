<header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="{{ asset('backend/images/hlogo.png') }}" alt="" /></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="{{ asset('backend/images/hlogo.png') }}" alt="" /><b>HNW</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="@if (Auth::check() && Auth::user()->image != null) {{ Auth::user()->image }} @else {{ asset('backend/images/dummy_user.png') }} @endif"
                            class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::check() ? Auth::user()->name : '' }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="@if (Auth::check() && Auth::user()->image != null) {{ Auth::user()->image }} @else {{ asset('backend/images/dummy_user.png') }} @endif"
                                class="img-circle" alt=" {{ Auth::check() ? Auth::user()->name : '' }}">

                            <p>
                                {{ Auth::check() ? Auth::user()->name : '' }} <br />
                                <small>
                                    @if (Auth::check())
                                        @foreach (auth()->user()->getRoleNames() as $userRole)
                                            {{ $userRole }}
                                        @endforeach
                                    @endif
                                </small>


                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="route('logout')" class="btn btn-default btn-flat"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>

    </nav>
</header>
