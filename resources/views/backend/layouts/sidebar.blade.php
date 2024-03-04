<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="#">
                    <i class="fa fa-home"></i></i> <span>Home</span>
                    <span class="pull-right-container">
                    </span>
                </a>

            </li>

            <li>
                <a href="#">
                    <i class="fa fa-file"></i> <span>Records</span>
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
                    <li><a href="#"> <i class="fa fa-plus-circle"></i>  Create</a></li>
                    {{-- <li><a href="#" ><i class="fa-regular fa-list"></i> List</a></li> --}}

                </ul>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-comments"></i> <span>Message</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Feedback</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-map-marker"></i> <span>Pharmacy</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

            {{-- Doctor Section --}}
            @role('doctor')
            <li class="header">Doctor</li>
            {{-- <li><a href="#"><i class="fa fa-users"></i> <span>User managements</span></a>
            </li> --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-secret"></i>
                    <span>Appointment</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-shield"></i> Appointment schedule</a></li>
                   
                </ul>
            </li>
            @endrole


            {{-- Admin Section --}}
            @role('admin')
            <li class="header">Admin</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>Home Blogs</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-plus"></i> Blog list</a></li>
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
                    <li><a href="#"><i class="fa fa-shield"></i> Roles</a></li>
                    <li><a href="#"><i class="fa fa-users"></i> Users</a></li>
                    <li><a href="#"><i class="fa fa-building"></i> Departments</a></li>
                </ul>
            </li>
            @endrole
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
