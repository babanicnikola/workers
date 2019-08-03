<div id="sidebar_toggle_loader" style="display:none;">

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
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
</div>