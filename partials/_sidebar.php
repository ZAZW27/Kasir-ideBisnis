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
              <a class="nav-link" href="../karyawan/karyawan.php">
                <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
                <span class="menu-title">Karyawan</span>
              </a>
            </li>
            <li class="nav-item">
              <?php if ($tipe_user == "admin" || $tipe_user == "gudang") {?>
              <a class="nav-link" href="../barang/barang.php">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Barang</span>
              </a>
              <?php } ?>
            </li>
            <li class="nav-item">
              <?php if ($tipe_user == "admin") {?>
              <a class="nav-link" href="../logging/log.php">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title">Log</span>
              </a>
              <?php } ?>
            </li>
            <li class="nav-item">
              <?php if ($tipe_user == "admin" || $tipe_user == "kasir") { ?>
              <a class="nav-link" href="../transaksi/transaksi.php">
                <span class="icon-bg"><i class="mdi mdi-currency-usd menu-icon"></i></span>
                <span class="menu-title">Transaksi</span>
              </a>
              <?php } ?>
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
                <a href="../log/crud/aksi-logout.php?id=<?=$id?>" class="nav-link"><i class="mdi mdi-logout menu-icon"></i> <span class="menu-title">Log Out</span></a>
              </div>
            </li>
          </ul>
        </nav>