<!--    navbar come here          -->
<nav class="navbar navbar-expand-lg" color-on-scroll="300">
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
                      <!-- <form action="<?//= base_url() ?>authUser/validate4" method="post"> -->
                      <?php
                          echo form_open_multipart('authUser/validate4');
                      ?>
                          <input type="hidden" name='data' value='<?= json_encode($user); ?>'>
                          <input type="hidden" name='table' value='<?= json_encode($table); ?>'>
                          <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email" placeholder="Email">
                          </div>
                          <div class="form-group">
                              <label>Address</label>
                              <textarea class="form-control" name="add" placeholder="Address"></textarea>
                          </div>
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                                  <label>City</label>
                                  <select name="city" class="form-control">
                                      <option value="Surabaya Utara">Surabaya Utara</option>
                                      <option value="Surabaya Selatan">Surabaya Selatan</option>
                                      <option value="Surabaya Barat">Surabaya Barat</option>
                                      <option value="Surabaya Timur">Surabaya Timur</option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-7">
                              <div class="form-group">
                                  <label>Post Code</label>
                                  <input type="text" class="form-control" name="code" placeholder="Post Code">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control" name="pass" placeholder="Password">
                          </div>
                          <div class="form-group">
                              <label>Confirm Password</label>
                              <input type="password" class="form-control" name="confPass" placeholder="Minimum of 6 length">
                          </div>
                          <div class="form-group">
                              <label>Type</label>
                              <input type="text" class="form-control" name="type" placeholder="CV, PT, etc">
                          </div>
                          <div class="form-group">
                              <label>Phone Number</label>
                              <input type="number" class="form-control" name="telp" placeholder="Phone Number">
                          </div>
                          <div class="form-group">
                              <label>NPWP [.png/.jpg]</label>
                              <input type="file" class="form-control" name="npwp">
                          </div>
                          <button type="submit" class="btn btn-danger">Register</button>
                        <!-- </form> -->
                        <?php
                            echo form_close();
                        ?>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

</div>

<!-- Modal Bodies come here -->

<!--   end modal -->
