<?php 
include '../../config.php';
SESSION_START();
if ($_SESSION['tipe_user']=="") {
 header("location:../log/login.php");
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
      <?php include '../../partials/_navbar.php' ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <?php include '../../partials/_sidebar.php' ?>
        <!-- partial -->
        <div class="main-panel">
          <?php if ($tipe_user == 'admin' || $tipe_user == "gudang") {?>
          <div class="form-wrapping" >
          <?php } else {?>
          <div class="form-wrapping" hidden>
          <?php } ?>
            <div class="row row--top-20">
              <div class="col-md-12">
                <div class="form-container">
                  <form method="POST" action="crud/aksi-register.php">
                    <div class="wrapping">
                        <div class="wraps">
                            <div class="boxing">
                              <input type="text" value="<?=$id?>" class="form-control" id="id_user" placeholder="" name="id" hidden/>
                              <div class="inputbox">
                                <input type="text" class="form-control" id="nama" placeholder="" name="nama" required />
                                <label class="hover-input" class="form-label">Nama barang</label>
                              </div>
                              <div class="inputbox">
                                <input type="text" class="form-control" id="kelas" placeholder="" name="kode" required />
                                <label class="hover-input" class="form-label">Kode barang</label>
                              </div>
                              <div class="inputbox">
                                <input type="date" class="form-control" id="kelas" placeholder="" name="expire" required />
                                <label class="hover-input" class="form-label">Expired date</label>
                              </div>
                            </div>
                            <div class="boxing">
                              <div class="inputbox">
                                <input type="number" class="form-control" id="nama" placeholder="" name="jumlah" required />
                                <label class="hover-input" class="form-label">Jumlah masuk</label>
                              </div>
                              <div class="inputbox">
                                <input type="text" class="form-control" id="kelas" placeholder="" name="satuan" required />
                                <label class="hover-input" class="form-label">Satuan barang</label>
                              </div>
                              <div class="inputbox">
                                <input type="number" class="form-control" id="kelas" placeholder="" name="harga" required />
                                <label class="hover-input" class="form-label">Harga barang</label>
                              </div>
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
          <?php include '../../partials/_footer.php' ?>
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
