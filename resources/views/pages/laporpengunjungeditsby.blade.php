@extends('layout.master')
@section('konten')
        <!-- main content area start -->
             <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Data Pengunjung</h4>
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
                                        @foreach($laporpengunjungsby as $l)
                                        <form method="post" action="/laporpengunjung_sby/update " >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $l->id }}"> <br/>
                                        <input required class="form-control mb-4" name="laportgl_sby" type="Date">
                                            <input required class="form-control mb-4" name="laporjumlah_sby" type="number" placeholder="Jumlah">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                </form>
                                                @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
        <!-- main content area end -->
        @endsection