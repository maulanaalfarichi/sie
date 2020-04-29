<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- <title>Fruts Cafe</title> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/icon/g.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="#"><img src="{{ asset('assets/images/icon/logo.png') }}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            @if(auth()->user()->role == 'admin')
                            <li>
                                <a href="{{ route('dashboard') }}"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i><span>Surabaya</span></a>
                                <ul class="collapse">
									<li>
                                        <a href="#" aria-expanded="true">Data Master</a>
                                        <ul class="collapse">
                                            <li><a href="/menusby">Data Menu</a></li>
                                            <li><a href="/karyawansby">Data Karyawan</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" aria-expanded="true">Laporan</a>
                                        <ul class="collapse">
                                            <li><a href="/lapormenusby">Laporan Penjualan</a></li>
                                            <li><a href="/laporkaryawansby">Laporan Karyawan</a></li>
                                            <li><a href="/laporpengunjungsby">Laporan Pengunjung</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Gresik</span>
                                </a>
                                <ul class="collapse">
									<li>
                                        <a href="#" aria-expanded="true">Data Master</a>
                                        <ul class="collapse">
                                            <li><a href="/menugsk">Data Menu</a></li>
                                            <li><a href="/karyawangsk">Data Karyawan</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" aria-expanded="true">Laporan</a>
                                        <ul class="collapse">
                                            <li><a href="/lapormenugsk">Laporan Penjualan</a></li>
                                            <li><a href="/laporkaryawangsk">Laporan Karyawan</a></li>
                                            <li><a href="/laporpengunjunggsk">Laporan Pengunjung</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            @elseif(auth()->user()->role == 'admin_gresik')
                            <li>
                                <a href="{{ route('dashboard') }}"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i><span>Data Master</span></a>
                                <ul class="collapse">
                                    <li><a href="/menugsk">Data Menu</a></li>
                                    <li><a href="/karyawangsk">Data Karyawan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-book"></i><span>Laporan</span></a>
                                <ul class="collapse">
                                    <li><a href="/lapormenugsk">Laporan Penjualan</a></li>
                                    <li><a href="/laporkaryawangsk">Laporan Karyawan</a></li>
                                    <li><a href="/laporpengunjunggsk">Laporan Pengunjung</a></li>
                                </ul>
                            </li>
                            @elseif(auth()->user()->role == 'admin_surabaya')
                            <li>
                                <a href="{{ route('dashboard') }}"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i><span>Data Master</span></a>
                                <ul class="collapse">
                                    <li><a href="/menusby">Data Menu</a></li>
                                    <li><a href="/karyawansby">Data Karyawan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-book"></i><span>Laporan</span></a>
                                <ul class="collapse">
                                    <li><a href="/lapormenusby">Laporan Penjualan</a></li>
                                    <li><a href="/laporkaryawansby">Laporan Karyawan</a></li>
                                    <li><a href="/laporpengunjungsby">Laporan Pengunjung</a></li>
                                </ul>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('dashboard') }}"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-book"></i><span>Laporan Surabaya</span></a>
                                <ul class="collapse">
                                    <li><a href="/grafikpenjualansby">Laporan Penjualan</a></li>
                                    <li><a href="/grafikkaryawansby">Laporan Karyawan</a></li>
                                    <li><a href="/grafikpengunjungsby">Laporan Pengunjung</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-book"></i><span>Laporan Gresik</span></a>
                                <ul class="collapse">
                                    <li><a href="/grafikpenjualangsk">Laporan Penjualan</a></li>
                                    <li><a href="/grafikkaryawangsk">Laporan Karyawan</a></li>
                                    <li><a href="/grafikpengunjunggsk">Laporan Pengunjung</a></li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="header-area">
                <div class="row align-items-center">
                    <div class="col-md-6 col-sm-8 clearfix"></div>
                     <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="{{ asset('assets/images/author/avatar.png') }}" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ auth()->user()->name }}<i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('konten')
        </div>
    </div>
    <footer>
        <div class="footer-area">
            <p>Sistem Informasi 2017</p>
        </div>
    </footer>
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    {{-- <script src="http://github.highcharts.com/master/highcharts.js"></script> --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="{{ asset('assets/js/line-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('assets/js/pie-chart.js') }}"></script>
    <!-- all bar chart -->
    <script src="{{ asset('assets/js/bar-chart.js') }}"></script>
    <!-- all map chart -->
    <script src="{{ asset('assets/js/maps.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>
