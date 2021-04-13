<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    	@yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet preload" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet preload" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  {{-- <link href="../assets/demo/demo.css" rel="stylesheet" /> --}}
</head>

<body class="">
  <div class="wrapper ">
  	<!-- sidebar star -->
    <div class="sidebar" data-color="orange"><!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red |yellow"-->
      <div class="logo">
        
        <img src="{{ URL::to('/assets/img/cf4.png') }}" width="280" height="80">
        {{-- <h3>Coop Finder </h3> --}}
        <!--<a href="http://www.creative-tim.com" class="simple-text logo-mini">
          CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a> -->
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <!--how to set active menu link ternary operator class="{{ 'role-register' == request()->path() ? 'active' : ''}}" -->
          <li class="{{ 'dashboard' == request()->path() ? 'active' : ''}}">
            <a href="/dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- comments <li>
            <a href="./icons.html">
              <i class="now-ui-icons education_atom"></i>
              <p>Icons</p>
            </a>
          </li>end comments-->
          <li class="{{ 'admin-coop' == request()->path() ? 'active' : ''}}">
            <a href="{{ url('admin-coop') }}">
              <i class="now-ui-icons shopping_shop"></i>
              <p>Coop List</p>
            </a>
          </li> 
          <li class="{{ 'admin-user' == request()->path() ? 'active' : ''}}">
            <a href="{{ url('admin-user') }}">
              <i class="fas fa-users"></i>
              <p>User List</p>
            </a>
          </li>
          <li class="{{ 'role-register' == request()->path() ? 'active' : ''}}">
            <a href="{{ route('usr.show',Auth::user()->id) }}"> <!--edit here for user profile -->
              <i class="now-ui-icons users_single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          {{-- <li>
            <a href="./tables.html">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Table List</p>
            </a>
          </li> --}}
          <!-- <li>
            <a href="./typography.html">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Typography</p>
            </a>
          </li> 
          <li class="active-pro">
            <a href="./upgrade.html">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li> -->
        </ul>
      </div>
    </div>



    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            {{-- <a class="navbar-brand" href="#pablo">Table List</a> --}}
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('coop.create') }}">
                  {{ __('Register Coop') }}
                </a>
              </div>       
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                            </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                  </form>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->


      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
      	@yield('content')
      </div>
      {{-- <footer class="footer">
        
      </footer> --}}
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  @yield('scripts')
</body>

</html>