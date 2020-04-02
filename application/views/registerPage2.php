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
          <div class="col-md-8 mx-auto text-center">
            <h1 class="mx-auto text-white">Hello, <?= $data['user_firstname']; ?> <?= $data['user_lastname']; ?>!</h1>
            <h3 class="mx-auto text-white">What do you want to be?</h3>
          </div>
      </div>
      <form action="<?= base_url() ?>authUser/validate2" method="post">
      <div class="row mt-4 text-center">
        <input type="hidden" name="data" value='<?= json_encode($data); ?>'>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="info">
                        <div class="icon icon-danger">
                            <i class="nc-icon nc-circle-10"></i>
                        </div>
                        <h4 class="info-title" style="color:black">Job Seeker</h4><br>
                        <button type="submit" name="type" value="js" class="btn btn-danger">Choose</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                    <div class="info">
                        <div class="icon icon-danger">
                            <i class="nc-icon nc-briefcase-24"></i>
                        </div>
                        <h4 class="info-title" style="color:black">Job Provider</h4><br>
                        <button type="submit" name="type" value="jp" class="btn btn-danger">Choose</button>
                    </div>
                </div>
              </div>
        </div>
      </div>
      </form>
    </div>
  </div>

</div>

<!-- Modal Bodies come here -->

<!--   end modal -->
