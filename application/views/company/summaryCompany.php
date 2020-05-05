<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?= base_url().'asset/img/logo.png'; ?>">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="<?= base_url(); ?>" class="simple-text logo-normal">
          Kerja.In
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>

      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class=>
            <a href="<?=base_url().'company/dashComp' ?>">
              <i class="nc-icon nc-diamond"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="">
            <a href="<?=base_url().'company/myprofile' ?>">
              <i class="nc-icon nc-single-02"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="">
            <a href="<?=base_url().'company/myprojects' ?>">
              <i class="nc-icon nc-ruler-pencil"></i>
              <p>Projects</p>
            </a>
          </li>
          <li>
            <a href="<?= base_url().'company/transaction' ?>">
              <i class="nc-icon nc-credit-card"></i>
              <p>Transaction</p>
            </a>
          </li>
          <li class="active ">
            <a href="<?= base_url().'company/summary' ?>">
              <i class="nc-icon nc-diamond"></i>
              <p>Summary</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-light bg-danger">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;"><?php
            if(isset($_SESSION['compAktif'])){
                echo "Welcome back, ". $_SESSION['compAktif']['data'][0]['perusahaan_nama']."!";
            }
             ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?= base_url().'/authUser/logout' ?>">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">

      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Summary Projects</h3>
            </div>
            <div class="card-body">
              <div class="chart">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <canvas id="areaChart"
                  style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 328px;"
                  width="328" height="250" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
          </div>
        </div>
      </div>

        <footer class="main-footer">
          <div class="float-right d-none d-sm-block">
            <b>Version</b> 0.0.1
          </div>
          <strong>Copyright &copy; 2020 Kerja.in</strong> All rights
          reserved.
        </footer>

        <script src="<?= base_url().'asset/admin' ?>/plugins/chart.js/Chart.min.js"></script>

        <script>

          $(document).ready(function(){
            showChart();
          });

          function showChart(){
              $.ajax({
                method: 'post',
                url: '<?= base_url() ?>company/getSummary',
                data: {id : '<?= $_SESSION['compAktif']['data'][0]['perusahaan_id'] ?>'},
                success: function(res){
                  let data = JSON.parse(res);

                  let countprj = [data['done'], data['ongoing']];

                  var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

                  var areaChartData = {
                    labels  : ['Project'],
                    datasets: [
                      {
                        label               : 'Done',
                        backgroundColor     : '#17a2b8',
                        borderColor         : '#17a2a0',
                        pointRadius         : false,
                        pointColor          : ['rgba(210, 214, 222, 1)'],
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : data['done']
                      },
                      {
                        label               : 'OnGoing',
                        backgroundColor     : '#20c997',
                        borderColor         : '#20c700',
                        pointRadius         : false,
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : data['ongoing']
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
                    type: 'bar',
                    data: areaChartData, 
                    options: areaChartOptions
                  })
                }
              });
          }
        
        </script>
      </div>
    </div>
</body>

</html>