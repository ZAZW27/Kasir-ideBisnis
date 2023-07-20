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
            <?php if ($tipe_user == "admin" || $tipe_user == "gudang") {?>
              <div class="add-new-record-btn">
               <a href="tambah.php"><i class="mdi mdi-plus-circle-outline new-record-icon"></i> <span class="new-record-text">Tambah barang baru</span>  </a>
              </div>
            <?php } ?>    
              <div class="row row--top-20">
                <div class="col-md-12">
                  <div class="table-container">
                    <table class="table" id="data-table-default">
                      <thead class="table__thead">
                        <tr>
                          <th class="table__th">Kode</th>
                          <th class="table__th">Name barang</th>
                          <th class="table__th">Jumlah & Jenis</th>
                          <th class="table__th">Expires</th>
                          <?php if ($tipe_user == "admin" || $tipe_user == "gudang"){echo "<th class='table__th'>Action</th>";}?>
                        </tr>
                      </thead>
                      <tbody class="table__tbody">
                        <?php 
                          $query = mysqli_query($cons, "SELECT * FROM tbl_barang ORDER BY kode_barang ASC");

                          $no = 1;

                          while ($u = mysqli_fetch_array($query)) {
                            
                          
                        ?>
                        <tr class="table-row">
                          <td class="table-row__td">
                            <div class="">
                            <?php if ($u['jumlah_barang'] == 0) {?>
                              <p class="table-row__policy status status--red"><?=$u['kode_barang']?></p>
                            <?php } else { ?>
                              <p class="table-row__policy"><?=$u['kode_barang']?></p>
                            <?php } ?>
                            </div>
                          </td>
                          <td class="table-row__td">
                            <div class="table-row__info">
                              <p class="table-row__name"><?=$u['nama_barang']?></p>
                              <span class="table-row__small status--red">Rp <?=number_format($u['harga_satuan'], 0,',','.')?></span>
                            </div>
                          </td>
                          <td data-column="Jumlah & Satuan" class="table-row__td">
                            <div class="table-row__info">
                              <?php if ($u['jumlah_barang'] == 0) {?>
                              <p class="table-row__policy status--red"><?=$u['jumlah_barang']?></p>
                              <?php }else { ?>
                              <p class="table-row__policy"><?=$u['jumlah_barang']?></p>
                              <?php } ?>
                              <span class="table-row__small"><?=$u['satuan']?></span>
                            </div>
                          </td>
                          <td data-column="Expiration" class="table-row__td"><?=$u['expired_date']?></td>
                          <?php if ($tipe_user == "admin" || $tipe_user == "gudang"){?>
                            <td class="table-row__td">
                              <a href="update.php?id=<?=$u['id_barang']?>">
                                <svg
                                  version="1.1"
                                  class="table-row__edit"
                                  xmlns="http://www.w3.org/2000/svg"
                                  xmlns:xlink="http://www.w3.org/1999/xlink"
                                  x="0px"
                                  y="0px"
                                  viewBox="0 0 512.001 512.001"
                                  style="enable-background: new 0 0 512.001 512.001"
                                  xml:space="preserve"
                                  data-toggle="tooltip"
                                  data-placement="bottom"
                                  title="Edit"
                                >
                                  <g>
                                    <g>
                                      <path d="M496.063,62.299l-46.396-46.4c-21.2-21.199-55.69-21.198-76.888,0l-18.16,18.161l123.284,123.294l18.16-18.161    C517.311,117.944,517.314,83.55,496.063,62.299z" style="fill: rgb(1, 185, 209)"></path>
                                    </g>
                                  </g>
                                  <g>
                                    <g>
                                      <path d="M22.012,376.747L0.251,494.268c-0.899,4.857,0.649,9.846,4.142,13.339c3.497,3.497,8.487,5.042,13.338,4.143    l117.512-21.763L22.012,376.747z" style="fill: rgb(1, 185, 209)"></path>
                                    </g>
                                  </g>
                                  <g>
                                    <g><polygon points="333.407,55.274 38.198,350.506 161.482,473.799 456.691,178.568   " style="fill: rgb(1, 185, 209)"></polygon></g>
                                  </g>
                                  <g></g>
                                  <g></g>
                                  <g></g>
                                  <g></g>
                                  <g></g>
                                  <g></g>
                                  <g></g>
                                  <g></g>
                                  <g></g>
                                  <g></g>
                                  <g></g>
                                  <g></g>
                                  <g></g>
                                  <g></g>
                                  <g></g>
                                </svg>
                              </a>
                            </td>
                          <?php } ?>
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

    <!-- DataTables and Pagination -->
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
