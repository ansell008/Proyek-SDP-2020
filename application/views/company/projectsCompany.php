
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
            <li>
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
            <div class="col-md-4">
                <form action="<?= base_url().'/company/company/createProject' ?>">
                    <button class="btn btn-warning" type="submit">Create Project</button>
                </form>
            </div>
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Projects</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                    <col width="200">
                    <col width="150">
                    <col width="180">
                        <thead>
                            <th>Project ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Budget/day</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="tbProject">
                            
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
          </div>
      </div>
      <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Projects Done</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                    <col width="200">
                    <col width="150">
                    <col width="180">
                        <thead>
                            <th>Project ID</th>
                            <th>Name</th>
                            <th>Budget/day</th>
                            <th>Date Finish</th>
                            <th>Total Employees</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="projectsDone">
                            
                        </tbody>
                    </table>
                    </div>
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
        updateTableProject();
        updateTableProjectDone();
    });
    function updateTableProjectDone(){
        $("#projectsDone").html('');

        $.ajax({
        method: 'post',
        url: '<?= base_url()."company/company/getAllProjectById" ?>',
        success: function(res){
            data = JSON.parse(res);
            data.forEach(item => {
            if(item.project_status=='2'){
              const monthNames = ["January", "February", "March", "April", "May", "June",
              "July", "August", "September", "October", "November", "December"];
              var x = new Date(item.project_deadline);
              var y = new Date(item.project_mulai);
              var tanggal_x = x.getDate(); 
              var bulan_x = monthNames[x.getMonth()]; 
              var tahun_x = x.getFullYear(); 
              let deadline_dates = tanggal_x + " "+ bulan_x + ' '+ tahun_x ;
              let durasi = x - y;
              $("#projectsDone").append(`
                  <tr id="row-${item.project_id}">
                  <td>${item.project_id}</td>
                  <td>${item.project_nama}</td>
                  <td>${item.project_anggaran}</td>
                  <td>${durasi}</td>
                  <td>${deadline_dates}</td>
                  <td> <form method='post' action='<?= base_url().'/company/company/projectsDetail' ?>'> <button type='submit' value='${item.project_id}' name='btnView' class='btnView btn btn-info'><i class="fas fa-eye"></i><b> VIEW</b></button></form> <a class="btn btn-success" href='<?= base_url() ?>company/proceedTransaction/${item.project_id}'>Proceed to Transaction</a></td>
                  </tr>
              `);
            }
            
            });
            
            $("#tableCompany").DataTable();
        }
        });
    }

    function updateTableProject(){
        $("#tbProject").html('');

        $.ajax({
        method: 'post',
        url: '<?= base_url()."company/company/getAllProjectById" ?>',
        success: function(res){
            data = JSON.parse(res);

            data.forEach(item => {
            const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];
            var x = new Date(item.project_deadline);
            var tanggal_x = x.getDate(); 
            var bulan_x = monthNames[x.getMonth()]; 
            var tahun_x = x.getFullYear(); 
            let deadline_dates = tanggal_x + " "+ bulan_x + ' '+ tahun_x ;
            let status='';
            if(item.project_status=='0')status = `<small class='badge badge-success'>OPEN</small>`;
            else if(item.project_status=='1')status = `<small class='badge badge-warning'>ON GOING</small>`;
            else status = `<small class='badge badge-danger'>DONE</small>`;
            $("#tbProject").append(`
                <tr id="row-${item.project_id}">

                <td>${item.project_id}</td>
                <td>${item.project_nama}</td>
                <td>${item.project_deskripsi}</td>
                <td>${item.project_anggaran}</td>
                <td>${deadline_dates}</td>
                <td>${status}</td>
                <td><button value='${item.project_id}' name='${item.project_nama}' class='btnEdit btn btn-primary'><i class="fas fa-edit"></i><b> EDIT</b></button> &nbsp;<br> <button value='${item.project_id}' name='${item.project_nama}' class=' btnDelete btn btn-danger'><i class="fas fa-trash"></i><b> DELETE</b></button>  &nbsp;  <form method='post' action='<?= base_url().'/company/company/projectsDetail' ?>'> <button type='submit' value='${item.project_id}' name='btnView' class='btnView btn btn-info'><i class="fas fa-eye"></i><b> VIEW</b></button></form></td>
                </tr>
            `);
            });
            $(".btnDelete").click(function(){
                var conf = confirm("Are you sure ?");
                if(conf){
                    $.ajax({
                    method: "post",
                    url: "<?= base_url().'company/company/deleteProject' ?>",
                    data: {"id" : $(this).val()},
                    success: function () {
                        toastr.success('Delete Success');
                        $("#tbCategoryData").html("");
                        updateTableProject();
                    }
                    });
                }
            });
            $(".btnEdit").click(function () {
                let tdId = $(this).val();
                $.ajax({
                    method: 'post',
                    url: '<?= base_url()."company/company/getProjectById" ?>',
                    data: {id : tdId},
                    success: function(data){
                    let item = JSON.parse(data);
                    let status='';
                    if(item[0].project_status=='0')status = `<small class='badge badge-success'>OPEN</small>`;
                    else if(item[0].project_status=='1')status = `<small class='badge badge-warning'>ON GOING</small>`;
                    else status = `<small class='badge badge-danger'>DONE</small>`;
                    $(`#row-${tdId}`).html(`
                        <td><input type='text' id='project_id-${item[0].project_id}' class='form-control' name='project_id' value='${item[0].project_id}' readonly /></td>
                        <td><input type='text' id='project_name-${item[0].project_id}' class='form-control' name='project_name' value='${item[0].project_nama}' /></td>
                        <td><textarea id='project_desc-${item[0].project_id}' class='form-control' name='project_desc' placeholder='' >${item[0].project_deskripsi}</textarea></td>
                        <td><textarea id='project_budget-${item[0].project_id}' class='form-control' name='project_budget' placeholder='' >${item[0].project_anggaran}</textarea></td>
                        <td><input type='date' id='project_deadline-${item[0].project_id}' class='form-control' name='project_deadline' /></td>
                        <td>${status}</td>
                        <td><button type='submit' class="btn btn-flat btn-success btnDone" id="${item[0].project_id}"><i class="fa fa-check"></i></button></td>
                    `);
                    $(".btnDone").click(function () {
                        let trId = $(this).attr("id");
                        let name = $(`#project_name-${trId}`).val();
                        let desc = $(`#project_desc-${trId}`).val();
                        let budget = $(`#project_budget-${trId}`).val();
                        let deadline = $(`#project_deadline-${trId}`).val();
                        $.ajax({
                            method: 'post',
                            url: '<?= base_url()."company/company/updateProjectById" ?>',
                            data: {id: trId, name: name,desc: desc, budget: budget, deadline: deadline},
                            success: function(res){
                            if(res == 'success'){
                                toastr.success('Update Success');
                                updateTableProject();
                            }
                            }
                        });
                    })

                    }
                })
            });
            
            $("#tableCompany").DataTable();
        }
        });
    }
</script>
