
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
                    <h4 class="card-title">Detail Projects by <?=$profil[0]['perusahaan_nama']?></h4>
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
                        <?php
                            if(count($participant) == 0){
                                ?>
                                <li class="list-group-item"><b>Participant : </b> -</li>
                                <?php
                            }else {
                                ?>
                                    <li class="list-group-item"><b>Participant : </b> <?=count($participant) ?> </li>
                                    <div class="col-md-7">
                                        
                                    </div>
                    </ul>
                </div>
                </div>
          </div>
          <div class="col-md-6">
                <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Participant</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                        <!-- <col width="10">
                        <col width="150">
                        <col width="180"> -->
                            <thead>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="tbProject">
                            <?php
                            $ctr =0;
                            for ($i=0; $i < count($participant) ; $i++) {
                                if($participant[$i]['STATUS']==1){
                                    $ctr++;
                                    ?>
                                    <tr>
                                        <td ><?=$participant[$i]['NAMA'] ?></td>
                                        <td ><small class='badge badge-success'>IN</small></td>
                                        <td><button value='<?=$participant[$i]['ID'] ?>' class="btn btn-info btn-flat" data-toggle="modal" data-target="#exampleModal" id="<?='btnPar'.$ctr?>"><i class="fas fa-eye"></i></button></td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                            ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
          </div>
          <div class="col-md-6">
                <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Pending Participant</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                        <!-- <col width="10">
                        <col width="150">
                        <col width="180"> -->
                            <thead>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="tbProject">
                            <?php
                            $ctrs = 0;
                            for ($i=0; $i < count($participant) ; $i++) {
                                if($participant[$i]['STATUS']==0){
                                    $ctrs++;
                                    ?>
                                    <tr>
                                        <td ><?=$participant[$i]['NAMA'] ?></td>
                                        <td ><small class='badge badge-danger'>PENDING</small></td>
                                        <td><button value='<?=$participant[$i]['ID'] ?>' class="btn btn-info btn-flat" data-toggle="modal" data-target="#exampleModal2" id="<?='btnPending'.$ctrs?>"><i class="fas fa-eye"></i></button></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
          </div>
      </div>
      <!-- modal pop up  -->
        <!-- modal active participant -->
        
        <div id="par">

        </div>
        <!-- modal pending  -->
        <div id="pendingPar">

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
        showDetail();
        showPendingDetail();
    });
    function showDetail(){
        $.ajax({
            method: 'post',
            url: '<?= base_url()."company/company/getAllUserByProject" ?>',
            success: function(res){
                data = JSON.parse(res);
                let ctr = 0;
                data.forEach(
                item => {
                    if(item.STATUS == 1){
                        $('#par').append(`
                        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Participant</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group detailCompany">
                                            <li class="list-group-item "><b>ID</b> : ${item.ID}</li>
                                            <li class="list-group-item "><b>Name </b> : ${item.NAMA} </li>
                                            <li class="list-group-item "><b>Pendidikan </b> : ${item.PENDIDIKAN} </li>
                                            <li class="list-group-item "><b>Pengalaman</b> : ${item.PENGALAMAN} </li>
                                            
                                        </ul>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                        `);
                    }
                });
            }
        });
        $('#btnPar').click(function () {
            $("exampleModal1").modal();
        });
    }
    function showPendingDetail(){
        $.ajax({
            method: 'post',
            url: '<?= base_url()."company/company/getAllUserByProject" ?>',
            success: function(res){
                data = JSON.parse(res);
                let ctr = 0;
                data.forEach(
                item => {
                    ctr++;
                    if(item.STATUS == 0){
                        $('#pendingPar').append(`
                        <div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Pending Participant</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <ul class="list-group detailCompany">
                                        <li class="list-group-item "><b>ID</b> : ${item.ID}</li>
                                        <li class="list-group-item "><b>Name </b> : ${item.NAMA} </li>
                                        <li class="list-group-item "><b>Pendidikan </b> : ${item.PENDIDIKAN} </li>
                                        <li class="list-group-item "><b>Pengalaman</b> : ${item.PENGALAMAN} </li>
                                        
                                    </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" value="${item.ppid}" class="btn btn-success btn-flat btnAccept">Accept</button>
                                        <button type="submit" class="btn btn-danger btn-flat btnIgnore">Ignore</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `);
                        
                    }
                    $('#btnPending').click(function () {
                        $("exampleModal2").modal();
                    });
                    
                    
                });
                
                $('.btnAccept').click(function () {
                    $.ajax({
                        method: "post",
                        url: "<?= base_url().'company/company/acceptParticipant' ?>",
                        data : {id : $(this).val()},
                        success : function(){
                            window.location.reload();
                        }
                    });

                });
            }
        });
        
    }


    
</script>
