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
      <!-- partial:../../partials/_navbar.php -->
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
              <?php if ($tipe_user == "admin" || $tipe_user == "kasir") {?>
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
                          <th class="table__th"><input id="selectAll" type="checkbox" class="table__select-row" /></th>
                          <th class="table__th">Name</th>
                          <?php if ($tipe_user == "admin"){echo "<th class='table__th'>Password</th>";}?>
                          <th class="table__th">No. Telp</th>
                          <th class="table__th">Alamat</th>
                          <?php if ($tipe_user == "admin"){echo "<th class='table__th'>Action</th>";}?>
                        </tr>
                      </thead>
                      <tbody class="table__tbody">
                        <?php 
                          if ($tipe_user == "admin") {
                            $query = mysqli_query($cons, "SELECT * FROM user ORDER BY nama ASC");
                          }else {
                            $query = mysqli_query($cons, "SELECT * FROM user WHERE tipe_user='$tipe_user' ORDER BY nama ASC");
                          }
                          

                          $no = 1;

                          while ($u = mysqli_fetch_array($query)) {
                            
                          
                        ?>
                        <tr class="table-row">
                          <td class="table-row__td">
                            <input id="" type="checkbox" class="table__select-row" />
                          </td>
                          <td class="table-row__td">
                            <?php 
                            if ($u['profile_user'] == '') {
                            ?>
                            <div class="table-row__img" style="background-image: url('../../assets/images/user_profile/default.png');"></div>
                            <?php }
                            else {
                            ?>
                            <div class="table-row__img" style="background-image: url('../../assets/images/user_profile/<?=$u['profile_user']?>');"></div>
                            <?php } ?>
                            <div class="table-row__info">
                              <p class="table-row__name "><?=$u['nama']?></p>
                              <?php if ($u['tipe_user'] == 'admin') { ?>
                              <span class="table-row__small status status--green"><?=$u['username']?></span>
                              <?php }elseif ($u['tipe_user'] == 'kasir') { ?>
                              <span class="table-row__small status status--yellow"><?=$u['username']?></span>
                              <?php }elseif ($u['tipe_user'] == 'gudang') { ?>
                              <span class="table-row__small status status--red"><?=$u['username']?></span>
                              <?php } ?>
                            </div>
                          </td>
                          <?php if ($tipe_user =="admin") {?>
                          <td data-column="Password" class="table-row__td"><?=$u['password']?></td>
                          <?php } ?>
                          <td data-column="No. Tlp" class="table-row__td">
                            <div class="">
                              <p class="table-row__policy"><?=$u['telpon']?></p>
                            </div>
                          </td>
                          <td data-column="Alamat" class="table-row__td"><?=$u['alamat']?></td>
                          <?php if ($tipe_user == "admin"){?>
                            <td class="table-row__td">
                              <a href="update.php?id=<?=$u['id_user']?>">
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
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->

    <!-- adding pagination to tables -->
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
