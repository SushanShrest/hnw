<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('backend.home') }}">
                    <i class="fa fa-home"></i></i> <span>Home</span>
                    <span class="pull-right-container">
                    </span>
                </a>

            </li>
            <li>
                <a href="{{ route('news.display') }}">
                    <i class="fa fa-newspaper-o"></i></i> <span>News</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-h-square"></i> <span>Appointment</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="{{ route('departments.display') }}"> <i class="fa fa-building"></i>View Appointment</a></li>
                    <li><a href="{{ route('appointments.userindex') }}"> <i class="fa fa-user"></i>My Appointments</a></li>
                    <li><a href="{{ route('records.userindex') }}"> <i class="fa fa-file-text"></i>My Records</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ url('/chatify') }}">
                    <i class="fa fa-commenting"></i> <span>Chat</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>

            <li>
                <a href="{{ route('messages.userindex') }}">
                    <i class="fa fa-comments"></i> <span>Feedback</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

            <li>
                <a href="{{ route('pharmacies.display') }}">
                    <i class="fa fa-map-marker"></i> <span>Pharmacy</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

            <li>
                <a href="{{ route('becomedoctors.display') }}">
                    <i class="fa fa-envelope"></i> <span>Become a doctor</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

            {{-- Doctor Section --}}
            @role('doctor')
            <li class="header">Doctor</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar-check-o"></i>
                    <span>Appointment</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('timings.index') }}"><i class="fa fa-calendar"></i> Timings</a></li>
                    <li><a href="{{ route('appointments.doctorindex') }}"><i class="fa fa-user-md"></i> Docotr Appointments</a></li>
                    <li><a href="{{ route('records.doctorindex') }}"><i class="fa fa-user-md"></i> Docotr Records</a></li>
                </ul>
            </li>
            @endrole


            {{-- Admin Section --}}
            @role('admin')
            <li class="header">Admin</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-building"></i>
                    <span>Service Control</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">         
                    <li><a href="{{ route('news.index') }}"><i class="fa fa-newspaper-o"></i> News</a></li>
                    <li><a href="{{ route('departments.index') }}"><i class="fa fa-building"></i> Departments</a></li>
                    <li><a href="{{ route('pharmacies.index') }}"><i class="fa fa-plus"></i> Pharmacies</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-secret"></i>
                    <span>Users Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    {{-- <li><a href="#"><i class="fa fa-shield"></i> Roles</a></li> --}}
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> Users</a></li>
                    <li><a href="{{ route('doctors.index') }}"><i class="fa fa-user-md"></i> Doctors</a></li>
                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span>Records Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('becomedoctors.index') }}"><i class="fa fa-envelope"></i> Request Doctor</a></li>
                    <li><a href="{{ route('timings.adminindex') }}"><i class="fa fa-calendar-check-o"></i> Timings</a></li>
                    <li><a href="{{ route('appointments.index') }}"><i class="fa fa-exchange"></i> Appointments</a></li>
                    <li><a href="{{ route('records.index') }}"><i class="fa fa-file-text"></i> Records</a></li>
                    <li><a href="{{ route('messages.index') }}"><i class="fa fa-comments"></i> Feedbacks</a></li>
                </ul>
            </li>
            @endrole
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
