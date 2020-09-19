  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Pilwe 0.1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/admin" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pemilihan" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Pemilihan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/calon" class="nav-link <?= url()->current() == 'admin/calon' ? 'active':'';?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Calon 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/warga" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Warga
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/saksi" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Saksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/rt" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                RT
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/bilik" class="nav-link">
              <i class="nav-icon fas fa-person-booth"></i>
              <p>
                Bilik Suara
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/quick/quick_count" class="nav-link" target="_blank">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Quick Count
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/report" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/system" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Setting System
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/system/reset" class="nav-link">
              <i class="nav-icon fas fa-sync-alt"></i>
              <p>
                Reset
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
