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
          <div class="content-wrapper table-content">     
            <!-- MAIN TABLE -->
            <div class="container">
              <div class="row row--top-20">
                <div class="col-md-12">
                  <div class="table-container">
                    <br>
                    <br>
                    <table class="table" id="data-table-default">
                      <thead class="table__thead">
                        <tr>
                          <th class="table__th">NO</th>
                          <th class="table__th">No Transaksi</th>
                          <th class="table__th">Tanggal transaksi</th>
                          <th class="table__th">Total bayar</th>
                          <th class="table__th">Barang</th>
                        </tr>
                      </thead>
                      <tbody class="table__tbody">
                        <?php 
                          $query = mysqli_query($cons, "SELECT * FROM tbl_transaksi INNER JOIN tbl_barang ON tbl_barang.id_barang=tbl_transaksi.id_barang GROUP BY no_transaksi ORDER BY tgl_transaksi DESC");

                          $no = 1;

                          while ($u = mysqli_fetch_array($query)) {
                            
                          
                        ?>
                        <tr class="table-row">
                          <td class="table-row__td">
                            <div class="">
                              <p class="table-row__policy"><?=$no++ ?></p>
                            </div>
                          </td>
                          <td class="table-row__td">
                            <div class="table-row__info">
                              <p class="table-row__name"><?=$u['no_transaksi']?></p>
                            </div>
                          </td>
                          <td data-column="Jumlah & Satuan" class="table-row__td">
                            <div class="table-row__info">
                                <p class="table-row__policy"><?=$u['tgl_transaksi']?></p>
                            </div>
                          </td>
                          <td data-column="Jumlah & Satuan" class="table-row__td">
                            <div class="table-row__info">
                              <?php 
                              $id_trans = $u['no_transaksi'];
                              $query3 = mysqli_query($cons, "SELECT * FROM tbl_transaksi WHERE no_transaksi='$id_trans'");
                              if ($query3) {
                                $hargaTotal = 0;
                                while ($total = mysqli_fetch_array($query3)) {
                                  $hargaTotal += $total['total_bayar'];
                                }
                                if ($hargaTotal > 0) {
                                  
                              ?>
                              <p class='table-row__policy status--red'>Rp <?= number_format($hargaTotal, 0, ',', '.')?></p>
                              <?php  }} ?>
                            </div>
                          </td>
                          <td data-column="Jumlah & Satuan" class="table-row__td">
                            <div class="table-row__info">
                              <table class="table_barang_row">
                                <tbody>
                                  <?php 
                                  $query4 = mysqli_query($cons, "SELECT * FROM tbl_transaksi INNER JOIN tbl_barang ON tbl_barang.id_barang=tbl_transaksi.id_barang WHERE no_transaksi='$id_trans'");
                                  while ($namaBarang = mysqli_fetch_array($query4)) {?>
                                  <tr>
                                    <td class="nama_barang_cell">
                                      <p class="table-row__policy "><?=$namaBarang['nama_barang']?> </p>
                                    </td>
                                    <td class="kuantitas_barang_cell">
                                      <p class="table-row__policy "><?=$namaBarang['kuantitas']?> </p>
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                              
                            </div>
                          </td>
                          
                        </tr>
                        <?php 
                          }
                        ?>
                      </tbody>
                    </table>
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

    <!-- add pagination to tables -->
    <script src="../../assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <!-- <script src="../../assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script> -->
    <script src="../../assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>



    <script>
        $('#data-table-default').DataTable({
            responsive: true
        });
    </script>

  </body>
</html>
