@extends('layout.master')
@section('konten')
<title>Fruts Cafe - Lapor Karyawan Surabaya</title>
        <!-- main content area start -->
             <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Laporan Karyawan - Surabaya</h4>
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
								 <button type="button" class="btn btn-dark mb-3 " data-toggle="modal" data-target="#tambahlaporsby">Tambah</button>
								 <!-- Modal TAMBAH -->
                                <div class="modal fade" id="tambahlaporsby">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Laporan</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
												<form method="post" action="/laporkaryawansby/store " >
                                                {{ csrf_field() }}
                                            {{-- <div required name="laporkaryawan_sby" class="form-group">
                                            {!! Form::select('id', $karyawansby ,null , array('idsby'=>'karyawansby','class' => 'form-control')) !!}
                                            </div> --}}
											<input required class="form-control mb-4" name="laportgl_sby" type="Date">
                                            <input required class="form-control mb-4" name="lapormasuk_sby" type="number" placeholder="Masuk">
                                            <input required class="form-control mb-4" name="laporabsen_sby" type="number" placeholder="Absen">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <!-- basic modal end -->
								<!-- Dark table  -->
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Nomor</th>
                                                {{-- <th>Nama</th> --}}
                                                <th>Tanggal</th>
                                                <th>Masuk</th>
                                                <th>Absen</th>
												<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no = 1; @endphp
                                        @foreach($laporkaryawansby as $l)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                {{-- <td>{{ $l->laporkaryawan_sby }}</td> --}}
                                                <td>{{ $l->laportgl_sby }}</td>
                                                <td>{{ $l->lapormasuk_sby }}</td>
                                                <td>{{ $l->laporabsen_sby }}</td>
												<td>
                                                {{-- <a type="button" href="#" class="btn btn-warning btn-xs mb-12">Edit</a> --}}
												<a type="button" href="/laporkaryawansby/hapus/{{ $l->id }}" class="btn btn-danger btn-xs  mb-12">Hapus</a>
												</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->
        <!-- main content area end -->
        @endsection