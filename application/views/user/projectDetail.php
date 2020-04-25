
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
            <li class="active ">
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
                <a href="<?=base_url().'user/projects' ?>">
                <i class="nc-icon nc-ruler-pencil"></i>
                <p>Projects</p>
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
          <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4><?= $data[0]["project_nama"] ?><br>
                            <small>Project By <?= $data[0]['perusahaan_tipe'] ?> <?= $data[0]['perusahaan_nama'] ?></small>
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <b>Description</b>
                    <p><?= $data[0]['project_deskripsi'] ?></p>
                    <b>Budget</b>
                    <p><?= $data[0]['project_anggaran'] ?></p>
                    <b>Category</b>
                    <p><?= $data[0]['category_name'] ?></p>
                    <b>Project Start</b>
                    <p><?= date_format(date_create($data[0]['project_mulai']), 'N F Y'); ?></p>
                    <b>Project End</b>
                    <p><?= date_format(date_create($data[0]['project_deadline']), 'N F Y'); ?></p>
                    <b>Project Status</b>&nbsp;
                        <?php
                            if($data[0]['project_status'] == "0"){
                                echo "<div class='badge badge-success'>OPEN</div>";
                            }else if($data[0]['project_status'] == "1"){
                                echo "<div class='badge badge-warning'>PROGRESS</div>";
                            }else if($data[0]['project_status'] == "2"){
                                echo "<div class='badge badge-info'>DONE</div>";
                            }
                        ?>
                  <button class="btn btn-success pull-right" value="<?= $data[0]["project_id"] ?>" id="btnApply">Apply</button>
                </div>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="container">
          <div class="card">
            <div class="card-header">
              <div class="card-title">
                <h4>User Applied</h4>
              </div>
            </div>
            <div class="card-body">
              <table class='table table-bordered'>
                <thead>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Applied On</th>
                </thead>
                <tbody>
                <?php
                  foreach($user as $key => $value){
                    echo "<tr>";
                    echo "<td>$value[user_firstname] $value[user_lastname]</td>";
                    echo "<td>$value[user_email]</td>";
                    echo "<td>$value[user_alamat]</td>";
                    echo "<td>".date_format(date_create($value['created_at']), 'N F Y')."</td>";
                    echo "</tr>";
                  }
                ?>
                </tbody>
              </table>
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
    </div>
  </div>

<script>

$(document).ready(function(){
    $("#btnApply").click(function(){
        $.ajax({
            url: '<?= base_url() ?>user/takeProject',
            method: 'post',
            data: {idProject : $("#btnApply").val()},
            success: function(res){
                if(res == "SUCCESS"){
                    alert("Take Success");
                }else{
                    alert("Take Failed");
                }
            }
        });
    });
});

</script>
