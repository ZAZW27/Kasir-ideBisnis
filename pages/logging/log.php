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
                          <th class="table__th">ID</th>
                          <th class="table__th">Nama</th>
                          <th class="table__th">Waktu Loh</th>
                          <th class="table__th">Aktivitas</th>
                        </tr>
                      </thead>
                      <tbody class="table__tbody" >
                        <?php 
                          $query = mysqli_query($cons, "SELECT * FROM tbl_log INNER JOIN user ON tbl_log.id_user=user.id_user ORDER BY waktu DESC");

                          $no = 1;

                          while ($u = mysqli_fetch_array($query)) {
                            
                          
                        ?>
                        <tr class="table-row">
                          <td class="table-row__td">
                            <div class="">
                              <p class="table-row__policy"><?=$u['id_user']?></p>
                            </div>
                          </td>
                          <td class="table-row__td">
                            <div class="table-row__info">
                              <p class="table-row__name"><?=$u['nama']?></p>
                              <span class="table-row__small "><?=$u['username']?></span>
                            </div>
                          </td>
                          <td data-column="Jumlah & Satuan" class="table-row__td">
                            <div class="table-row__info">
                                <p class="table-row__policy"><?=$u['waktu']?></p>
                            </div>
                          </td>
                          <td data-column="Jumlah & Satuan" class="table-row__td">
                            <div class="table-row__info">
                                <?php if ($u['aktivitas']=="Log in") {
                                    echo "<p class='table-row__policy status status--green'>Log in</p>";
                                }elseif ($u['aktivitas']=="Log out") {
                                   echo "<p class='table-row__policy status status--red'>Log out</p>";
                                }else {?>
                                <p class='table-row__policy status status--yellow'><?=$u['aktivitas'] ?></p>
                                <?php } ?>
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
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->

    <!-- ADD PAGINATION TO TABLES -->
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
