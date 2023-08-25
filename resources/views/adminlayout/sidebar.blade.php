<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="" class="rounded-circle" src="/img/logo.png" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">  
                            {{Auth::user()->name }} 
                        </span>
                        {{-- <span class="text-muted text-xs block">{{ Auth::user()->email }} <b class="caret"></b></span> --}}
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        {{-- <li><a class="dropdown-item" href="#">Profile</a></li> --}}
                        <li class="dropdown-divider"></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="/home"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
            </li>
            @can('view-categories', Auth::user() )
            <li class=" ">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label"> Category </span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('category')}}"> Product Category </a></li>
                    {{-- <li class=" "><a href="{{ url('product')}}"> All Product </a></li> --}}
                    
                </ul>
            </li>
            @endcan
            @can('view-products', Auth::user() )
            <li class=" ">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Product </span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('product/create')}}"> Create Product </a></li>
                    <li class=" "><a href="{{ url('product')}}"> All Product </a></li>
                    <li class=" "><a href="{{ url('brand')}}"> Manage Brand </a></li>
                    <li class=" "><a href="{{ url('size-list')}}"> Manage Size </a></li>
                    <li class=" "><a href="{{ url('color-list')}}"> Manage Color </a></li>
                </ul>
            </li>
            @endcan
            @can('view-orders', Auth::user() )
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label"> Orders </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{url('order')}}"> All Orders </a></li>
                </ul>
            </li>
            @endcan
            @can('view-users', Auth::user() )
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">User Management</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ url('admin-list')}}">All Users</a></li>
                </ul>
            </li>
            @endcan 
            @can('view-roles-and-permissions', Auth::user() )
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Role Management</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ url('role')}}"> Roles</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Permission Management </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ url('permission')}}"> Permission </a></li>
                </ul>
            </li>
            @endcan

        </ul>

    </div>
</nav>
