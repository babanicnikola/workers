@extends('layout') 
    @section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <div class="row">
          <!-- Salaries Card -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Salaries</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">${{number_format( $salaries )}}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$0</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Number of offices Card -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Offices</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $numoff }}</div>
                      </div>
                      
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-building fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Total employees Card -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total employees</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $numemp }}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-user-md fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- CHARTS -->
      <div class="row">

          <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="myAreaChart"></canvas>
                </div>
              </div>
            </div>

          </div>

          <!-- Donut Chart -->
          <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-pie pt-4">
                  <canvas id="myPieChart"></canvas>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      <!-- CHARTS END -->
      </div><!-- Container fluid END -->
<!-- Charts scripts -->
<script type="text/javascript" src="{{ asset("vendor/chart.js/Chart.min.js") }}" defer></script>
<script type="text/javascript" src="{{ asset("js/demo/chart-area-demo.js") }}" defer></script>
<script type="text/javascript" src="{{ asset("js/demo/chart-pie-demo.js") }}" defer></script>

@endsection