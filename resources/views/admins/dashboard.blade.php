
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>~</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!-- Font Awesome Icons -->
  {{-- <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css"> --}}
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> --}}
  <link rel="stylesheet" href={{asset('css/app.css')}}>

  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini" >
<div class="wrapper" id = "app">


  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="img/bag.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PBCPortal 
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <nav class="mt-2 user-panel">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <img src = "img/admin.png">
                <p> {{Auth::user()->last_name}}, {{Auth::user()->first_name}} <i class="right fas fa-angle-left"></i>
                </p> 
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        {{-- {{Auth::user()->roles[0]["name"]}} --}}
                      </a>
                    </li>
                <li class="nav-item">
                  <router-link to="/profile" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p> My Profile </p> 
                  </router-link>
                </li>
                <li class="nav-item">
                {{-- <a href="{{route('logout')}}" class="nav-link" onClick="event.prefentDefault(); document.getElementById(">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p> Logout </p>
                  </a> --}}
                  <a class="nav-link" href="{{ route('admin.logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   <i class="fa fa-circle-o nav-icon"></i>
                   <p> Logout </p>
               </a> 

               <form id="logout-form" action="{{ route('logout') }}" method="POST">
                   @csrf
               </form>
                </li>
              </ul>
            </li>
          </ul>
        </nav>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/administrations" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Administrations
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/bloodInventory" class="nav-link">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Blood Inventory
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/bloodRequest" class="nav-link">
              <i class="nav-icon fas fa-angle-double-right"></i>
              <p>
                Blood Request
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/donorsAgencies" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Donors and Agencies
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/demandPlanning" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Blood Demand Planning
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/bloodPrograms" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Blood Programs
              </p>
            </router-link>
          </li>
          <li class="nav-item">
              <router-link to="/reports" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>
                  Report Generation
                </p>
              </router-link>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  
        <router-view> </router-view>
        <vue-progress-bar></vue-progress-bar>
  


  <!-- Main Footer -->
  <footer class="main-footer">
   {{-- --}}
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
{{-- <script src="plugins/jquery/jquery.min.js"></script> --}}
<!-- Bootstrap 4 -->
{{-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
<!-- AdminLTE App -->
{{-- <script src="dist/js/adminlte.min.js"></script>  --}}
<script src = {{asset('js/app.js')}}> </script>
{{-- <script src="vuelidate/dist/vuelidate.min.js"></script> --}}

    {{-- <script type="text/javascript">
    GoogleCharts.load(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Supply', 'Demand'],
          ['WB',  1000,      400],
          ['PR',  1170,      460],
          ['PC',  660,       1120],
          ['FFP',  1030,      540],
          ['CRYOP',  1030,      540],
          ['CRYOS',  1030,      540]
        ]);

        var options = {
          title: '',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script> --}}
</body>
</html>
