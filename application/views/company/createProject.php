
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
            <li class=" ">
                <a href="<?=base_url().'/company/company' ?>">
                <i class="nc-icon nc-diamond"></i>
                <p>Dashboard</p>
                </a>
            </li>
            <li class="">
                <a href="<?=base_url().'/company/company/profileCompany' ?>">
                <i class="nc-icon nc-single-02"></i>
                <p>Profile</p>
                </a>
            </li>
            <li class="active">
                <a href="<?=base_url().'/company/company/projectsCompany' ?>">
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
            if(isset($_SESSION['compAktif'])){
                echo "Welcome back, ". $profil[0]['perusahaan_nama']."!";
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
                  <i class="nc-icon nc-settings-gear-65 "></i>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create New Project</h4>
                            <p><b>Tell Us What You Want To Do</b></p>
                        </div>
                        
                        <div class="card-body">
                            <form action="<?=base_url().'/company/company/insertProject'?>" method="post">
                            <div class="row">
                                <div class="col-md-8 pr-1">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="cth: Buatkan saya web">
                                </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-8 pr-1">
                                <div class="form-group">
                                    <label>Project Description</label>
                                    <textarea name="desc" class="form-control" placeholder="Jelaskan Projek Anda Disini"></textarea>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="categoryName">Project Category</label>
                                    <select name="categoryName" id="categoryName" class="form-control">
                                        <?php
                                        foreach ($category as $row) {
                                            ?>
                                            <option value="<?=$row->category_id?>"><?=$row->category_name?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 pr-1">
                                <div class="form-group">
                                    <label>Project Budget</label>
                                    <input type="number" class="form-control" name="budget" id="" placeholder="Budget per day">
                                    <label for="">*) make assumptions per day</label>
                                    <!-- <textarea name="budget" class="form-control" placeholder="contoh: 200000/jam"></textarea> -->
                                </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Project Start</label>
                                    <input type="date" name="start" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Project Deadline</label>
                                    <input type="date" name="deadline" class="form-control">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                <button type="submit" name="" class="btn btn-danger btn-round" value="">Create Project</button>
                                </div>
                            </div>
                            </form>
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
</body>
<script src="<?= base_url().'asset/admin' ?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url().'asset/admin' ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
    $(document).ready(function () {

    });
    
</script>
