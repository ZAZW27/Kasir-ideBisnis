<?php 
include 'config.php';
SESSION_START();
if ($_SESSION['tipe_user']=="") {
 header("location:pages/log/login.php");
}

// store the sessions
$id=$_SESSION['id_user'];
$nama = $_SESSION['nama'];
$profile_user = $_SESSION['profile_user'];
$tipe_user = $_SESSION['tipe_user'];
$username = $_SESSION['username'];
$alamat = $_SESSION['alamat'];
$telpon = $_SESSION['telpon'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/mycss.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logo-new.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-new.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-xl-block">
            <!-- <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search products" />
              </div>
            </form> -->
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/user_profile/<?=$profile_user?>" alt="image" />
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?=$nama?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                <div class="p-3 text-center bg-primary">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/images/faces/face28.png" alt="" />
                </div>
                <div class="p-2">
                  <h5 class="dropdown-header text-uppercase ps-2 text-dark">User Options</h5>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                    <span>Inbox</span>
                    <span class="p-0">
                      <span class="badge badge-primary">3</span>
                      <i class="mdi mdi-email-open-outline ms-1"></i>
                    </span>
                  </a>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                    <span>Profile</span>
                    <span class="p-0">
                      <span class="badge badge-success">1</span>
                      <i class="mdi mdi-account-outline ms-1"></i>
                    </span>
                  </a>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span>Settings</span>
                    <i class="mdi mdi-settings"></i>
                  </a>
                  <div role="separator" class="dropdown-divider"></div>
                  <h5 class="dropdown-header text-uppercase ps-2 text-dark mt-2">Actions</h5>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                    <span>Lock Account</span>
                    <i class="mdi mdi-lock ms-1"></i>
                  </a>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="pages/log/crud/aksi-logout.php?id=<?=$id?>">
                    <span>Log Out</span>
                    <i class="mdi mdi-logout ms-1"></i>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/karyawan/karyawan.php">
                <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
                <span class="menu-title">Karyawan</span>
              </a>
            </li>
            <li class="nav-item">
              <?php if ($tipe_user == "admin" || $tipe_user == "gudang") {?>
              <a class="nav-link" href="pages/barang/barang.php">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Barang</span>
              </a>
              <?php } ?>
            </li>
            <li class="nav-item">
              <?php if ($tipe_user == "admin") {?>
              <a class="nav-link" href="pages/logging/log.php">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title">Log</span>
              </a>
              <?php } ?>
            </li>
            <li class="nav-item">
              <?php if ($tipe_user == "admin" || $tipe_user == "kasir") { ?>
              <a class="nav-link" href="pages/transaksi/transaksi.php">
                <span class="icon-bg"><i class="mdi mdi-currency-usd menu-icon"></i></span>
                <span class="menu-title">Transaksi</span>
              </a>
              <?php } ?>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/penjualan/penjualan.php">
                <span class="icon-bg"><i class="mdi mdi-tag-multiple menu-icon"></i></span>
                <span class="menu-title">Penjualan</span>
              </a>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="user-details">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="d-flex align-items-center">
                      <div class="sidebar-profile-text">
                        <p class="mb-1"><?=$tipe_user ?></p>
                        <p class="mb-1"><?=substr($nama , 0, 20); ?></p>
                      </div>
                    </div>
                  </div>
                  <?php 
                  if ($tipe_user == "admin") {
                    echo "<div class='badge badge-success'>1</div>";
                  }elseif ($tipe_user == "kasir") {
                    echo "<div class='badge badge-warning'>2</div>";
                  }
                  elseif ($tipe_user == "gudang") {
                    echo "<div class='badge badge-danger'>3</div>";
                  }
                  ?>
                  
                </div>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="#" class="nav-link"
                  ><i class="mdi mdi-settings menu-icon"></i>
                  <span class="menu-title">Settings</span>
                </a>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="#" class="nav-link"><i class="mdi mdi-speedometer menu-icon"></i> <span class="menu-title">Take Tour</span></a>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="pages/log/crud/aksi-logout.php?id=<?=$id?>" class="nav-link"><i class="mdi mdi-logout menu-icon"></i> <span class="menu-title">Log Out</span></a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2">Overview dashboard</h2>
              <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                <div class="btn-group bg-white p-3" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-link text-gray py-0 border-right">7 Days</button>
                  <button type="button" class="btn btn-link text-dark py-0 border-right">1 Month</button>
                  <button type="button" class="btn btn-link text-gray py-0">3 Month</button>
                </div>
                <div class="dropdown ms-0 ml-md-4 mt-2 mt-lg-0">
                  <button class="btn bg-white dropdown-toggle p-3 d-flex align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-calendar me-1"></i>24 Mar 2019 - 24 Mar 2019
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                    <h6 class="dropdown-header">Settings</h6>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                  <ul class="nav nav-tabs tab-transparent" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#" role="tab" aria-selected="true">Users</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" id="business-tab" data-bs-toggle="tab" href="#business-1" role="tab" aria-selected="false">Business</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="performance-tab" data-bs-toggle="tab" href="#" role="tab" aria-selected="false">Performance</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="conversion-tab" data-bs-toggle="tab" href="#" role="tab" aria-selected="false">Conversion</a>
                    </li>
                  </ul>
                  <div class="d-md-block d-none">
                    <a href="#" class="text-light p-1"><i class="mdi mdi-view-dashboard"></i></a>
                    <a href="#" class="text-light p-1"><i class="mdi mdi-dots-vertical"></i></a>
                  </div>
                </div>
                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Orders</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">932.00</h2>
                            <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent">
                              <i class="mdi mdi-lightbulb icon-md absolute-center text-dark"></i>
                            </div>
                            <p class="mt-4 mb-0">Completed</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">5443</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Unique Visitors</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">756,00</h2>
                            <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent">
                              <i class="mdi mdi-account-circle icon-md absolute-center text-dark"></i>
                            </div>
                            <p class="mt-4 mb-0">Increased since yesterday</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">50%</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Impressions</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">100,38</h2>
                            <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-eye icon-md absolute-center text-dark"></i></div>
                            <p class="mt-4 mb-0">Increased since yesterday</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">35%</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Followers</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">4250k</h2>
                            <div class="dashboard-progress dashboard-progress-4 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-cube icon-md absolute-center text-dark"></i></div>
                            <p class="mt-4 mb-0">Decreased since yesterday</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">25%</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 grid-margin">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                  <h4 class="card-title mb-0">Recent Activity</h4>
                                  <div class="dropdown dropdown-arrow-none">
                                    <button class="btn p-0 text-dark dropdown-toggle" type="button" id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuIconButton1">
                                      <h6 class="dropdown-header">Settings</h6>
                                      <a class="dropdown-item" href="#">Action</a>
                                      <a class="dropdown-item" href="#">Another action</a>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-sm-4 grid-margin grid-margin-lg-0">
                                <div class="wrapper pb-5 border-bottom">
                                  <div class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                                    <p class="mb-0 text-dark">Total Profit</p>
                                    <span class="text-success"><i class="mdi mdi-arrow-up"></i>2.95%</span>
                                  </div>
                                  <h3 class="mb-0 text-dark font-weight-bold">$ 92556</h3>
                                  <canvas id="total-profit"></canvas>
                                </div>
                                <div class="wrapper pt-5">
                                  <div class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                                    <p class="mb-0 text-dark">Expenses</p>
                                    <span class="text-success"><i class="mdi mdi-arrow-up"></i>52.95%</span>
                                  </div>
                                  <h3 class="mb-4 text-dark font-weight-bold">$ 59565</h3>
                                  <canvas id="total-expences"></canvas>
                                </div>
                              </div>
                              <div class="col-lg-9 col-sm-8 grid-margin grid-margin-lg-0">
                                <div class="ps-0 ps-lg-4">
                                  <div class="d-xl-flex justify-content-between align-items-center mb-2">
                                    <div class="d-lg-flex align-items-center mb-lg-2 mb-xl-0">
                                      <h3 class="text-dark font-weight-bold me-2 mb-0">Devices sales</h3>
                                      <h5 class="mb-0">( growth 62% )</h5>
                                    </div>
                                    <div class="d-lg-flex">
                                      <p class="me-2 mb-0">Timezone:</p>
                                      <p class="text-dark font-weight-bold mb-0">GMT-0400 Eastern Delight Time</p>
                                    </div>
                                  </div>
                                  <div class="graph-custom-legend clearfix" id="device-sales-legend"></div>
                                  <canvas id="device-sales"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 grid-margin stretch-card">
                        <div class="card card-danger-gradient">
                          <div class="card-body mb-4">
                            <h4 class="card-title text-white">Account Retention</h4>
                            <canvas id="account-retension"></canvas>
                          </div>
                          <div class="card-body bg-white pt-4">
                            <div class="row pt-4">
                              <div class="col-sm-6">
                                <div class="text-center border-right border-md-0">
                                  <h4>Conversion</h4>
                                  <h1 class="text-dark font-weight-bold mb-md-3">$306</h1>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="text-center">
                                  <h4>Cancellation</h4>
                                  <h1 class="text-dark font-weight-bold">$1,520</h1>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="d-xl-flex justify-content-between mb-2">
                              <h4 class="card-title">Page views analytics</h4>
                              <div class="graph-custom-legend primary-dot" id="pageViewAnalyticLengend"></div>
                            </div>
                            <canvas id="page-view-analytic"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="footer-inner-wraper">
              <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
              </div>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
