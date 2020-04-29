@extends('layout.master')
@section('konten')
<title>Fruts Cafe - Menu Surabaya</title>
        <!-- main content area start -->
             <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Data Menu - Surabaya</h4>
                       
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
                                <h4 class="header-title">Menu</h4>
								 <button type="button" class="btn btn-dark mb-3 " data-toggle="modal" data-target="#tambahmenusby">Tambah</button>
								 <!-- Modal TAMBAH -->
                                <div class="modal fade" id="tambahmenusby">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Menu</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
												<form method="post" action="/menusby/store" >
                                                {{ csrf_field() }}
                                                <input required class="form-control mb-4" name="menu_sby" type="text" placeholder="Nama Menu" >
                                            <div class="form-group">
                                            <select required name="kategori_sby" class="custom-select">
                                                <option selected="selected">Kategori</option>
                                                <option value="Makanan">Makanan</option>
                                                <option value="Minuman">Minuman</option>
                                            </select>
                                        </div>
											<input required class="form-control mb-4" name="harga_sby" type="number" placeholder="Rp">
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
                                                <th>Menu</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
												<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $no = 1; @endphp
                                        @foreach($menusby as $m)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $m->menu_sby }}</td>
                                                <td>{{ $m->kategori_sby }}</td>
                                                <td>Rp. {{ $m->harga_sby }}</td>

												<td>
                                                <a type="button" href="/menusby/menueditsby/{{ $m->id }}" class="btn btn-warning btn-xs mb-12">Edit</a>
												<a  type="button" href="/menusby/hapus/{{ $m->id }}" class="btn btn-danger btn-xs  mb-12">Hapus</a>
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