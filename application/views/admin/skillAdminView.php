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
            <h1>Skills Listing</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="<?= base_url().'admin/dash' ?>">Dashboard</a> / Skills</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col col-sm-12 col-md-6">
            <!-- Default box -->
            <form id="insertNewSkill" method="post">
              <div class="card card-info card-hidden" id="cardNewSkill">
                <div class="card-header">
                  <h3 class="card-title">New Skill</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                      <label for="skillName">Skill Name</label>
                      <input type="text" class="form-control" name="skillName" id="skillName" placeholder="Enter Skill Name">
                    </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success btn-flat">Add</button>
                </div>
                <!-- /.card-footer-->
              </div>
            </form>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Skills</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped" id="tableSkill">
                  <thead>
                    <th>Id</th>
                    <th>Skill Name</th>
                    <th>Action</th>
                  </thead>
                  <tbody id="tbSkillData">
                    
                  </tbody>
                  <tfoot>
                    <th>Id</th>
                    <th>Skill Name</th>
                    <th>Action</th>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button id='addNewSkill' class='btn btn-flat btn-success'>Add New Skill</button>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

    <!-- <div id="toast-container" class="toast-top-right">
      <div class="toast toast-success" aria-live="polite" style="display: block;">
        <div class="toast-title">toast</div>
        <div class="toast-message">success</div>
      </div>
    </div> -->
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
    loadDataSkill();

    $("#insertNewSkill").submit(function(e){
      e.preventDefault();
      let name = $("#skillName").val();

      $.ajax({
        method: 'post',
        url: '<?= base_url()."admin/skillAdmin/addNewSkill" ?>',
        data: {name: name},
        success: function(res){
          if(res == 'success'){
            toastr.success('Insert Success')
          }else{
            toastr.danger('Insert Failed')
          }
          loadDataSkill();
          $("#insertNewSkill").addClass('card-hidden');
        }
      });
    });

    $("#addNewSkill").click(function(){
      $("#cardNewSkill").removeClass('card-hidden');
    });

    $("#tbSkillData").on('click', '.btn-edit', function(){
      let tdId = $(this).attr('id');

      $.ajax({
        method: 'post',
        url: '<?= base_url()."admin/skillAdmin/getById" ?>',
        data: {id : tdId},
        success: function(data){
          let item = JSON.parse(data);
          
          $(`#row-${tdId}`).html(`
            <td><input type='text' id='skill_id-${item[0].skill_id}' class='form-control' name='skill_id' value='${item[0].skill_id}' readonly /></td>
            <td><input type='text' id='skill_name-${item[0].skill_id}' class='form-control' name='skill_name' value='${item[0].skill_name}' /></td>
            <td><button type='submit' class="btn btn-flat btn-success btn-done" id="${item[0].skill_id}"><i class="fa fa-check"></i></button></td>
          `);
        }
      })
    });

    $("#tbSkillData").on('click', '.btn-done', function(){
      let trId = $(this).attr("id");
      let name = $(`#skill_name-${trId}`).val();

      console.log(name);

      $.ajax({
        method: 'post',
        url: '<?= base_url()."admin/skillAdmin/updateById" ?>',
        data: {id: trId, name: name},
        success: function(res){
          if(res == 'success'){
            toastr.success('Update Success');
            loadDataSkill();
          }
        }
      });
    });

    $("#tbSkillData").on('click', '.btn-delete', function(){
      let id = $(this).attr('id');
      
      if(confirm('ARE YOU SURE?')){
        $.ajax({
          method: 'post',
          url: '<?= base_url()."admin/skillAdmin/deleteById" ?>',
          data: {id: id},
          success: function(res){
            if(res == 'success'){
              toastr.success('Delete Success')
            }else{
              toastr.danger('Delete Failed')
            }
            loadDataSkill();
          }
        });
      }
    });
  });

  function loadDataSkill(){
    $("#tbSkillData").html("");
    $.ajax({
      method: 'post',
      url: '<?= base_url()."admin/skillAdmin/getAll" ?>',
      success: function(res){
        res = JSON.parse(res);

        res.forEach(item => {
          $("#tbSkillData").append(`
            <tr id="row-${item.skill_id}" class="tbRow">
              <td>${item.skill_id}</td>
              <td>${item.skill_name}</td>
              <td><button class="btn btn-flat btn-warning btn-edit" id="${item.skill_id}"><i class="fa fa-edit"></i></button> <button class="btn btn-flat btn-danger btn-delete" id="${item.skill_id}"><i class="fa fa-trash"></i></button></td>
            </tr>
          `);
        });

        $("#tableSkill").DataTable();
      }
    });
  }
</script>
