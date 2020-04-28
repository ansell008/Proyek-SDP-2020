
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
                <a href="<?=base_url().'company/company' ?>">
                <i class="nc-icon nc-diamond"></i>
                <p>Dashboard</p>
                </a>
            </li>
            <li class="">
                <a href="<?=base_url().'company/company/profileCompany' ?>">
                <i class="nc-icon nc-single-02"></i>
                <p>Profile</p>
                </a>
            </li>
            <li class="">
                <a href="<?=base_url().'company/company/projectsCompany' ?>">
                <i class="nc-icon nc-ruler-pencil"></i>
                <p>Projects</p>
                </a>
            </li>
            <li class="active">
                <a href="<?= base_url().'company/transaction' ?>">
                  <i class="nc-icon nc-credit-card"></i>
                  <p>Transaction</p>
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
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h2>Transaction Detail</h2>
                </div>
            </div>
            <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Project Name : </b> <?= $project[0]['project_nama'] ?></li>
                <li class="list-group-item"><b>Description : </b> <?= $project[0]['project_deskripsi'] ?></li>
                <li class="list-group-item"><b>Project Created By : </b> <?= $project[0]['perusahaan_nama'] ?>
                </li>
                <?php 
                    $date = date_diff(date_create($project[0]['project_mulai']), date_create($project[0]['project_deadline']));
                    $amount = $project[0]['project_anggaran'] * $date->days * $count[0]['jumlah'];

                    $formated_amount = "Rp " . number_format($amount,2,',','.');
                ?>
                <li class="list-group-item"><b>Amount to Pay: </b> <?= $formated_amount ?></li>
            </ul>
            <br>
            <table class="table table-bordered">
                <thead>
                    <th>Participant Name</th>
                    <th>Amount To Pay</th>
                </thead>
                <tbody>
                    <?php
                        foreach($pekerja as $key => $value){
                            echo "<tr>";
                            echo "<td>$value[user_firstname] $value[user_lastname]</td>";
                            echo "<td>Rp ".number_format($project[0]['project_anggaran'] * $date->days,2,',','.')."</td>";
                            echo "</tr>";
                        }
                    ?>
                    <tr>
                        <th>TOTAL</th>
                        <th><?= $formated_amount ?></th>
                    </tr>
                </tbody>
            </table>
            <button id='pay-button'>Pay</button>
            </div>
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

  <script>
      $(document).ready(function(){
        
        $("#pay-button").click(function(event){
          event.preventDefault();
          $(this).attr("disabled", "disabled");
          $.ajax({
            method: "post",
            url: '<?= base_url() ?>payment/paymentController/token',
            data: {idProject : "<?= $project[0]['project_id'] ?>"},
            success: function(res){
              snap.pay(res, {
                onSuccess: function(result){
                  console.log(result.status_message);
                  console.log(result);
                },
                onPending: function(result){
                  console.log(result.status_message);
                },
                onError: function(result){
                  console.log(result.status_message);
                }
              });
            }
          });
        }); 
      });
  </script>
</body>

</html>
