<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script src="{!!url('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js')!!}"></script>
    <!-- Custom style -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  </head>
  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">     
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-calendar-alt"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Workers</div>
        </a>
        
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
                 <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-briefcase"></i>
                        <span>Employees</span>
                    </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/employees">Employees list</a>
                <a class="collapse-item" href="/employees/create">Add new employee</a>
              </div>
            </div>
          </li>
          <!-- Nav Item - Jobs Collapse Menu -->
      <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
              <i class="fas fa-fw fa-building"></i>
              <span>Offices</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/offices">Offices list</a>
                <a class="collapse-item" href="/offices/create">Add new office</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFinances" aria-expanded="true" aria-controls="collapseFinances">
              <i class="fas fa-fw fa-money-bill-alt"></i>
              <span>Finances</span>
            </a>
            <div id="collapseFinances" class="collapse" aria-labelledby="headingFinances" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/finances">Incomes</a>
                <a class="collapse-item" href="/finances">Outcomes</a>
                <a class="collapse-item" href="/finances">Expenses</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/schedules">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Schedules</span></a>
          </li>
<!-- Divider -->
                <hr class="sidebar-divider">
            <!-- Nav Item - Salaries -->
<!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline"><button class="rounded-circle border-0" id="sidebarToggle"></button></div>
    </ul>
<!-- End of Sidebar -->
          
              <!-- Content Wrapper -->
              <div id="content-wrapper" class="d-flex flex-column">
          
                <!-- Main Content -->
                <div id="content">
          
                  <!-- Topbar -->
                  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                      <i class="fa fa-bars"></i>
                    </button>
          
                
          
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
          
                      <!-- Nav Item - User Information -->
                      <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                          <i class="fas fa-user"></i>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="profile">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                          </a>
                          <a class="dropdown-item" href="/settings">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                          </a>
                          <a class="dropdown-item" href="/activity">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                          </a>

                        </div>
                      </li>
          
                    </ul>
          
                  </nav>
<!-- End of Topbar -->

@yield('content')
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; workers.test 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">Are you sure you want to logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script type="text/javascript" src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script type="text/javascript" src="{{ asset('js/sb-admin-2.js') }}"></script>

  <!-- Page level plugins -->
  <script type="text/javascript" src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}" defer></script>
  <script type="text/javascript" src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}" defer></script>

  <!-- Page level custom scripts -->
  <script type="text/javascript" src="{{ asset('js/demo/datatables-demo.js') }}" defer></script>
<!-- Page level plugins -->

</body>

</html>          