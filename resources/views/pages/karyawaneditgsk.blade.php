@extends('layout.master')
@section('konten')
        <!-- main content area start -->
             <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Data Karyawan</h4>
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
                                        <h4 class="header-title">Edit Karyawan</h4>
                                        @foreach($karyawangsk as $k)
                                        <form method="post" action="/karyawangsk/update " >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $k->id }}"> <br/>
                                         <input class="form-control mb-4" name="karyawan_gsk" value="{{ $k->karyawan_gsk }}" type="text">
                                            <div class="form-group">
                                            <select value="{{ $k->gender_gsk }}" name="gender_gsk" class="custom-select">
                                                <option selected="selected">Gender</option>
                                                <option value="Pria">Pria</option>
                                                <option value="Wanita">Wanita</option>
                                            </select>
                                        </div>
                                            <input class="form-control mb-4" value="{{ $k->nohp_gsk }}" name="nohp_gsk" type="number">
                                            <div class="form-group">
                                            <select value="{{ $k->jobdesk_gsk }}" name="jobdesk_gsk" class="custom-select">
                                            <option selected="selected">Jobdesk</option>
                                                <option value="Kasir">Kasir</option>
                                                <option value="Pelayan">Pelayan</option>
                                                <option value="Koki">Koki</option>
                                            </select>
                                            </div>
                                            <textarea class="form-control mb-4" value="{{ $k->alamat_gsk }}" name="alamat_gsk" type="text"></textarea>
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