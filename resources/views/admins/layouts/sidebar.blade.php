  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('lte/')}}/index3.html" class="brand-link text-center">
      <!-- <img src="{{asset('lte/')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Sistem Informasi Akuntansi</span><br>
      <span class="brand-text font-weight-light">Balitekno</span><br>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/bit-bg-w.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{session()->get('dataLoginAdmins')['nama']}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/data_user" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Data User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/data_daftar_akun" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Data Daftar Akun
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/data_pemasukan" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Data Pemasukan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/data_pengeluaran" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Data Pengeluaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/data_hutang" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Data Hutang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/data_piutang" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Data Piutang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/data_transaksi" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Data Transaksi
              </p>
            </a>
          </li>
          <!-- dropdown -->
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Data Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/detail_jurnal_umum" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurnal Umum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/buku_besar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku Besar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/neraca_saldo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Neraca Saldo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/laba_rugi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laba Rugi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/perubahan_modal" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perubahan Modal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/neraca" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Neraca</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/cari_riwayat_pembatalan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Pembatalan</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>