<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="/img/icons/favicon-32.png" alt="{{ config('app.name', 'Mojito') }}"/></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="/img/logo.png" alt="{{ config('app.name', 'Mojito') }}" width="100"/></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">{{ __('Toggle navigation') }}</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          @include('admin.shared.notifications')
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ auth()->user()->getProfilePhoto() }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ auth()->user()->getProfilePhoto() }}" class="img-circle" alt="User Image">

                <p>
                  {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} {{{ isset(Auth::user()->role) ? ' - ' . Auth::user()->role : '' }}}
                  <small>{{ __('Member since') }} {{ Auth::user()->created_at }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('users.edit', auth()->id()) }}" class="btn btn-default btn-flat">{{ __('Profile') }}</a>
                </div>
                <div class="pull-right">
                  <a href="javascript:document.logoutForm.submit()" class="btn btn-default btn-flat">{{ __('Sign out') }}</a>
                  <form action="{{ route('logout') }}" method="POST" name="logoutForm">
                    @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>