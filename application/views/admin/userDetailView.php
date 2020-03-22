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
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url().'admin/dash'; ?>" class="nav-link">
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
            <a href="<?= base_url().'admin/userListing' ?>" class="nav-link active">
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
            <h1>Detail User</h1>
            <br>
            <a class="btn btn-warning btn-flat" href="<?= base_url().'admin/userListing'?>">Back</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url().'admin/dash'; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">User Detail View</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Detail</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <?php

                // echo "<pre>";
                // print_r($dataUser);
                // echo "</pre>";

                ?>
                <h3>User Data</h3>
                <dl class="row">
                  <dt class="col-sm-4">First Name</dt>
                  <dd class="col-sm-8"><?= $dataUser[0]['user_firstname']; ?></dd>
                  <dt class="col-sm-4">Last Name</dt>
                  <dd class="col-sm-8"><?= $dataUser[0]['user_lastname']; ?></dd>
                  <dt class="col-sm-4">Email</dt>
                  <dd class="col-sm-8"><?= $dataUser[0]['user_email']; ?></dd>
                  <dt class="col-sm-4">Username</dt>
                  <dd class="col-sm-8"><?= $dataUser[0]['user_username']; ?></dd>
                  <dt class="col-sm-4">KTP</dt>
                  <dd class="col-sm-8"><?= $dataUser[0]['user_ktp']; ?></dd>
                  <dt class="col-sm-4">Status</dt>
                  <dd class="col-sm-8">
                    <?php
                      if($dataUser[0]['user_status'] == '0'){
                        echo "<small class='badge badge-success'>Not Banned</small>";
                      }else{
                        echo "<small class='badge badge-danger'>Banned</small>";
                      }
                    ?>
                  </dd>
                </dl>
                <h3>CV Data</h3>
                <dl class="row">
                  <dt class="col-sm-4">Education</dt>
                  <dd class="col-sm-8"><?= $dataUser[0]['cv_education']; ?></dd>
                  <dt class="col-sm-4">Experience</dt>
                  <dd class="col-sm-8"><?= $dataUser[0]['cv_experience']; ?></dd>
                </dl>

                <?php
                  if($dataUser[0]['user_status'] == '0'){
                    echo "<button class='btn btn-danger btn-flat' id='btnBan'>Ban User</button>";
                  }else{
                    echo "<button class='btn btn-success btn-flat' id='btnUnban'>Unban User</button>";
                  }
                ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Other Info</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <h3>User Skills</h3>
                <hr>
                <?php
                  // print_r($userSkill);
                  foreach($userSkill as $key => $value){
                    echo '<li>' . $value['skill_name'] . '</li>';
                  }
                ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">History Projects</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <?= print_r($userProject); ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
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
<script src="<?= base_url().'asset/admin' ?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url().'asset/admin' ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
  $(document).ready(function(){
    $("#btnBan").click(function(){
      if(confirm("Are you sure?")){
        $.ajax({
          method: 'post',
          url: '<?= base_url() ?>admin/userListing/banUser',
          data: {idUser: '<?= $dataUser[0]['user_id'] ?>'},
          success: function(res){
            if(res == 'success') toastr.success('Ban Success');
            else toastr.danger('Ban Failed');
          }
        });
      }      
    });

    $("#btnUnban").click(function(){
      if(confirm("Are you sure?")){
        $.ajax({
          method: 'post',
          url: '<?= base_url() ?>admin/userListing/unBanUser',
          data: {idUser: '<?= $dataUser[0]['user_id'] ?>'},
          success: function(res){
            if(res == 'success') toastr.success('Unban Success');
            else toastr.danger('Unban Failed');
          }
        });
      }      
    });
  });
</script>
