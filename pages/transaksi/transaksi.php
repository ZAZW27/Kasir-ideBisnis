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
              <a class="nav-link" href="../tables/table.php">
                <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
                <span class="menu-title">Karyawan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../barang/barang.php">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Barang</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logging/log.php">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title">Log</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../transaksi/transaksi.php">
                <span class="icon-bg"><i class="mdi mdi-currency-usd menu-icon"></i></span>
                <span class="menu-title">Transaksi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../penjualan/penjualan.php">
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
                        <p class="mb-1"><?=substr($nama , 0, 24); ?></p>
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
                <a href="../log/crud/aksi-logout.php?id=<?=$id?>  " class="nav-link"><i class="mdi mdi-logout menu-icon"></i> <span class="menu-title">Log Out</span></a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <?php if ($tipe_user == 'admin' || $tipe_user == 'kasir') {?>
          <div class="form-wrapping" >
          <?php } else {?>
          <div class="form-wrapping" hidden>
          <?php } ?>
            <div class="row row--top-20">
              <div class="col-md-12">
                <div class="form-container">
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
                    <div class="wrapping">
                      <div class="boxing">
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
                                <option value="<?=$q['id_barang']?>" ><?=$q['nama_barang'] ?></option>
                              <?php }} ?>
                            </select>
                        </div>
                        <div class="harga-barang">
                          harga: <span id="selectedPrice"></span>
                        </div>
                      </div>
                      <div class="boxing">
                        <div class="inputbox">
                            
                            <input type="number" class="form-control shop-item-quantity" id="quantitas-barang" placeholder="" name="kuantitas"  required />
                            <label class="hover-input" for="nama" class="form-label">Quantitas</label>
                        </div>
                      </div>
                    </div>
                    <div class="button">
                        <button type="submit" class="send-item" onclick="sendButton();">Send!</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php if ($tipe_user == "admin" || $tipe_user == 'kasir') {?>
          <div class="content-wrapper table-content" style="margin-top: 300px;">     
          <?php }else { ?>    
          <div class="content-wrapper table-content">     
          <?php } ?>   
            <!-- MAIN TABLE -->
            <div class="container">
              <div class="row row--top-20">
                <div class="col-md-12">
                  <div class="table-container">
                    <form action="crud/aksi-register.php" method="POST">
                      <div class="submit-btn-container">
                        <button class="submit-btn" type="submit">submit</button>
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
          <footer class="footer" id="down">
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
