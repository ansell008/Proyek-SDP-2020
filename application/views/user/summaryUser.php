
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
            <li class="">
                <a href="<?=base_url().'user/dash' ?>">
                <i class="nc-icon nc-diamond"></i>
                <p>Dashboard</p>
                </a>
            </li>
            <li class="">
                <a href="<?=base_url().'user/profile' ?>">
                <i class="nc-icon nc-single-02"></i>
                <p>Profile</p>
                </a>
            </li>
            <li class="">
                <a><i class="nc-icon nc-ruler-pencil"></i>Projects</a>
                <ul class="">
                  <li> <a class="dropdown-item" href="<?=base_url().'user/projects' ?>">Search</a></li>
                  <li><a class="dropdown-item" href="<?=base_url().'user/myprojects' ?>">My Project</a></li>
                </ul>
            </li>
            <li class="active">
                <a href="<?=base_url().'user/summaryUser' ?>">
                <i class="nc-icon nc-single-02"></i>
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
            if(isset($_SESSION['userAktif'])){
                echo " Welcome back, ". $_SESSION['userAktif'][0]['user_firstname']." ". $_SESSION['userAktif'][0]['user_lastname'] ."!";
            }
             ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
              <!-- <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li> -->
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?= base_url().'/authUser/logoutUser' ?>">Logout</a>
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
            <div class="card">
              <div class="card-header">
                <h3>Generate Report Income By Date</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="">Date</label>
                  <input class="form-control" type="date" name="" id="dateGenerate">
                </div>
                <div class="form-group">
                  <button class="btn btn-info" id="btnGenerate">Generate</button>
                </div>
                <div class="table-responsive">
                    <table class="table" id="tableSum">
                        <thead>
                            <th>Project ID</th>
                            <th>Company Name</th>
                            <th>Project Name</th>
                            <th>Project Budget</th>
                            <th>Duration</th>
                            <th>Project Status</th>
                            <th>Total Income</th>
                        </thead>
                        <tbody id="tbProject">
                            
                        </tbody>
                    </table>
                  </div>
              </div>
            </div>

          </div>
        </div>
        
         
        <div id="box" style="display: none">
          <script src="<?= base_url().'asset/admin' ?>/plugins/chart.js/Chart.js"></script>
          <canvas id="myChart"></canvas>
   
    
        </div>

      
      <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
        <b>Version</b> 0.0.1
        </div>
        <strong>Copyright &copy; 2020 Kerja.in</strong> All rights
        reserved.
      </footer>
    </div>
  </div>

  <style>
    a:hover{
      text-decoration: none;
      color: black;
      box-shadow: 5px 5px;
    }
    #box {
        border: 2px solid black;
        padding: 20px;
        width: 600px;
        height: auto;
        }
  </style>

<script>
$(window).ready(function(){
  
  $("#btnGenerate").click(function () {
    summaryUser();
  })
});

function summaryUser(){
        $("#tbProject").html('');

        $.ajax({
          method: 'post',
          url: '<?= base_url()."user/userController/getSummaryData" ?>',
          data: {date:$("#dateGenerate").val()},
          success: function(res){
              data = JSON.parse(res);
              data.forEach(item => {
                // const monthNames = ["January", "February", "March", "April", "May", "June",
                // "July", "August", "September", "October", "November", "December"];
                // var x = new Date(item.project_deadline);
                // var y = new Date(item.project_mulai);
                // var tanggal_x = x.getDate(); 
                // var bulan_x = monthNames[x.getMonth()]; 
                // var tahun_x = x.getFullYear(); 
                // let deadline_dates = tanggal_x + " "+ bulan_x + ' '+ tahun_x ;
                // let durasi = x - y;
                // let status='';
                if(item.project_status=='0')status = `<small class='badge badge-success'>OPEN</small>`;
                else if(item.project_status=='1')status = `<small class='badge badge-warning'>ON GOING</small>`;
                else status = `<small class='badge badge-danger'>DONE</small>`;
                let subtotal = (item.durasi*item.project_anggaran);
                $("#tbProject").append(`
                    <tr id="row-${item.project_id}">
                    <td>${item.project_id}</td>
                    <td>${item.perusahaan_nama}</td>
                    <td>${item.project_nama}</td>
                    <td>${item.project_anggaran}</td>
                    <td>${item.durasi} days</td>
                    <td>${status}</td>
                    <td>${subtotal}</td>
                    </tr>
                `);
              
              });
              
              $("#tableSum").DataTable();
          }
        });
    }
        
function chartLama(){
  var ctx = document.getElementById('myChart').getContext('2d');
        var tahunawal=new Date();
        var tahun= tahunawal.getFullYear();
        var tahunakhir=2020;
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun','Jul','Aug','Sep','Okt','Nov','Des'],
                datasets: [{
                    label: 'Report Proyek yang Diapply pada Tahun '+tahun,
                    data: [
                            <?= $data[0][0]["bid"] ?>, <?= $data[1][0]["bid"] ?>,
                            <?= $data[2][0]["bid"] ?>,<?= $data[3][0]["bid"] ?>, 
                            <?= $data[4][0]["bid"] ?>, <?= $data[5][0]["bid"] ?>,
                            <?= $data[6][0]["bid"] ?>, <?= $data[7][0]["bid"] ?>,
                            <?= $data[8][0]["bid"] ?>, <?= $data[9][0]["bid"] ?>,
                            <?= $data[10][0]["bid"] ?>, <?= $data[11][0]["bid"] ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                       
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
}        
</script>
