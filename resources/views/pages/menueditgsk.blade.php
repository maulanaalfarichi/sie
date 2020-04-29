@extends('layout.master')
@section('konten')
        <!-- main content area start -->
             <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Data Menu</h4>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                   <!-- basic form start -->
                   <div class="col-6 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Edit Menu</h4>
                                        @foreach($menugsk as $m)
                                        <form method="post" action="/menugsk/update " >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $m->id }}"> <br/>
                                         <input class="form-control mb-4" name="menu_gsk" value="{{ $m->menu_gsk }}" type="text">
                                            <div class="form-group">
                                            <select value="{{ $m->kategori_gsk }}" name="kategori_gsk" class="custom-select">
                                                <option selected="selected">Kategori</option>
                                                <option value="Makanan">Makanan</option>
                                                <option value="Minuman">Minuman</option>
                                            </select>
                                        </div>
											<input class="form-control mb-4" value="{{ $m->harga_gsk }}" name="harga_gsk" type="number">
                                           </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <input type="submit" class="btn btn-primary" value="Simpan Data" >
                                                </form>
                                                @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
        <!-- main content area end -->
        @endsection