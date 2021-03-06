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
          <a href="<?= base_url().'admin/ratings'; ?> " class="nav-link active">
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
            <h1>Company and User Reviews</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="<?= base_url().'admin/dash' ?>">Dashboard</a> / Reviews</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Reviews</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="tableUserReview">
                            <thead>
                                <th>Id</th>
                                <th>Reviewed User</th>
                                <th>Reviewed By</th>
                                <th>Review Desc</th>
                                <th>Ratings</th>
                            </thead>
                            <tbody id="tbUserReview">
                                
                            </tbody>
                            <tfoot>
                                <th>Id</th>
                                <th>Reviewed User</th>
                                <th>Reviewed By</th>
                                <th>Review Desc</th>
                                <th>Ratings</th>
                            </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                    <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Company Reviews</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="tableCompanyReview">
                            <thead>
                                <th>Id</th>
                                <th>Reviewed Company</th>
                                <th>Reviewed By</th>
                                <th>Review Desc</th>
                                <th>Ratings</th>
                            </thead>
                            <tbody id="tbCompanyReview">
                                
                            </tbody>
                            <tfoot>
                                <th>Id</th>
                                <th>Reviewed Company</th>
                                <th>Reviewed By</th>
                                <th>Review Desc</th>
                                <th>Ratings</th>
                            </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                    <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
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
    $.ajax({
        method: 'post',
        url: '<?= base_url() ?>admin/ratingController/getAllReviews',
        success: function(res){
            let data = JSON.parse(res);

            data.userReview.forEach(item => {
                let star = '';
                for(let i = 0; i < parseInt(item.review_user_rating); i++){
                    star += '<i class="fa fa-star text-warning"> </i>';
                }
                $("#tbUserReview").append(`
                    <tr>
                        <td>${item.review_user_id}</td>
                        <td>${item.user_firstname} ${item.user_lastname}</td>
                        <td>${item.perusahaan_nama}</td>
                        <td>${item.review_user_deskripsi}</td>
                        <td>${star}</td>
                    </tr>
                `);
            });

            data.companyReview.forEach(item => {
                let star = '';
                for(let i = 0; i < parseInt(item.review_perusahaan_rating); i++){
                    star += '<i class="fa fa-star text-warning"> </i>';
                }
                $("#tbCompanyReview").append(`
                    <tr>
                        <td>${item.review_perusahaan_id}</td>
                        <td>${item.perusahaan_nama}</td>
                        <td>${item.user_firstname} ${item.user_lastname}</td>
                        <td>${item.review_perusahaan_deskripsi}</td>
                        <td>${star}</td>
                    </tr>
                `);
            });

            $("#tableCompanyReview").DataTable();
            $("#tableUserReview").DataTable();
        }
    });
  });
</script>
