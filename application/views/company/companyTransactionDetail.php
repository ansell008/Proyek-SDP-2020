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
          <li class="">
            <a href="<?=base_url().'company/dashComp' ?>">
              <i class="nc-icon nc-diamond"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="">
            <a href="<?=base_url().'company/myprofile' ?>">
              <i class="nc-icon nc-single-02"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="">
            <a href="<?=base_url().'company/myprojects' ?>">
              <i class="nc-icon nc-ruler-pencil"></i>
              <p>Projects</p>
            </a>
          </li>
          <li class="active">
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
                echo "Welcome back, ". $_SESSION['compAktif']['data'][0]['perusahaan_nama']."!";
            }
             ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
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
        <div class="card">
          <div class="card-header">
            <div class="card-title">
              <h2>Transaction Detail</h2>
            </div>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><b>Project Name : </b> <?= $project[0]['project_nama'] ?></li>
              <li class="list-group-item"><b>Description : </b> <?= $project[0]['project_deskripsi'] ?></li>
              <li class="list-group-item"><b>Project Created By : </b> <?= $project[0]['perusahaan_nama'] ?>
              </li>
              <?php 
                    $date = date_diff(date_create($project[0]['project_mulai']), date_create($project[0]['project_deadline']));
                    $amount = $project[0]['project_anggaran'] * $date->days * $count[0]['jumlah'];

                    $formated_amount = "Rp " . number_format($amount,2,',','.');
                ?>
              <li class="list-group-item"><b>Amount to Pay: </b> <?= $formated_amount ?></li>
            </ul>
            <br>
            <table class="table table-bordered">
              <thead>
                <th>Participant Name</th>
                <th>Amount To Pay</th>
              </thead>
              <tbody>
                <?php
                        foreach($pekerja as $key => $value){
                            echo "<tr>";
                            echo "<td>$value[user_firstname] $value[user_lastname]</td>";
                            echo "<td>Rp ".number_format($project[0]['project_anggaran'] * $date->days,2,',','.')."</td>";
                            echo "</tr>";
                        }
                    ?>
                <tr>
                  <th>TOTAL</th>
                  <th><?= $formated_amount ?></th>
                </tr>
              </tbody>
            </table>
            <button id='pay-button' class='btn btn-success'>Pay</button>
            <button id='sync-button' class='btn btn-info'><i class="fa fa-sync"></i></button>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <div class="card-title">
              <h2>Payment Details</h2>
            </div>
          </div>
          <div class="card-body" id="containerPayment">

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
      let orderid;
      $(document).ready(function () {
        load();
        $("#pay-button").click(function (event) {
          event.preventDefault();
          $(this).attr("disabled", "disabled");
          $.ajax({
            method: "post",
            url: '<?= base_url() ?>payment/paymentController/token',
            data: {
              idProject: "<?= $project[0]['project_id'] ?>"
            },
            success: function (res) {
              snap.pay(res, {
                onSuccess: function (result) {
                  console.log(result.status_message);
                  console.log(result);
                },
                onPending: function (result) {
                  console.log(result.status_message);
                  console.log(result);
                  sendToDb(result);
                },
                onError: function (result) {
                  console.log(result.status_message);
                  console.log(result);
                }
              });
            }
          });
        });

        $("#sync-button").click(function (event) {
          event.preventDefault();
          $.ajax({
            method: 'post',
            url: "<?= base_url() ?>payment/refreshStatus",
            data: {
              ord_id: orderid
            },
            success: function (res) {
              let dataTrans = JSON.parse(res);
              isiPayment(dataTrans[0]);
            }
          });
        })
      });

      function load() {
        $.ajax({
          method: "post",
          url: "<?= base_url() ?>payment/getTransDetail",
          data: {
            prj_id: "<?= $project[0]['project_id'] ?>"
          },
          success: function (res) {
            let dataTrans = JSON.parse(res);
            if (dataTrans[0].status_code == -1) {
              $("#containerPayment").append(`
                  <div class="alert alert-danger">Please complete your payment process</div>
                `);
              $("#sync-button").addClass("disabled");
            } else {
              isiPayment(dataTrans[0]);
              $("#pay-button").addClass("disabled");
            }
          }
        });
      }

      function isiPayment(dataHtrans) {
        $("#containerPayment").html('');
        let cl = '';
        if (dataHtrans.transaction_status == 'pending') {
          cl = 'warning';
        }
        if (dataHtrans.transaction_status == 'settlement') {
          cl = 'success';
        }

        if (dataHtrans.payment_type == 'bank_transfer') {
          $("#containerPayment").append(`
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><b>Transaction Status : </b> <span class='badge badge-${cl}'>${dataHtrans.transaction_status}</span></li>
                  <li class="list-group-item"><b>Order Id : </b> ${dataHtrans.order_id}</li>
                  <li class="list-group-item"><b>Grand Total : </b> ${dataHtrans.grand_total}</li>
                  <li class="list-group-item"><b>Transaction Time : </b> ${dataHtrans.transaction_time}</li>
                  <li class="list-group-item"><b>Bank : </b> ${dataHtrans.bank}</li>
                  <li class="list-group-item"><b>Virtual Account Number : </b> ${dataHtrans.bca_va_number}</li>
                  <li class="list-group-item"><a class='btn btn-success' target="_blank" href='${dataHtrans.pdf_url}'>Download Instruction</a></li>
                  </ul>
                `);
        } else if (dataHtrans.payment_type == 'echannel') {
          $("#containerPayment").append(`
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><b>Transaction Status : </b> <span class='badge badge-${cl}'>${dataHtrans.transaction_status}</span></li>
                  <li class="list-group-item"><b>Order Id : </b> ${dataHtrans.order_id}</li>
                  <li class="list-group-item"><b>Grand Total : </b> ${dataHtrans.grand_total}</li>
                  <li class="list-group-item"><b>Transaction Time : </b> ${dataHtrans.transaction_time}</li>
                  <li class="list-group-item"><b>Bank : </b> Mandiri</li>
                  <li class="list-group-item"><b>Bill Code : </b> ${dataHtrans.bill_key}</li>
                  <li class="list-group-item"><b>Biller Key : </b> ${dataHtrans.biller_code}</li>
                  <li class="list-group-item"><a class='btn btn-success' target="_blank" href='${dataHtrans.pdf_url}'>Download Instruction</a></li>
                  </ul>
                `);
        } else if (dataHtrans.payment_type == 'cstore') {
          $("#containerPayment").append(`
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><b>Transaction Status : </b> <span class='badge badge-${cl}'>${dataHtrans.transaction_status}</span></li>
                  <li class="list-group-item"><b>Order Id : </b> ${dataHtrans.order_id}</li>
                  <li class="list-group-item"><b>Grand Total : </b> ${dataHtrans.grand_total}</li>
                  <li class="list-group-item"><b>Transaction Time : </b> ${dataHtrans.transaction_time}</li>
                  <li class="list-group-item"><b>Payment Code : </b> ${dataHtrans.payment_code}</li>
                  <li class="list-group-item"><a class='btn btn-success' target="_blank" href='${dataHtrans.pdf_url}'>Download Instruction</a></li>
                  </ul>
                `);
        } else if (dataHtrans.payment_type == 'gopay') {
          $("#containerPayment").append(`
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><b>Transaction Status : </b> <span class='badge badge-${cl}'>${dataHtrans.transaction_status}</span></li>
                  <li class="list-group-item"><b>Order Id : </b> ${dataHtrans.order_id}</li>
                  <li class="list-group-item"><b>Grand Total : </b> ${dataHtrans.grand_total}</li>
                  <li class="list-group-item"><b>Transaction Time : </b> ${dataHtrans.transaction_time}</li>
                  <li class="list-group-item"><b>QR Code</b><br> <img src='${dataHtrans.gopay_qr_code}' width='200' /></li>
                  </ul>
                `);
        }
        orderid = dataHtrans.order_id;
      }

      function sendToDb(data) {
        let fdata = JSON.stringify(data);
        $.ajax({
          method: "post",
          url: "<?= base_url() ?>payment/paymentController/insertDataPayment",
          data: {
            obj: fdata,
            prj_id: "<?= $project[0]['project_id'] ?>"
          },
          success: function (res) {
            let dataHtrans = JSON.parse(res);
            isiPayment(dataHtrans);
            $("#sync-button").removeClass("disabled");
          }
        });
      }
    </script>
</body>

</html>