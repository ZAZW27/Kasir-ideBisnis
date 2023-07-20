<?php 
include '../../config.php';
SESSION_START();
if ($_SESSION['tipe_user']=="") {
 header("location:../log/login.php");
}

// store the sessions
$id=$_SESSION["id_user"];
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
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="../log/crud/aksi-logout.php?id=<?=$id?>">
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
        <?php include '../../partials/_sidebar.php' ?>
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

                    $query = mysqli_query($cons, "SELECT * FROM user WHERE id_user='$id'");

                    $u = mysqli_fetch_array($query);
                    ?>
                    <div class="wrapping">
                      <div class="boxing">
                        <div class="inputbox">
                            <input value="<?=$u['id_user']?>"type="text" class="form-control" id="nama" placeholder="" name="id" hidden />
                            <input value="<?=$u['nama']?>" type="text" class="form-control" id="nama" placeholder="" name="nama" required />
                            <label class="hover-input" for="nama" class="form-label">Nama</label>
                        </div>
                        <div class="inputbox">
                            <input value="<?=$u['username']?>" type="text" class="form-control" id="kelas" placeholder="" name="username" required />
                            <label class="hover-input" for="nama" class="form-label">Username</label>
                        </div>
                        <div class="inputbox">
                          <input value="<?=$u['alamat']?>" type="text" class="form-control" id="kelas" placeholder="" name="alamat" required />
                            <label class="hover-input" for="nama" class="form-label">Alamat</label>
                        </div>
                      </div>
                      <div class="boxing">
                        <div class="inputbox">
                            <input value="<?=$u['password']?>" type="text" class="form-control" id="nama" placeholder="" name="password" required />
                            <label class="hover-input" for="nama" class="form-label">Password</label>
                        </div>
                        <div class="inputbox">
                            <input value="<?=$u['telpon']?>" type="number" class="form-control" id="kelas" placeholder="" name="telp" required />
                            <label class="hover-input" for="nama" class="form-label">Telp</label>
                        </div>
                        <div class="inputbox">
                            <input value="<?=$u['tipe_user']?>" type="text" class="form-control" id="kelas" placeholder="" name="tipe" required />
                            <label class="hover-input" for="nama" class="form-label">Tipe kerjaan</label>
                        </div>
                      </div>
                    </div>
                    <div class="button">
                      <div class="button-container">
                        <div class="button"> <!-- Updated class name -->
                          <a href="karyawan.php" class="cancel">Cancel</a>
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
