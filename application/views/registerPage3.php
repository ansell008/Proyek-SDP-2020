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
      <div class="row">
          <div class="col-md-8 mx-auto text-white">
              <h1 class="text-center mb-4">One Final Step...</h1>
              <div class="card p-3">
                  <div class="card-body">
                      <?= validation_errors(); ?>
                      <form action="<?= base_url() ?>authUser/validate3" method="post">
                          <input type="hidden" name='data' value='<?= json_encode($user); ?>'>
                          <input type="hidden" name='table' value='<?= json_encode($table); ?>'>
                          <div class="form-group">
                              <label>Username</label>
                              <input type="text" class="form-control" name="username" placeholder="Username">
                          </div>
                          <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email" placeholder="Email">
                          </div>
                          <div class="form-group">
                              <label>Password</label>
                              <input type="text" class="form-control" name="pass" placeholder="Password">
                          </div>
                          <div class="form-group">
                              <label>Confirm Password</label>
                              <input type="text" class="form-control" name="confPass" placeholder="Minimum of 6 length">
                          </div>
                          <div class="form-group">
                              <label>KTP</label>
                              <input type="text" class="form-control" name="ktp" placeholder="KTP number">
                          </div>
                          <button type="submit" class="btn btn-danger">Register</button>
                        </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

</div>

<!-- Modal Bodies come here -->

<!--   end modal -->
