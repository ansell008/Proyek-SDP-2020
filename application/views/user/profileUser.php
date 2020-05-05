
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
            <li class="active">
                <a href="<?=base_url().'user/profile' ?>">
                <i class="nc-icon nc-single-02"></i>
                <p>Profile</p>
                </a>
            </li>
            <li class="">
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
            <a class="navbar-brand" href="javascript:;">
            </a>
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
            <div class="card card-user">
              <div class="image">
                <img src="<?= base_url().'asset/img/profile/back.jpg' ?>" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                    <?php echo form_open_multipart('user/userController/updatePP'); ?>
                    <div class="form-group">
                      <button style="background: none;border:none; " for="customFile"><img style=" cursor:pointer;" class="avatar border-gray" src="<?=base_url().$_SESSION['userAktif'][0]['user_profile'] ?>" alt="Profile Picture"></button>
                      <input type="file" class="custom-file-input" id="customFile" name="profile_pic">
                    </div>
                    <div class="form-gorup">
                      <input type="hidden" name="idUser" value="<?=$_SESSION['userAktif'][0]['user_id']?>">
                      <button type="submit" class="btn btn-info">Change Profile Picture</button>
                    </div>
                    <h4 class="title">
                        <?= $_SESSION['userAktif'][0]['user_firstname'] ?> <?= $_SESSION['userAktif'][0]['user_lastname'] ?>
                        <br>
                        <small><?= $_SESSION['userAktif'][0]['user_username'] ?> <br>
                        <?php
                            if($_SESSION['userAktif'][0]['user_status'] == '0'){
                                echo "<div class='badge badge-success'>Active</div>";
                            }else{
                                echo "<div class='badge badge-danger'>Banned</div>";
                            }
                        ?></small>
                    </h4>
                    </form>
                    <p class="description text-center">
                      <?php
                        for ($i=0; $i < 5-$_SESSION['userAktif'][0]['user_rate']; $i++) { 
                            echo "✰";
                        }
                        if($_SESSION['userAktif'][0]['user_rate']>0){
                            for ($i=0; $i < $_SESSION['userAktif'][0]['user_rate']; $i++) { 
                                echo "⭐";
                            }
                        }    
                      ?>
                    </p>
                </div>
                <div class="description text-center">
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4>CV</h4>
              </div>
              <div class="card-body">
                <div class="body-cv">
                  <?php 
                  echo form_open_multipart('user/userController/uploadCV');
                  if($_SESSION['userAktif'][0]['user_cv'] == ''){
                      echo "<div class='alert alert-danger'> You have not completed your CV, please upload CV below this.</div>";
                  ?>
                  <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <input type="file" id="customFile" class="form-control" name="cv">
                            <label class="btn" for="customFile">Choose a file [png/jpg]</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="hidden" name="idUser" value="<?=$_SESSION['userAktif'][0]['user_id']?>">
                        <button type="submit" class="btn btn-warning ">Upload CV</button>
                    </div>
                  </div>
                  <?php
                  }else{
                    echo "<div class='alert alert-success'> CV already uploaded </div>";
                  ?>
                      <div class="form-group">
                          <input type="file" id="customFile" class="form-control" name="cv">
                          <label class="btn" for="customFile">Choose a file [png/jpg]</label>
                      </div>
                      <input type="hidden" name="idUser" value="<?=$_SESSION['userAktif'][0]['user_id']?>">
                      <button type="submit" class="btn btn-warning ">Re-upload CV</button>
                      <button class="btn btn-flat btn-info" type="button" id="btnViewCV">View <i class='fa fa-eye'></i></button>
                      <img style="display:none" id="imgCV" src="<?= base_url() . $_SESSION['userAktif'][0]['user_cv']; ?>" alt="">
                  <?php
                  }
                  ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form method="post" action="<?= base_url() ?>user/updateProfile">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" readonly="true" value="<?= $_SESSION['userAktif'][0]['user_firstname']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" readonly="true" value="<?= $_SESSION['userAktif'][0]['user_lastname']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" readonly="true" value="<?= $_SESSION['userAktif'][0]['user_email']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" readonly="true" value="<?= $_SESSION['userAktif'][0]['user_username']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>KTP</label>
                        <button class="btn btn-flat btn-info btn-sm" type="button" id="btnViewKtp"><i class='fa fa-eye'></i></button>
                        <img style="display:none" id="imgKtp" src="<?= base_url() . $_SESSION['userAktif'][0]['user_ktp']; ?>" alt="">
                      </div>
                    </div>
                    
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>CV</label>
                        <button class="btn btn-flat btn-info btn-sm" type="button" id="btnViewCv"><i class='fa fa-eye'></i></button>
                        <?php
                          if($_SESSION['userAktif'][0]['user_cv'] == "-1"){
                            echo form_open_multipart('user/uploadCv');
                        ?>
                            <div class="form-group">
                                <input type="file" class="form-control" name="cv">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Upload</button>
                          </form>
                        <?php
                          }else{
                            
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="button" name="updateBtn" id="btnUpdate" class="btn btn-danger btn-round" value="">Update Profile</button>
                    </div>
                  </div>
                <!-- </form> -->
                </form>
              </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Change Password</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url() ?>user/changePassword" method="post">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control" name="oldPassword">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="newPassword">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="confPassword">
                        </div>
                        <button type="submit" class="btn btn-danger btn-round ml-auto mr-auto">Change</button>
                        <?= (isset($_SESSION['err']) ? '<div class="alert alert-danger">'.$_SESSION['err'].'</div>' : ''); ?>
                    </form>
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

  <script>
      $(document).ready(function(){
          $('#btnUpdate').click(function(e){
            if($(this).html() == 'Update Profile'){
                e.preventDefault();
                $(this).attr('type', 'submit');
                $(this).html('Save');

                $('input[name="firstname"]').removeAttr('readonly');
                $('input[name="lastname"]').removeAttr('readonly');
                $('input[name="email"]').removeAttr('readonly');
                $('input[name="ktp"]').removeAttr('readonly');
                $('input[name="username"]').removeAttr('readonly');
            }
          });

          $("#btnViewKtp").click(function(){
            $("#imgKtp").removeAttr("style");
            $("#imgKtp").attr("style", "display: block");
          });
          $("#btnViewCV").click(function(){
            $("#imgCV").removeAttr("style");
            $("#imgCV").attr("style", "display: block");
          });
      });
  </script>
