<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img style="margin-left: 50px">
        <span class="brand-text font-weight-light">Laravel CRUD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel-->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('/')}}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">




                <li class="nav-item " >
                    <a href="" class="nav-link">
                        <i class="nav-icon fa  fa-university"></i>
                        <p>
                            Manage Department
                        </p>
                    </a>
                </li>




                {{--LogOut--}}

                <li class="nav-item mt-2">

                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                        <i class="nav-icon fa fa-power-off "></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>

    </div>

</aside>
