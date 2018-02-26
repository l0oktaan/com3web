@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        @include('backpack::inc.sidebar_user_panel')

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          {{-- <li class="header">{{ trans('backpack::base.administration') }}</li> --}}
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
          <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>
          <li><a href="{{ url('admin/product') }}"><i class="fa fa-files-o"></i> <span>Product Manager</span></a></li>
          <li><a href="{{ url('admin/category') }}"><i class="fa fa-files-o"></i> <span>Category Manager</span></a></li>
          
          <!-- ======================================= -->
          {{-- <li class="header">Other menus</li> --}}
          <li class="treeview">
            <a href="#"><i class="fa fa-user"></i> <span>Editor Manager</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ backpack_url('editor') }}"><i class="fa fa-user"></i> <span>Editor</span></a></li>
              <li><a href="{{ backpack_url('depart') }}"><i class="fa fa-files-o"></i> <span>Depart</span></a></li>
            </ul>
        </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
