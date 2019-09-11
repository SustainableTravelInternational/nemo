  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      {{-- <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search..." autocomplete="false">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form --> --}}
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{ route('users') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
        <li><a href="{{ route('images') }}"><i class="fa  fa-file-image-o"></i> <span>Images</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>