
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
            <li class="active">
                <a><i class="nc-icon nc-ruler-pencil"></i>Projects</a>
                <ul class="">
                  <li> <a class="dropdown-item" href="<?=base_url().'user/projects' ?>">Search</a></li>
                  <li><a class="dropdown-item" href="<?=base_url().'user/myprojects' ?>">My Project</a></li>
                </ul>
            </li>
            <li class="">
                <a href="<?=base_url().'User/UserController/loadSummary' ?>">
                <i class="fas fa-window-restore"></i>
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
              <!-- <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li> -->
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
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
      <h3>All Available Projects</h3>
        <div class="row">
            <div class="col-md-9">
                <div id="projectContainer">
                
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Search</h4>
                  </div>
                  <div class="card-body">
                    <form id="form-search" class="form-inline">
                      <div class="form-group">
                        <input type="text" name="search" id="sc-query" class="form-control" placeholder="Enter Name">&nbsp;<button type="submit" class="btn btn-info btn-fab btn-icon btn-round"><i class="fa fa-search"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Filter</h4>
                  </div>
                  <div class="card-body">
                    <small>By Category</small><br>
                    <select id="category" class="form-control">
                    </select>
                  </div>
                </div>
            </div>
        </div>
      
      <br>
      <h3>Recommended Projects</h3>
        <div class="row">
          <div class="container d-flex flex-wrap justify-content-left">
            <?php
              foreach($recommend as $key => $value){
                echo "
                <div class='card mr-2' style='width: 20rem'>
                  <div class='card-body'>
                    <h4 class='card-title'>$value[project_nama]</h4>
                    <p class='card-text'>$value[project_deskripsi]</p>
                    <a href='".base_url()."user/detailProject/$value[project_id]' class='btn btn-primary'>View</a>
                  </div>
                </div>
                ";
              }
            ?>
            
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

  <style>
    a:hover{
      text-decoration: none;
      color: black;
      box-shadow: 5px 5px;
    }
  </style>

<script>
    $(document).ready(function(){
        loadProjects();
        loadCategory();

        $("#form-search").submit(function(e){
          e.preventDefault();
          searchProjects($("#sc-query").val());
        });

        $("#category").change(function(){
          let value = $(this).val();
          $.ajax({
            method: 'post',
            url: '<?= base_url() ?>user/searchFilterCategory',
            data: {id: value},
            success: function(res){
              let data = JSON.parse(res);
              parseProjects(data);
            }
          });
        });
    });

    function searchProjects(name){
      $.ajax({
        url: '<?= base_url() ?>user/searchProject',
        data: {query: name},
        method: 'post',
        success: function(res){
          let data = JSON.parse(res);
          parseProjects(data);
        }
      });
    }

    function parseCategory(data){
      data.forEach(item => {
            $("#category").append(`
              <option value="${item.category_id}">${item.category_name}</option>
            `);
          });
    }

    function loadCategory(){
      $.ajax({
        method: 'post',
        url: '<?= base_url() ?>user/searchByCategory',
        data: {id: $("#category").val()},
        success: function(res){
          let data = JSON.parse(res);
          parseCategory(data);
        }
      });
    }

    function parseProjects(data){
      $("#projectContainer").html('');
      let days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
      let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
      data.forEach(item => {
        var cr = new Date(item.created_at);
        var cn = new Date(item.project_mulai);
        var status, statusclass;

        if(item.project_status == 0){
          status = "OPEN";
          statusclass = "success";
        }else if(item.project_status == 1){
          status = "PROGRESS";
          statusclass = "warning";
        }else if(item.project_status == 2){
          status = "DONE";
          statusclass = "info";
        }

        console.log(cr.getDay());
        $("#projectContainer").append(`
                    <a href="<?php base_url() ?>detailProject/${item.project_id}">
                      <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                ${item.project_nama}
                                <br>
                                <small>on ${days[cr.getDay()]}, ${cr.getDate()} ${months[cr.getMonth()]} ${cr.getFullYear()} by ${item.perusahaan_nama}</small>
                            </h6>
                        </div>
                        <div class="card-body">
                            <p class="text-truncate">
                              ${item.project_deskripsi}
                            </p>
                            <span class="badge badge-${statusclass}">${status}</span>
                            <small>Until ${days[cn.getDay()]}, ${cn.getDate()} ${months[cn.getMonth()]} ${cn.getFullYear()}</small>
                            <span class="pull-right"><i class="fa fa-user"></i> ${item.bidder}</span>
                        </div>
                      </div>
                    </a>
                  `);
      });
    }

    function loadProjects(){
        $.ajax({
            url: '<?= base_url() ?>user/loadProject',
            method: 'post',
            success: function(res){
                let data = JSON.parse(res);
                parseProjects(data);
            }
        });
    }

</script>
