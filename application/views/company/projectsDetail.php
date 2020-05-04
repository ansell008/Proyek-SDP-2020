
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
            <li>
                <a href="<?= base_url().'company/summary' ?>">
                <i class="nc-icon nc-diamond"></i>
                <p>Summary</p>
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
                            <li class="list-group-item"><b>Status : </b> <small class='badge badge-success'>OPEN</small> <button class="btn float-right" value="<?= $projectDetail[0]['project_id'] ?>" id="startProject">Start Project</button></li>
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
                                $participantAktif=0;
                                for ($i=0; $i < count($participant); $i++) { 
                                    if($participant[$i]['STATUS'] == 1){
                                        $participantAktif++;
                                        ?>
                                    <li class="list-group-item"><b>Participant : </b> <?=$participantAktif ?> </li>
                                    <?php
                                    }
                                }
                            }
                                ?>
                                    
                    </ul>
                </div>
                </div>
          </div>
          <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Sub - Project</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="tbSubProject">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-info float-right btnInsertSub" data-toggle="modal" data-target="insertSub" type="submit" id="createSub">Create Sub Project</button>
                </div>
                </div>
          </div>
          <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Progress Your Project</h5>
                    </div>
                    <div class="card-body">
                        <div class="progress">
                        </div>
                        <div class="finishProject">

                        </div>
                    </div>
                </div>
          </div>
          <!-- modal insert sub project -->
          <form id="insertSubProject" method="post">
              <div class="modal fade bd-example-modal-lg" id="insertSub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">New Sub Project</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label for="nameNewCategory">Nama</label>
                          <input type="text" class="form-control" name="nameNewSub" id="subName" placeholder="Enter Sub Project Name">
                        </div>
                        <div class="form-group">
                          <label for="nameNewCategory">Deadline Date</label>
                          <input type="date" class="form-control" name="deadlineSub" id="subDeadline">
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="<?= $projectDetail[0]['project_id']?>" name="btnProjectID">    
                        <button type="submit" value="" name="" class="btn btn-success btn-flat">Add</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
        <!-- end -->
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
                            $ctrp =0;
                            for ($i=0; $i < count($participant) ; $i++) {
                                if($participant[$i]['STATUS']==1){
                                    $ctrp++;
                                    ?>
                                    <tr>
                                        <td ><?=$participant[$i]['NAMA'] ?></td>
                                        <td ><small class='badge badge-success'>IN</small></td>
                                        <td><button value='<?=$participant[$i]['ID'] ?>' class="btn btn-info btn-flat btnPar" data-toggle="modal" data-target="#exampleModal1<?=$ctrp?>" ctr= "<?=$ctrp?>" id=""><i class="fas fa-eye"></i></button></td>
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
                                        <td><button value='<?=$participant[$i]['ID'] ?>' class="btnPending btn btn-info btn-flat" data-toggle="modal" data-target="#exampleModal2<?=$ctrs?>" ctr = "<?=$ctrs?>" id=""><i class="fas fa-eye"></i></button></td>
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
        updateTableSub();

        $("#startProject").click(function () {
            $.ajax({
                method:"post",
                url:"<?= base_url().'company/company/updateProjectOnGoing'?>",
                data:{id:$(this).val()},
                success: function () {
                    window.location.href="<?= base_url().'company/company/projectsCompany'?>";
                }
            });
        })

        $(".btnInsertSub").click(function () {
            $("#insertSub").modal();
        });
        let status = '<?=$projectDetail[0]['project_status']?>';
        if(status==2){
            $('.btnFinish').addClass('disabled');
            $('#createSub').addClass('disabled');
        }

        $("#insertSubProject").submit(function(e){
            e.preventDefault();
            $.ajax({
                method : "post",
                url : '<?= base_url()."/company/company/insertSubProject" ?>',
                data : $("#insertSubProject").serialize(),
                success : function(){
                toastr.success('Insert Success');
                    $("#tbSubProject").html('');
                    updateTableSub();
                    $("#subName").val("");
                    $("#subDeadline").val("");
                }
            });
        });
        
        
    });

    function updateTableSub(){
        $("#tbSubProject").html('');
        $('.progress').html('');
        $.ajax({
        method: "post",
        url: "<?= base_url().'company/company/getAllSubProject' ?>",
        data : {idProject : '<?= $projectDetail[0]['project_id']?>'},
        success: function(res){
            let subPorjectData = JSON.parse(res);
            let ctrTotal =0,ctrDone =0;
            subPorjectData.forEach(data => {
                let stat = '';
                const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"];
                var x = new Date(data.sub_project_deadline);
                var tanggal_x = x.getDate(); 
                var bulan_x = monthNames[x.getMonth()]; 
                var tahun_x = x.getFullYear(); 
                let deadline_dates = tanggal_x + " "+ bulan_x + ' '+ tahun_x ;
                ctrTotal++;
                if(data.sub_project_status == 0){
                    stat = 'Belum Dikerjakan';
                }else{
                    stat = "Sudah Dikerjakan";
                    ctrDone++;
                }
                $("#tbSubProject").append(`
                    <tr id="row-${data.sub_project_id}">
                    <td>${data.sub_project_name}</td>
                    <td>${stat}</td>
                    <td>${deadline_dates}</td>
                    <td><button value='${data.sub_project_id}' name='${data.sub_project_name}' class='btnEdit btn btn-primary'><i class="fas fa-edit"></i></button> &nbsp; <button value='${data.sub_project_id}' name='${data.sub_project_name}' class=' btnDelete btn btn-danger'><i class="fas fa-trash"></i></button></td>
                    </tr>
                `);
                
            });
            let valueProgressBar = (ctrDone/ctrTotal)*100;
            $(".progress").append(`
                <div class="progress-bar bg-warning" role="progressbar" style="width:${valueProgressBar}%" aria-valuenow="${valueProgressBar}" aria-valuemin="0" aria-valuemax="100"></div>        
            `);
            
            if(valueProgressBar==100){
                $(".progress").html('');
                $(".progress").append(`
                    <div class="progress-bar bg-success" role="progressbar" style="width:${valueProgressBar}%" aria-valuenow="${valueProgressBar}" aria-valuemin="0" aria-valuemax="100">100%</div>        
                `);
                let status = '<?=$projectDetail[0]['project_status']?>';
                if(status ==2){
                    $(".finishProject").append(`
                        <button value=""  name="" class="disabled btn btn-success btn-flat float-right btnFinish">Finish Project</button>
                    `)
                }else{
                    $(".finishProject").append(`
                        <button value=""  name="" class="btn btn-success btn-flat float-right btnFinish">Finish Project</button>
                    `)
                }
                
            }
            $(".btnFinish").click(function() {
                let tdId = '<?=$projectDetail[0]['project_id']?>';
                $.ajax({
                    method: "post",
                    url: "<?= base_url().'/company/company/updateProjectFinish'?>",
                    data: {id : tdId},
                    success: function () {
                        toastr.success('Project Success');
                        $('.btnFinish').addClass('disabled');
                        $('#createSub').addClass('disabled');
                    }
                });
            });
            $(".btnEdit").click(function () {
                let tdId = $(this).val();
                $.ajax({
                    method: 'post',
                    url: '<?= base_url()."company/company/getSubProjectById" ?>',
                    data: {id : tdId},
                    success: function(data){
                    let item = JSON.parse(data);
                    let status = '';
                    if(item[0].sub_project_status == 0){
                        status = 'Belum Dikerjakan';
                    }else{
                        status = "Sudah Dikerjakan";
                    }
                    $(`#row-${tdId}`).html(`
                        <td><input type='text' id='sub_project_name-${item[0].sub_project_id}' class='form-control' name='sub_project_name' value='${item[0].sub_project_name}' /></td>
                        <td>${status}</td>
                        <td><input type='date' id='sub_project_deadline-${item[0].sub_project_id}' class='form-control' name='sub_project_deadline' value='${item[0].sub_project_deadline}' /></td>
                        <td><button type='submit' class="btn btn-flat btn-success btnDone" id="${item[0].sub_project_id}"><i class="fa fa-check"></i></button></td>
                    `);
                    $(".btnDone").click(function () {
                        let trId = $(this).attr("id");
                        let name = $(`#sub_project_name-${trId}`).val();
                        let deadline = $(`#sub_project_deadline-${trId}`).val();
                        $.ajax({
                            method: 'post',
                            url: '<?= base_url()."company/company/updateSubProjectById" ?>',
                            data: {id: trId, name: name, deadline: deadline},
                            success: function(res){
                            if(res == 'success'){
                                toastr.success('Update Success');
                                updateTableSub();
                            }
                            }
                        });
                    })

                    }
                })
            });
            $(".btnDelete").click(function(){
            var conf = confirm("Are you sure ?");
            if(conf){
                $.ajax({
                method: "post",
                url: "<?= base_url().'/company/company/deleteSubProject'?>",
                data: {"id" : $(this).val()},
                success: function () {
                    toastr.success('Delete Success');
                    $("#tbSubProject").html("");
                    updateTableSub();
                }
                });
            }
            
            });
            $("#db1").DataTable();
        }
        }); 
    }


    function showDetail(){
        let tdId = '<?=$projectDetail[0]['project_id']?>';
        $.ajax({
            method: 'post',
            url: '<?= base_url()."company/company/getAllUserByProject" ?>',
            data: {id : tdId},
            success: function(res){
                data = JSON.parse(res);
                let ctr = 0;
                data.forEach(
                item => {
                    const monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"];
                    var x = new Date(item.joined);
                    var tanggal_x = x.getDate(); 
                    var bulan_x = monthNames[x.getMonth()]; 
                    var tahun_x = x.getFullYear(); 
                    let join_at = tanggal_x + " "+ bulan_x + ' '+ tahun_x ;
                    if(item.STATUS == 1){
                        ctr++;
                        $('#par').append(`
                        <div class="modal fade bd-example-modal-lg" id="exampleModal1${ctr}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                            <li class="list-group-item "><b>Join At </b> : ${join_at} </li>
                                            
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
        $('.btnPar').click(function () {
            let ctr = $(this).attr('ctr');
            alert(ctr)
            $("#exampleModal1"+ctr).modal();
        });
    }
    
    function showPendingDetail(){
        let tdId = '<?=$projectDetail[0]['project_id']?>';
        let baseUrl = '<?= base_url()?>'; let hrfcv;
        $.ajax({
            method: 'post',
            url: '<?= base_url()."company/company/getAllUserByProject" ?>',
            data: {id : tdId},
            success: function(res){
                data = JSON.parse(res);
                let ctr = 0;
                data.forEach(
                item => {
                    
                    if(item.STATUS == 0){
                        ctr++;
                        $('#pendingPar').append(`
                        <div class="modal fade bd-example-modal-lg" id="exampleModal2${ctr}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                        <li class="list-group-item "><b>CV </b> : Done </li>
                                        <a target="_blank" href="${baseUrl+item.USER_CV}"><img src="${baseUrl+item.USER_CV}" alt=""></a>
                                    </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" value="${item.ppid}" class="btn btn-success btn-flat btnAccept">Accept</button>
                                        <button type="submit" value="${item.ppid}" class="btn btn-danger btn-flat btnIgnore">Ignore</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `);
                        hrfcv = item.USER_CV;
                    }
                    
                });
                $('.btnPending').click(function () {
                    let ctr = $(this).attr('ctr');
                    //alert(ctr);
                    alert(baseUrl+hrfcv);
                    $("#exampleModal2"+ctr).modal();
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
                $('.btnIgnore').click(function () {
                    $.ajax({
                        method: "post",
                        url: "<?= base_url().'company/company/ignoreParticipant' ?>",
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
