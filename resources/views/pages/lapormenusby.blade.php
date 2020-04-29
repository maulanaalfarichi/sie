@extends('layout.master')
@section('konten')
<title>Fruts Cafe - Lapor Menu Surabaya</title>
        <!-- main content area start -->
             <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Laporan Menu - Surabaya</h4>
                            <iframe scrolling="no" frameborder="no" clocktype="html5" style="overflow:hidden;border:0;margin:0;padding:0;width:240px;height:20px;"src="https://www.clocklink.com/html5embed.php?clock=018&timezone=Indonesia_Surabaya&color=gray&size=240&Title=&Message=&Target=&From=2020,1,1,0,0,0&DateFormat=yyyy / MMM / d&TimeFormat=h:m:s TT&Color=gray"></iframe>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Laporan</h4>
                                <div align="left">
                                    <a type="button" class="btn btn-dark mb-3 " href="/lapormenusby/add">Tambah</a>
                                </div>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Nomor</th>
                                                <th>Menu</th>
                                                <th>Kategori</th>
                                                <th>Tanggal</th>
                                                <th>Terjual</th>
												<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no = 1; @endphp
                                        @foreach($lapormenusby as $l)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $l->lapormenu_sby }}</td>
                                                <td>{{ $l->laporkategori_sby }}</td>
                                                <td>{{ $l->laportgl_sby }}</td>
                                                <td>{{ $l->laporterjual_sby }}</td>
												<td>
                                                <a type="button" href="/lapormenusby/hapus/{{ $l->id }}" class="btn btn-danger btn-xs  mb-12">Hapus</a>
												</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#tambahlaporsby').on('show', function(e) {
                            var link     = e.relatedTarget(),
                                modal    = $(this),
                                username = link.data("username"),
                                email    = link.data("email");

                            modal.find("#lapormenuby").val(email);
                            modal.find("#username").val(username);
                        });
                    </script>

        @endsection