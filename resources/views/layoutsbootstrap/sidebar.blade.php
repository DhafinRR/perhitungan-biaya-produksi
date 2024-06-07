 

<body>
   Body Wrapper 
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
	
	
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="{{asset('img/produksi.png')}}" width="200" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div> 
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Masterdata</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('pegawai') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Pegawai</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('pekerjaan') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-briefcase"></i>
                </span>
                <span class="hide-menu">Pekerjaan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('bahanbaku') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-building-store"></i>
                </span>
                <span class="hide-menu">Bahan Baku</span>
              </a>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('biayalainnya') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-files"></i>
                </span>
                <span class="hide-menu">Biaya Lainnya</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('coa') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-clipboard"></i>
                </span>
                <span class="hide-menu">Coa</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Transaksi</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('pembelian') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-files"></i>
                </span>
                <span class="hide-menu">Pembelian</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('penjualan') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart"></i>
                </span>
                <span class="hide-menu">Penjualan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('pembayaran/viewkeranjang') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-credit-card"></i>
                </span>
                <span class="hide-menu">Pembayaran</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('pembayaran/viewstatus') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-credit-card"></i>
                </span>
                <span class="hide-menu">Status Pembayaran</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('pembayaran/viewapprovalstatus') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-credit-card"></i>
                </span>
                <span class="hide-menu">Approval Pembayaran</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Login</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">LAPORAN</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('jurnal/umum') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-files"></i>
                </span>
                <span class="hide-menu">Jurnal Umum</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('jurnal/bukubesar') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-archive"></i>
                </span>
                <span class="hide-menu">Buku Besar</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">GRAFIK</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('grafik/viewPenjualanBlnBerjalan') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-dashboard"></i>
                </span>
                <span class="hide-menu">Penjualan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('grafik/viewJmlPenjualan') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Barang</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('grafik/viewJmlBarangTerjual') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-package"></i>
                </span>
                <span class="hide-menu">Barang Per Bulan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('grafik/viewPenjualanSelectOption/2024') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-package"></i>
                </span>
                <span class="hide-menu">Penjualan AJAX</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('pembayaran/viewstatusPG') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-credit-card"></i>
                </span>
                <span class="hide-menu">View Status PG</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('midtrans/bayar') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-credit-card"></i>
                </span>
                <span class="hide-menu">Pembayaran PG</span>
              </a>
            </li>
          
          <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
              <div class="unlimited-access-title me-3">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
              </div>
              <div class="unlimited-access-img">
                <img src="{{asset('images/backgrounds/rocket.png')}}" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End