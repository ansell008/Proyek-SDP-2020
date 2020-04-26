
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
            <div class="dropdown">
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="nc-icon nc-ruler-pencil"></i>Projects</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?=base_url().'user/projects' ?>">Search</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?=base_url().'user/myprojects' ?>">My Project</a>
                </div>
            </li>
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
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Detail Projects</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>ID : </b> <?= $projectDetail[0]['project_id'] ?></li>
                        <li class="list-group-item"><b>Name : </b> <?= $projectDetail[0]['project_nama'] ?></li>
                        <li class="list-group-item"><b>Description : </b> <?= $projectDetail[0]['project_deskripsi'] ?></li>
                        <li class="list-group-item"><b>Budget : </b> <?= $projectDetail[0]['project_anggaran'] ?></li>
                        <?php
                            if($projectDetail[0]['project_status']=='0'){
                        ?>
                            <li class="list-group-item"><b>Status : </b> <small class='badge badge-success'>OPEN</small></li>
                        <?php
                            }else if($projectDetail[0]['project_status']=='1'){
                        ?>
                            <li class="list-group-item"><b>Status : </b> <small class='badge badge-warning'>ON GOING</small></li>
                        <?php
                            }else{
                        ?>
                            <li class="list-group-item"><b>Status : </b> <small class='badge badge-danger'>DONE</small></li>
                        <?php
                            }

                        ?>
                        <li class="list-group-item"><b>Close Requirement : </b> <?php
                            $date = date_create($projectDetail[0]['project_mulai']);
                            echo date_format($date,'d-m-Y');  
                         ?></li>
                        <li class="list-group-item"><b>Deadline : </b> <?php
                            $date = date_create($projectDetail[0]['project_deadline']);
                            echo date_format($date,'d-m-Y');  
                         ?></li>
                                    
                    </ul>
                </div>
                </div>
          </div>
          <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Check List Progress</h5>
                    <p>*) Check if you have done your tasks</p>
                </div>
                <div class="card-body">
                        <div class="table-responsive">
                        <table class="table">
                        <col width="200">
                        <col width="150">
                        <col width="180">
                            <thead>
                                <th>Sub Project List</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="tbProject">
                                
                            </tbody>
                        </table>
                        </div>
                    
                </div>
                <div class="card-footer">
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
        showListSub();
    });
    function showListSub(){
        $("#tbProject").html('');
        let idProject = '<?= $projectDetail[0]['project_id']?>'
        $.ajax({
        method: 'post',
        url: '<?= base_url()."user/MySubProject/".$projectDetail[0]['project_id'] ?>',
        success: function(res){
            data = JSON.parse(res);
            data.forEach(item => {
              const monthNames = ["January", "February", "March", "April", "May", "June",
              "July", "August", "September", "October", "November", "December"];
              var x = new Date(item.sub_project_deadline);
              var tanggal_x = x.getDate(); 
              var bulan_x = monthNames[x.getMonth()]; 
              var tahun_x = x.getFullYear(); 
              let deadline_dates = tanggal_x + " "+ bulan_x + ' '+ tahun_x ;
              let status = item.sub_project_status;
              if(status==0){
                $("#tbProject").append(`
                  <tr id="row-${item.sub_project_id}">
                  <td>${item.sub_project_name}</td>
                  <td><medium class='badge badge-warning'>${deadline_dates}</medium></td>
                  <td id='col-${item.sub_project_id}'><button  value='${item.sub_project_id}' name='btnView' class='btnCheck btn btn-success'><i class="fa fa-check"></i></button></td>
                  </tr>
              `);
              }else{
                $("#tbProject").append(`
                  <tr id="row-${item.sub_project_id}">
                  <td>${item.sub_project_name}</td>
                  <td><medium class='badge badge-warning'>${deadline_dates}</medium></td>
                  <td id='col-${item.sub_project_id}'><button  value='${item.sub_project_id}' name='btnView' class='disabled btnCheck btn btn-success'>DONE</button></td>
                  </tr>
              `);

              }
              
            
            });
            $(".btnCheck").click(function () {
                var conf = confirm("are you sure ?");
                if(conf){
                    $.ajax({
                        method:"post",
                        url:'<?= base_url()."user/userController/updateSub" ?>',
                        data: {id: $(this).val()},
                        success: function () {
                            alert("success update");
                            $(this).addClass('disabled');
                        }
                    })
                }
                
            })
            
            $("#tableCompany").DataTable();
        }
        });
    }

    
</script>
