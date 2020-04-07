  <!-- Navbar -->
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
  <div class="page-header" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?= base_url() ?>asset/img/carousel/FI_3.jpg');">
    <div class="filter"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 ml-auto mr-auto">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title mx-auto mb-4" style="color:black">Login</h3>
              <form action="<?= base_url() ?>authUser/loginProses" method="post">
                <div class="form-group">
                  <label>Email/Username</label>
                  <input type="text" name='em' class="form-control">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name='pass' class="form-control" placeholder="Password">
                </div>
                <hr>
                <p class="text-center mb-3">Login as</p>
                <div class="row">
                  <div class="col-md-6"><button name="sbm" type="submit" value="auth_user" class="btn btn-success btn-block btn-round">User</button></div>
                  <div class="col-md-6"><button name="sbm" type="submit" value="auth_perusahaan" class="btn btn-danger btn-block btn-round">Company</button></div>
                </div>
                <div class="row mt-1">
                  <a href="#" class="btn btn-link btn-danger">Forgot password?</a>
                </div>
                <?php
                  if(isset($_SESSION['err'])) echo '<div class="alert alert-danger">'.$_SESSION['err'].'</div>'
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
