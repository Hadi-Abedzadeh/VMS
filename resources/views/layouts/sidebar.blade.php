<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                {{ trans('ui.text.dashboard') }}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{(Request::is('dashboard/blog*') == route('dashboard.blog.index'))? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{(Request::is('dashboard/blog*') == route('dashboard.blog.index'))? 'active' : '' }}">
                            <i class="nav-icon fa fa-pie-chart"></i>
                            <p>
                                {{ trans('ui.text.blog') }}
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('dashboard.blog.create')}}" class="nav-link {{(Request::is('dashboard/blog/create') == route('dashboard.blog.create'))? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{ trans('ui.sidebar.posts.add') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('dashboard.blog.index')}}" class="nav-link {{(Request::is('dashboard/blog') == route('dashboard.blog.index'))? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{ trans('ui.sidebar.posts.list') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item has-treeview {{(Request::is('dashboard/courses*') == route('dashboard.courses.index') OR Request::is('dashboard/course-upload') == route('dashboard.courses.upload'))? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{(Request::is('dashboard/courses*') == route('dashboard.courses.index') OR Request::is('dashboard/course-upload') == route('dashboard.courses.upload'))? 'active' : '' }}">
                            <i class="nav-icon fa fa-tree"></i>
                            <p>
                                {{ trans('ui.sidebar.courses.text') }}
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.courses.create') }}" class="nav-link {{(Request::is('dashboard/courses/create') == route('dashboard.courses.create'))? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{ trans('ui.sidebar.courses.add') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.courses.index') }}" class="nav-link {{(Request::is('dashboard/courses') == route('dashboard.courses.index'))? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{ trans('ui.sidebar.courses.list') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.courses.upload') }}" class="nav-link {{(Request::is('dashboard/course-upload') == route('dashboard.courses.upload'))? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{ trans('ui.text.upload_courses') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item has-treeview {{(Request::is('dashboard/users*') == route('dashboard.users.index'))? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{(Request::is('dashboard/users*') == route('dashboard.users.index'))? 'active' : '' }}">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                {{ trans('ui.sidebar.users.text') }}
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.users.index') }}" class="nav-link {{(Request::is('dashboard/users') == route('dashboard.users.index'))? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{ trans('ui.sidebar.users.list') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
