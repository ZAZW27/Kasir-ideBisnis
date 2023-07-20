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
    <div hidden id="level-user"><?php echo $tipe_user ?></div>

    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <?php include '../../partials/_navbar.php' ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <?php include '../../partials/_sidebar.php' ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="form-wrapping" >
            <div class="row row--top-20">
              <div class="col-md-12">
                <div class="form-container-kasir">
                  <!-- items -->
                  <div class="cart-item" hidden>
                    <table>
                      <tbody>
                      <?php 
                        $query = mysqli_query($cons, "SELECT * FROM tbl_barang");
                        while ($f = mysqli_fetch_array($query)) {?>
                        <tr>
                          <td><div class="nama-barang-hidden" id="<?=$f['id_barang']?>-nama"><?=$f['nama_barang'] ?></div></td>
                          <td><div class="harga-barang-hidden" id="<?=$f['id_barang']?>-harga"><?=$f['harga_satuan'] ?></div></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="form">
                    <div class="wrap-kasir">
                      <div class="boxing-kasir">
                        <div class="inputbox">
                            <select class="form-control nama-produk shop-item-title" name="barang" onchange="updateHarga();" id="select-barang">
                              <?php 
                                $query = mysqli_query($cons, "SELECT * FROM tbl_barang ORDER BY kode_barang ASC");
                    
                                $a = 0;
            
                                while ($q = mysqli_fetch_array($query)) {
                              ?>
                              <?php if ($q['jumlah_barang'] <= 0) { ?>
                                <option value="<?=$q['id_barang']?>" disabled><?=$q['nama_barang'] ?> ====OUT OF STOCKS====</option>
                              <?php }else {?>
                                <option value="<?=$q['id_barang']?>" ><?=$q['nama_barang'], " : ", $q['jumlah_barang']?></option>
                              <?php }} ?>
                            </select>
                        </div>
                        <div class="harga-barang">
                          harga: <span id="selectedPrice"></span>
                        </div>
                      </div>
                      <div class="boxing-kasir">
                        <div class="inputbox">
                            <input type="number" class="form-control shop-item-quantity" id="quantitas-barang" placeholder="" name="kuantitas"  required />
                            <label class="hover-input" for="nama" class="form-label">Quantitas</label>
                        </div>
                      </div>
                    </div>
                    <div class="button" style="margin-top: 0px;">
                        <button type="submit" class="send-item confirm" onclick="sendButton();">Add!</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
          <div class="content-wrapper table-content">     
            <!-- MAIN TABLE -->
            <div class="container">
              <div class="row row--top-20">
                <div class="col-md-12">
                  <div class="table-container">
                    <form action="crud/aksi-register.php" method="POST" id="transaksiTable">
                      <div class="submit-btn-container">
                        <button class="submit-btn" type="submit" onclick="window.print()">submit</button>
                      </div>
                      <input type="text" name='id' value="<?=$id?>" hidden>
                      <table class="table">
                        <thead class="table__thead">
                          <tr class="cart-row">
                            <th class="table__th">ID Transaksi</th>
                            <th class="table__th cart-price">harga</th>
                            <th class="table__th">Quantitas</th>
                            <?php if ($tipe_user=="admin" || $tipe_user=="kasir") {echo '<th class="table__th">Action</th>';} ?>
                          </tr>
                        </thead>
                        
                        <tbody class="table__tbody cart-items" id="table-body">
                          <!-- IDI TABLE YANG AKAN DI INPUT DARI JAVA SCRIPT ================================ -->
                        </tbody>
                        <div class="total-harga">
                          <span class="total cart-total-price">Rp 0</span>
                        </div>
                      </table>
                      
                    </form>
                  </div>
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
    <script src="crud/store.js"></script>
  </body>
</html>
