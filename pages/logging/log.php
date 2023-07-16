<?php 
include '../../config.php';
SESSION_START();
if ($_SESSION['tipe_user']=="") {
 header("location:../log/login.php");
}

// store the sessions
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
                                }
                                
                                ?>
                                
                            </div>
                          </td>
                          
                        </tr>
                        <?php 
                          }
                        ?>
                        <!-- <tr class="table-row table-row--thomas">
                          <td class="table-row__td">
                            <input id="" type="checkbox" class="table__select-row" />
                          </td>
                          <td class="table-row__td">
                            <div class="table-row__img"></div>
                            <div class="table-row__info">
                              <p class="table-row__name">Thomas Perez</p>
                              <span class="table-row__small">CEO</span>
                            </div>
                          </td>
                          <td class="table-row__td">
                            <div class="">
                              <p class="table-row__policy">$45,000</p>
                              <span class="table-row__small">All Inclusive Policy</span>
                            </div>
                          </td>
                          <td class="table-row__td">
                            <p class="table-row__p-status status--red status">Approved</p>
                          </td>
                          <td class="table-row__td">New York, US</td>
                          <td class="table-row__td">
                            <p class="table-row__status status status--yellow">Active</p>
                          </td>
                          <td class="table-row__td">
                            <p class="table-row__progress status status--green">Done</p>
                          </td>
                          <td class="table-row__td">
                            <svg
                              data-toggle="tooltip"
                              data-placement="bottom"
                              title="Edit"
                              version="1.1"
                              class="table-row__edit"
                              xmlns="http://www.w3.org/2000/svg"
                              xmlns:xlink="http://www.w3.org/1999/xlink"
                              x="0px"
                              y="0px"
                              viewBox="0 0 512.001 512.001"
                              style="enable-background: new 0 0 512.001 512.001"
                              xml:space="preserve"
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

                            <svg
                              data-toggle="tooltip"
                              data-placement="bottom"
                              title="Delete"
                              version="1.1"
                              class="table-row__bin"
                              xmlns="http://www.w3.org/2000/svg"
                              xmlns:xlink="http://www.w3.org/1999/xlink"
                              x="0px"
                              y="0px"
                              viewBox="0 0 512 512"
                              style="enable-background: new 0 0 512 512"
                              xml:space="preserve"
                            >
                              <g>
                                <g>
                                  <path
                                    d="M436,60h-90V45c0-24.813-20.187-45-45-45h-90c-24.813,0-45,20.187-45,45v15H76c-24.813,0-45,20.187-45,45v30    c0,8.284,6.716,15,15,15h16.183L88.57,470.945c0.003,0.043,0.007,0.086,0.011,0.129C90.703,494.406,109.97,512,133.396,512    h245.207c23.427,0,42.693-17.594,44.815-40.926c0.004-0.043,0.008-0.086,0.011-0.129L449.817,150H466c8.284,0,15-6.716,15-15v-30    C481,80.187,460.813,60,436,60z M196,45c0-8.271,6.729-15,15-15h90c8.271,0,15,6.729,15,15v15H196V45z M393.537,468.408    c-0.729,7.753-7.142,13.592-14.934,13.592H133.396c-7.792,0-14.204-5.839-14.934-13.592L92.284,150h327.432L393.537,468.408z     M451,120h-15H76H61v-15c0-8.271,6.729-15,15-15h105h150h105c8.271,0,15,6.729,15,15V120z"
                                    style="fill: rgb(158, 171, 180)"
                                  ></path>
                                </g>
                              </g>
                              <g>
                                <g><path d="M256,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C271,186.716,264.284,180,256,180z" style="fill: rgb(158, 171, 180)"></path></g>
                              </g>
                              <g>
                                <g><path d="M346,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C361,186.716,354.284,180,346,180z" style="fill: rgb(158, 171, 180)"></path></g>
                              </g>
                              <g>
                                <g><path d="M166,180c-8.284,0-15,6.716-15,15v212c0,8.284,6.716,15,15,15s15-6.716,15-15V195C181,186.716,174.284,180,166,180z" style="fill: rgb(158, 171, 180)"></path></g>
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
                          </td>
                        </tr> -->
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
