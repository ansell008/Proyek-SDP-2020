<!--    navbar come here          -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent" color-on-scroll="300">
    <div class="container">
      <div class="navbar-translate">
      <a class="navbar-brand" href="<?= base_url(); ?>" rel="tooltip" data-placement="bottom">
          Kerja.in
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/register" class="btn btn-danger btn-round">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!-- end navbar  -->

<div class="wrapper">

    <!-- content come here -->

    <div class="page-header" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?= base_url() ?>asset/img/carousel/registerBack.jpg');">
    <div class="container">
      <div class="row pt-5">
        <div class="col-lg-5 mr-auto">
          <div class="card">
            <div class="card-body p-4">
              <h3 class="card-title mx-auto mb-2">Register</h3>
              <?= form_open(base_url().'authUser/validate1') ?> 
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" name="firstname" placeholder="First Name">
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                </div>
                <button class="btn btn-danger btn-block btn-round">Next</button>
              </form><br>
              <?php 
                if(validation_errors() != ''){
              ?>
                <div class="alert alert-danger"><?= validation_errors(); ?></div>
              <?php
                }
              ?>
            </div>
          </div>
        </div>
        <div class="col-lg-5 ml-auto">
            <h1 style="color: white">Register With Us!</h1>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Modal Bodies come here -->

<!--   end modal -->
