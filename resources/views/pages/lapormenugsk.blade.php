@extends('layout.master')
@section('konten')
<title>Fruts Cafe - Lapor Menu Gresik</title>
        <!-- main content area start -->
             <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Laporan Menu - Gresik</h4>
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
                                    <a type="button" class="btn btn-dark mb-3 " href="/lapormenugsk/add">Tambah</a>
                                </div>
                                
                                <div class="modal fade" id="tambahlaporgsk">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Laporan</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
												<form method="post" action="/lapormenugsk/store">
                                                    {{ csrf_field() }}
                                                    <div required name="lapormenu_gsk" class="form-group">
                                                    {!! Form::select('menugsk', $menugsk, null, array('idgsk' => 'menugsk', 'class' => 'form-control custom-select')) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <select required name="laporkategori_gsk" class="custom-select">
                                                            <option value="">Kategori</option>
                                                            <option value="Makanan">Makanan</option>
                                                            <option value="Minuman">Minuman</option>
                                                        </select>
                                                    </div>
                                                    <input required class="form-control mb-4" name="laportgl_gsk" type="date">
                                                    <input required class="form-control mb-4" name="laporterjual_gsk" type="number" placeholder="Terjual">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
                                        @foreach($lapormenugsk as $l)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $l->lapormenu_gsk }}</td>
                                                <td>{{ $l->laporkategori_gsk }}</td>
                                                <td>{{ $l->laportgl_gsk }}</td>
                                                <td>{{ $l->laporterjual_gsk }}</td>
												<td>
                                                {{-- <a type="button" href="#" class="btn btn-warning btn-xs mb-12">Edit</a> --}}
												<a type="button" href="/lapormenugsk/hapus/{{ $l->id }}" class="btn btn-danger btn-xs  mb-12">Hapus</a>
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
        <!-- <script type="text/javascript">
        $('.date').datepicker({  
        format: 'yyyy-mm-dd'
        });  

</script>  -->
        @endsection