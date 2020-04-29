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
                                        @foreach($karyawansby as $k)
                                        <form method="post" action="/karyawansby/update " >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $k->id }}"> <br/>
                                         <input class="form-control mb-4" name="karyawan_sby" value="{{ $k->karyawan_sby }}" type="text">
                                            <div class="form-group">
                                            <select value="{{ $k->gender_sby }}" name="gender_sby" class="custom-select">
                                                <option>Gender</option>
                                                @if($k->gender_sby == 'Pria')
                                                <option value="Pria" selected>Pria</option>
                                                <option value="Wanita">Wanita</option>
                                                @else
                                                <option value="Pria">Pria</option>
                                                <option value="Wanita" selected>Wanita</option>
                                                @endif
                                            </select>
                                        </div>
                                            <input class="form-control mb-4" value="{{ $k->nohp_sby }}" name="nohp_sby" type="number">
                                            <div class="form-group">
                                            <select value="{{ $k->jobdesk_sby }}" name="jobdesk_sby" class="custom-select">
                                            <option>Jobdesk</option>
                                                @if($k->jobdesk_sby == 'Kasir')
                                                <option value="Kasir" selected>Kasir</option>
                                                <option value="Pelayan">Pelayan</option>
                                                <option value="Koki">Koki</option>
                                                @elseif($k->jobdesk_sby == 'Pelayan')
                                                <option value="Kasir">Kasir</option>
                                                <option value="Pelayan" selected>Pelayan</option>
                                                <option value="Koki">Koki</option>
                                                @else
                                                <option value="Kasir">Kasir</option>
                                                <option value="Pelayan">Pelayan</option>
                                                <option value="Koki" selected>Koki</option>
                                                @endif
                                            </select>
                                            </div>
                                            <textarea class="form-control mb-4" name="alamat_sby">{{ $k->alamat_sby }}</textarea>
                                           </div>
                                            <div class="modal-footer">
                                                <a href="/menusby"><button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button></a>
                                                <input type="submit" class="btn btn-primary" value="Simpan Data" >
                                                </form>
                                                @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
        <!-- main content area end -->
        @endsection