<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
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
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url().'dash'; ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                <h3 class="card-title">List Category</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover" id="db1">
                  <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                  </thead>

                  <tbody id="tbCategoryData">
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button class="btn btn-success btn-flat" data-toggle="modal" data-target="#exampleModal" id="btnNewCategory">New Category</button>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col col-sm-12 col-md-6">
           
            <!-- Default box -->
            <form id="insertNewCategory" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label for="nameNewCategory">Nama</label>
                          <input type="text" class="form-control" name="nameNewCategory" id="usernameNewAdmin" placeholder="Enter Category Name">
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success btn-flat">Add</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <form id="updateCategory" method="post">
              <div class="card card-info card-hidden" id="cardUpdateCategory">
                <div class="card-header">
                  <h3 class="card-title">Update Category</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                      <label for="idCategoryUpdate">ID</label>
                      <input type="text" class="form-control" name="idCategoryUpdate" id="idCategoryUpdate" readonly>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                      <label for="nameCategory">Old Name</label>
                      <input type="text" class="form-control" name="nameCategory" id="nameCategory" readonly>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                      <label for="nameCategoryUpdate">New Name</label>
                      <input type="text" class="form-control" name="nameCategoryUpdate" id="nameCategoryUpdate" placeholder="Update Category Name">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success btn-flat">Update</button>
                </div>
                <!-- /.card-footer-->
              </div>
            </form>
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
    updateTableCategory();

    $("#btnNewCategory").click(function(){
      // $("#cardNewCategory").removeClass('card-hidden');
    });

    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
    })

    

    $("#insertNewCategory").submit(function(e){
      e.preventDefault();
      $.ajax({
        method : "post",
        url : '<?= base_url()."admin/categoryAdmin/insertNewCategory"; ?>',
        data : $("#insertNewCategory").serialize(),
        success : function(){
          toastr.success('Insert Success');
          $("#tbCategoryData").html('');
          updateTableCategory();
        }
      });
    });
    $("#updateCategory").submit(function (e) {
      e.preventDefault();
      $.ajax({
          method: "post",
          url: "<?= base_url().'admin/categoryAdmin/updateCategory' ?>",
          data : $("#updateCategory").serialize(),
          success : function(){
            toastr.success('Update Success');
            $("#tbCategoryData").html('');
            updateTableCategory();
          }
        });
    })
  });

  function updateTableCategory(){
    $.ajax({
      method: "post",
      url: "<?= base_url().'admin/categoryAdmin/getAll' ?>",
      success: function(res){
        let adminData = JSON.parse(res);

        adminData.forEach(data => {
          $("#tbCategoryData").append(`
            <tr>
              <td>${data.category_id}</td>
              <td>${data.category_name}</td>
              <td><button value='${data.category_id}' name='${data.category_name}' class='btnEdit btn btn-primary'><i class="fas fa-edit"></i></button> &nbsp; <button value='${data.category_id}' name='${data.category_name}' class=' btnDelete btn btn-danger'><i class="fas fa-trash"></i></button></td>
            </tr>
          `);
        });
        $(".btnEdit").click(function(){
          $("#cardUpdateCategory").removeClass('card-hidden');
          $("#idCategoryUpdate").val($(this).val());
          $("#nameCategory").val($(this).attr("name"));
          
        });
        $(".btnDelete").click(function(){
          var conf = confirm("Are you sure ?");
          if(conf){
            $.ajax({
              method: "post",
              url: "<?= base_url().'admin/categoryAdmin/deleteCategory' ?>",
              data: {"id" : $(this).val()},
              success: function () {
                toastr.success('Delete Success');
                $("#tbCategoryData").html("");
                updateTableCategory();
              }
            });
          }
          
        });
        $("#db1").DataTable();
      }
    }); 
  }
</script>
