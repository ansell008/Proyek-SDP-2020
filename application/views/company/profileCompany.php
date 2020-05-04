
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
            <li class="active">
                <a href="<?=base_url().'/company/company/profileCompany' ?>">
                <i class="nc-icon nc-single-02"></i>
                <p>Profile</p>
                </a>
            </li>
            <li class="">
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
            <div class="card card-user">
              <div class="image">
                <img src="<?= base_url().'asset/img/profile/back.jpg' ?>" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="<?=base_url().$profil[0]['perusahaan_profPic'] ?>" alt="Profile Picture">
                    <!-- <form method="post" action="<?//= base_url().'/company/company/updateProfile' ?>"> -->
                    <?php
                        echo form_open_multipart('company/company/updateProfile');
                    ?>
                        <input type="hidden" name="editPP" value="true"/>
                        <div class="form-group">
                            <input type="file" class="custom-file-input" id="customFile" name="profile_pic">
                            <button class="btn btn-info" for="customFile">Change Profile Picture</button>
                        </div>
                  </a>
                  <h5 class="title"><?=$profil[0]['perusahaan_nama']?></h5>
                  <p class="description">
                    <?=$profil[0]['perusahaan_email']?>
                  </p>
                </div>
                <p class="description text-center">
                  <?php
                    for ($i=0; $i < 5-$profil[0]['perusahaan_rate']; $i++) { 
                        echo "✰";
                    }
                    if($profil[0]['perusahaan_rate']>0){
                        for ($i=0; $i < $profil[0]['perusahaan_rate']; $i++) { 
                            echo "⭐";
                        }
                    }    
                  ?>
                </p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;&nbsp;<?=$profil[0]['perusahaan_alamat']?></li>
                    <li class="list-group-item"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;<?=$profil[0]['perusahaan_telp']?></li>
                    <li class="list-group-item"><i class="fa fa-file" aria-hidden="true"></i>&nbsp;&nbsp;<?=$profil[0]['perusahaan_tipe']?></li>
                </ul>
              </div>
              <div class="card-footer">
                <hr>
                <!-- <div class="button-container">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                      <h5>12<br><small>Files</small></h5>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h5>2GB<br><small>Used</small></h5>
                    </div>
                    <div class="col-lg-3 mr-auto">
                      <h5>24,6$<br><small>Spent</small></h5>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Company ID</label>
                        <input type="text" name="id" class="form-control" disabled="" placeholder="Company ID" value="<?=$profil[0]['perusahaan_id']?>">
                      </div>
                    </div>
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" name="name" class="form-control" value="<?=$profil[0]['perusahaan_nama']?>">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" value="<?=$profil[0]['perusahaan_email']?>">
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="<?=$profil[0]['perusahaan_alamat']?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">City</label>
                            <select name="city" class="form-control">
                                <option value="Surabaya Utara">Surabaya Utara</option>
                                <option value="Surabaya Selatan">Surabaya Selatan</option>
                                <option value="Surabaya Barat">Surabaya Barat</option>
                                <option value="Surabaya Timur">Surabaya Timur</option>
                            </select></div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Post Code</label>
                        <input type="text" name="code" class="form-control" value="<?=$profil[0]['perusahaan_kodepos']?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Telephone</label>
                        <input type="text" name="telephone" class="form-control" value="<?=$profil[0]['perusahaan_telp']?>">
                      </div>
                    </div>
                    
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Type</label>
                        <input type="text" name="type" class="form-control" value="<?=$profil[0]['perusahaan_tipe']?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" name="idBtn" class="btn btn-danger btn-round" value="<?=$profil[0]['perusahaan_id']?>">Update Profile</button>
                    </div>
                  </div>
                <!-- </form> -->
                <?php
                    echo form_close();
                ?>
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

</html>
