<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-dark bg-orange">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cogs"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"><i class="fas fa-user-cog"></i> Edit Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= base_url().'admin/authAdmin/logout'; ?>"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
          </div>
        </li>
    </ul>

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-orange elevation-2">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?= base_url().'asset/img/logo.png'; ?>"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Kerja.in</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url().'asset/admin'; ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['aktif'][0]['admin_username']?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url().'admin/dash'; ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php
            if($_SESSION['aktif'][0]['role'] == 1){
          ?>
            <li class="nav-item">
              <a href="<?= base_url().'admin/authAdmin' ?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Auth
                </p>
              </a>
            </li>
          <?php
            }
          ?>
          <li class="nav-item">
            <a href="<?= base_url().'admin/userListing' ?>" class="nav-link">
              <i class="nav-icon fas fa-check-square"></i>
              <p>
                Freelance Listing
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().'admin/companyListing'; ?> " class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Company Listing
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().'admin/categoryAdmin'; ?> " class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href=<?= base_url().'admin/subCategoryAdmin'; ?> class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Sub - Category
                </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?= base_url().'admin/skills'; ?> " class="nav-link">
              <i class="nav-icon fas fa-lightbulb"></i>
              <p>
                Skills
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?= base_url().'admin/ratings'; ?> " class="nav-link">
              <i class="nav-icon fas fa-star"></i>
              <p>
                Reviews
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Your Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="<?= base_url().'admin/dash' ?>">Dashboard</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New User</span>
                <span class="info-box-number" id="numNewUser"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-briefcase"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Company</span>
                <span class="info-box-number" id="numNewCompany"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tasks"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Projects Created</span>
                <span class="info-box-number" id="projectCreated"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Projects Finished</span>
                <span class="info-box-number" id="projectFinished"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">User, Company, Projects Created by Months</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 328px;" width="328" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <h6>X : Months</h6>
                  <h6>Y : Number of Users Created</h6>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2020 Kerja.in</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="<?= base_url().'asset/admin' ?>/plugins/chart.js/Chart.min.js"></script>


<script>
  $(document).ready(function(){
    getDataPerMonth();
    getData();
  });

  function getDataPerMonth(){
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>admin/summaryAdmin/getDataPerMonth',
      success: function(res){
        let countCompany = [];
        let countUser = [];
        let countProject = [];
        let data = JSON.parse(res);
        data.company.forEach(item => {
          countCompany.push(item[0].count);
        });
        data.user.forEach(item => {
          countUser.push(item[0].count);
        });
        data.project.forEach(item => {
          countProject.push(item[0].count);
        });

        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        var areaChartData = {
          labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          datasets: [
            {
              label               : 'Project',
              backgroundColor     : '#17a2b8',
              borderColor         : '#17a2a0',
              pointRadius         : false,
              pointColor          : 'rgba(210, 214, 222, 1)',
              pointStrokeColor    : '#c1c7d1',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data                : countProject
            },
            {
              label               : 'User',
              backgroundColor     : '#20c997',
              borderColor         : '#20c700',
              pointRadius         : false,
              pointColor          : 'rgba(210, 214, 222, 1)',
              pointStrokeColor    : '#c1c7d1',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data                : countUser
            },
            {
              label               : 'Company',
              backgroundColor     : '#e83e8c',
              borderColor         : '#e83e8c',
              pointRadius         : false,
              pointColor          : 'rgba(210, 214, 222, 1)',
              pointStrokeColor    : '#c1c7d1',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data                : countCompany
            },
          ]
        }

        var areaChartOptions = {
          maintainAspectRatio : false,
          responsive : true,
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              gridLines : {
                display : false,
              }
            }],
            yAxes: [{
              gridLines : {
                display : false,
              }
            }]
          }
        }

        // This will get the first returned node in the jQuery collection.
        var areaChart       = new Chart(areaChartCanvas, { 
          type: 'line',
          data: areaChartData, 
          options: areaChartOptions
        })
      }
    });
  }

  function getData(){
    $.ajax({
      method: 'post',
      url: '<?= base_url() ?>admin/summaryAdmin/getSummary',
      success: function(res){
        let data = JSON.parse(res);
        $("#numNewUser").html(data['countUser'][0].jumlahUser);
        $("#numNewCompany").html(data['countPerusahaan'][0].jumlahPerusahaan);
        $("#projectCreated").html(data['countProject'][0].jumlahProject);
        $("#projectFinished").html(data['countFinishedProject'][0].jumlahProjectFinish);
      }
    });
  }
</script>
