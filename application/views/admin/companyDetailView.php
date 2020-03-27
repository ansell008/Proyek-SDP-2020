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
            <a href="<?= base_url().'admin/userListing' ?>" class="nav-link">
              <i class="nav-icon fas fa-check-square"></i>
              <p>
                Freelance Listing
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url().'admin/companyListing'; ?> " class="nav-link active">
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
            <h2>Detail Company</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="<?= base_url().'admin/dash' ?>">Dashboard</a> / Company Listing</li>
            </ol>
          </div>
          <div class="col-sm-4">
            <a href="<?=base_url()."admin/companyListing"?>" class="btn btn-warning">Back</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-7">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><?= $_SESSION['comView'][0]['perusahaan_nama'] ?></h2>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <ul class="list-group detailCompany">
                  <li class="list-group-item list-group-item-warning"><b>ID</b> : <?= $_SESSION['comView'][0]['perusahaan_id']?></li>
                  <li class="list-group-item list-group-item-warning"><b>Type </b> : <?= $_SESSION['comView'][0]['perusahaan_tipe']?></li>
                  <li class="list-group-item list-group-item-warning"><b>Email </b> : <?= $_SESSION['comView'][0]['perusahaan_email']?></li>
                  <li class="list-group-item list-group-item-warning"><b>Address</b> : <?= $_SESSION['comView'][0]['perusahaan_alamat']?></li>
                  <li class="list-group-item list-group-item-warning"><b>Phone Number</b> : <?= $_SESSION['comView'][0]['perusahaan_telp']?></li>
                  <li class="list-group-item list-group-item-warning"><b>NPWP Number</b> : <?= $_SESSION['comView'][0]['perusahaan_npwp']?></li>
                  <li class="list-group-item list-group-item-warning"> <b>Company Status</b> : <?php
                   if($_SESSION['comView'][0]['perusahaan_status'] == 0) {
                     echo "Active";
                   }else{
                     echo "Banned";
                   }
                  ?></li>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <?php
                  if($_SESSION['comView'][0]['perusahaan_status'] == 0) {
                  ?>
                    <button id="btnStatus" name="btnStatus" value="<?= $_SESSION['comView'][0]['perusahaan_id']?>" class="btn btn-danger btnStatus">Banned <i class="fa fa-times"></i></button>
                  <?php
                  }else{
                  ?>
                    <button id="btnStatus1" name="btnStatus1" value="<?= $_SESSION['comView'][0]['perusahaan_id']?>" class="btn btn-success btnStatus">Active <i class="fa fa-check"></i></button>
                  <?php
                  }

                ?>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-5">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Active Project</h2>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <ul class="list-group" id="ProjectActive">
                </ul>
              </div>
              <div class="card-header">
                <h2 class="card-title">Project on going</h2>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <ul class="list-group" id="ProjectOnGoing">
                </ul>
              </div>
              <div class="card-header">
                <h2 class="card-title">Project Done</h2>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <ul class="list-group" id="ProjectDone">
                </ul>
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
  <div id="detailViewProject">

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
    // updateTableCompany();
    updateProjectCompany();
    $(".btnStatus").click(function () {
      $.ajax(
        {
          method : "post",
          url : '<?= base_url().'admin/companyListing/updateStatus' ?>',
          data : {"status" : $(this).val()},
          success : function(){
            toastr.success('Update Success');
          }
        }
      );
    });
    

    
    
  });
  function updateProjectCompany(){
    $.ajax({
      method: 'post',
      url: '<?= base_url()."admin/companyListing/getAllProjectById" ?>',
      data : {"perusahaan_id" : <?= $_SESSION['comView'][0]['perusahaan_id'] ?>},
      success: function(res){
        data = JSON.parse(res);
        let ctr = 0;
        data.forEach(
          item => {
            ctr++;
            var x = new Date(item.project_mulai);
            var y = new Date(item.project_deadline);

            const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];
            // var jam_x = x.getHours();
            // var menit_x = x.getMinutes();
            // var jam_y = y.getHours();
            // var menit_y = y.getMinutes();
            var tanggal_x = x.getDate(); 
            var tanggal_y = y.getDate(); 
            var bulan_x = monthNames[x.getMonth()]; 
            var bulan_y = monthNames[y.getMonth()]; 
            var tahun_x = x.getFullYear(); 
            var tahun_y = y.getFullYear(); 
            let start_dates = tanggal_x + "-"+ bulan_x + '-'+ tahun_x ;
            let deadline_dates = tanggal_y + "-"+ bulan_y + '-'+ tahun_y ;
            if(item.project_status == '0'){
              // console.log("masyuk");
              $("#ProjectActive").append(`
              <li class="list-group-item">${item.project_nama} <button value="${ctr}" class="btn btn-primary float-right viewDetail">View</button></li>
              `);
              $("#detailViewProject").append(`
              <div counter="${ctr}" class="modal fade bd-example-modal-lg" id="myModal${ctr}" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Detail Project</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                  <ul class="list-group detailCompany">
                    <li class="list-group-item "><b>ID</b> : ${item.project_id}</li>
                    <li class="list-group-item "><b>Name </b> : ${item.project_nama} </li>
                    <li class="list-group-item "><b>Description </b> : ${item.project_deskripsi} </li>
                    <li class="list-group-item "><b>Budget Detail</b> : ${item.project_anggaran} </li>
                    <li class="list-group-item "><b>Start Date</b> : ${start_dates} </li>
                    <li class="list-group-item "><b>Deadline</b> : ${deadline_dates} </li>
                    
                  </ul>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                
              </div></div>
              `);
              
            }else if(item.project_status=='1'){
              $("#ProjectOnGoing").append(`
              <li class="list-group-item">${item.project_nama} <button value="${ctr}" class="btn btn-primary float-right viewDetail">View</button> </li>
              `);
              $("#detailViewProject").append(`
              <div class="modal fade bd-example-modal-lg" id="myModal${ctr}" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Detail Project</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                  <ul class="list-group detailCompany">
                    <li class="list-group-item "><b>ID</b> : ${item.project_id}</li>
                    <li class="list-group-item "><b>Name </b> : ${item.project_nama} </li>
                    <li class="list-group-item "><b>Description </b> : ${item.project_deskripsi} </li>
                    <li class="list-group-item "><b>Budget Detail</b> : ${item.project_anggaran} </li>
                    <li class="list-group-item "><b>Start Date</b> : ${start_dates} </li>
                    <li class="list-group-item "><b>Deadline</b> : ${deadline_dates} </li>
                    
                  </ul>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                
              </div></div>
              `);
              $(".viewDetail").click(function(){
                $("#myModal"+$(this).val()).modal();
              });
              
            }else if(item.project_status=='2'){
              $("#ProjectDone").append(`
              <li class="list-group-item">${item.project_nama} <button value="${ctr}" class="btn btn-primary float-right viewDetail">View</button> </li>
              `);
              $("#detailViewProject").append(`
              <div class="modal fade bd-example-modal-lg" id="myModal${ctr}" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Detail Project</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                  <ul class="list-group detailCompany">
                    <li class="list-group-item "><b>ID</b> : ${item.project_id}</li>
                    <li class="list-group-item "><b>Name </b> : ${item.project_nama} </li>
                    <li class="list-group-item "><b>Description </b> : ${item.project_deskripsi} </li>
                    <li class="list-group-item "><b>Budget Detail</b> : ${item.project_anggaran} </li>
                    <li class="list-group-item "><b>Start Date</b> : ${start_dates} </li>
                    <li class="list-group-item "><b>Deadline</b> : ${deadline_dates} </li>
                    
                  </ul>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                
              </div></div>
              `);
              $(".viewDetail").click(function(){
                $("#myModal"+$(this).val()).modal();
              });
              
            }
            
          
        });
        
      }
    });
  }
  

</script>
