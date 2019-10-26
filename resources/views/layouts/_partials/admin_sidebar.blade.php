<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Dashboads</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(Auth::user()->hasAnyRole(['Admin']))
                        <li><a href="{{url('/admin/')}}"><i class="fa fa-circle-o"></i>Dashboard</a></li>
                    @elseif(Auth::user()->hasAnyRole(['Manager']))
                        <li><a href="{{url('/manager/')}}"><i class="fa fa-circle-o"></i>Dashboard</a></li>
                    @endif
                    @if(Auth::user()->hasAnyRole(['Customer']))
                        <li><a href="{{url('pos')}}"><i class="fa fa-circle-o"></i>Dashboard</a></li>
                    @endif
                </ul>
        </li>
        @if(Auth::user()->hasAnyRole(['Admin','Manager']))
        <li class="treeview">
            <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>User Management</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                @if(Auth::user()->hasAnyRole(['Admin']))
                <li><a href="{{url('admin/role/assign')}}"><i class="fa fa-circle-o"></i>User Role</a></li>
                @endif
                @if(Auth::user()->hasAnyRole(['Manager']))
                <li><a href="{{url('manager/')}}"><i class="fa fa-circle-o"></i>URL for manager</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if(Auth::user()->hasAnyRole(['Operator']))
        <li class="treeview">
            <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>Operator Menu</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                @if(Auth::user()->hasAnyRole(['Operator']))
                    <!--li><a href="{{url('pos/cr')}}"><i class="fa fa-circle-o"></i>Card Room Entry</a></li-->
                    <li><a href="{{url('pos/to')}}"><i class="fa fa-circle-o"></i>Game Chips Order</a></li>
                    <li><a href="{{url('pos/tr')}}"><i class="fa fa-circle-o"></i>Game Chips Receive</a></li>
                    <li><a href="{{url('/manage/stockreceive')}}"><i class="fa fa-circle-o"></i>Stock Receive</a></li>
                @endif
            </ul>
        </li>
        @endif


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
