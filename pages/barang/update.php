<?php 
include '../../config.php';
SESSION_START();
if ($_SESSION['tipe_user']=="") {
 header("location:../log/login.php");
}

// store the sessions
$id_user=$_SESSION['id_user'];
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
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/mycss.css?v=<?php echo time(); ?>" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../../index.php"><img src="../../assets/images/logo-new.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="../../assets/images/logo-new.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-xl-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search products" />
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                    <img src="../../assets/images/user_profile/<?=$profile_user?>" alt="image" />
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
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
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
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
              <a class="nav-link" href="../../index.php">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/tables/table.php">
                <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
                <span class="menu-title">Karyawan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/barang/barang.php">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Barang</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/logging/log.php">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title">Log</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/transaksi/transaksi.php">
                <span class="icon-bg"><i class="mdi mdi-currency-usd menu-icon"></i></span>
                <span class="menu-title">Transaksi</span>
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
                <a href="#" class="nav-link"><i class="mdi mdi-logout menu-icon"></i> <span class="menu-title">Log Out</span></a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <?php if ($tipe_user == 'admin') {?>
          <div class="form-wrapping" >
          <?php } else {?>
          <div class="form-wrapping" hidden>
          <?php } ?>
            <div class="row row--top-20">
              <div class="col-md-12">
                <div class="form-container">
                  <form method="POST" action="crud/aksi-update.php">
                    <?php 
                    $id = $_GET['id'];

                    $query = mysqli_query($cons, "SELECT * FROM tbl_barang WHERE id_barang='$id'");

                    $u = mysqli_fetch_array($query);
                    ?>
                    <div class="wrapping">
                      <div class="boxing">
                      <input value="<?=$id_user?>" type="text" class="form-control" id="nama" placeholder="" name="id_user" hidden/>
                        <div class="inputbox">
                            <input value="<?=$u['id_barang']?>" type="text" class="form-control" id="nama" placeholder="" name="id" hidden />
                            <input value="<?=$u['nama_barang']?>" type="text" class="form-control" id="nama" placeholder="" name="nama" required />
                            <label class="hover-input" for="nama" class="form-label">Nama barang</label>
                        </div>
                        <div class="inputbox">
                            <input value="<?=$u['jumlah_barang']?>" type="text" class="form-control" id="kelas" placeholder="" name="jumlah" required />
                            <label class="hover-input" for="nama" class="form-label">Jumlah barang</label>
                        </div>
                        <div class="inputbox">
                          <input value="<?=$u['satuan']?>" type="text" class="form-control" id="kelas" placeholder="" name="satuan" required />
                            <label class="hover-input" for="nama" class="form-label">Satuan / kemasan</label>
                        </div>
                      </div>
                      <div class="boxing">
                        <div class="inputbox">
                            <input value="<?=$u['kode_barang']?>" type="text" class="form-control" id="nama" placeholder="" name="kode" required />
                            <label class="hover-input" for="nama" class="form-label">Kode barang</label>
                        </div>
                        <div class="inputbox">
                            <input value="<?=$u['expired_date']?>" type="date" class="form-control" id="kelas" placeholder="" name="expire" required />
                            <label class="hover-input" for="nama" class="form-label">Expired date</label>
                        </div>
                        <div class="inputbox">
                            <input value="<?=$u['harga_satuan']?>" type="text" class="form-control" id="kelas" placeholder="" name="harga" required />
                            <label class="hover-input" for="nama" class="form-label">Harga Barang</label>
                        </div>
                      </div>
                    </div>
                    <div class="button">
                      <div class="button-container">
                        <div class="button"> <!-- Updated class name -->
                          <a href="barang.php" class="cancel">Cancel</a>
                        </div>
                        <div class="button"> <!-- Updated class name -->
                          <button class="confirm" type="submit">Confirm!</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>
