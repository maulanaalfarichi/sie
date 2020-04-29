@extends('layout.master')
@section('konten')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Laporan</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content-inner">
        <div class="row">
            <div class="col-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Tambah Laporan Menu Surabaya</h4>
                            <div class="modal-body">
                                <form method="post" action="/lapormenusby/store">
                                    {{ csrf_field() }}
                                    <div required name="lapormenu_sby" class="form-group">
                                        <select name="lapormenu_sby" class="custom-select">
                                            <option>Menu</option>
                                            @foreach($menusby as $m)
                                            <option value="{{ $m->menu_sby }}">{{ $m->menu_sby }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select required name="laporkategori_sby" class="custom-select">
                                            <option value="">Kategori</option>
                                            <option value="Makanan">Makanan</option>
                                            <option value="Minuman">Minuman</option>
                                        </select>
                                    </div>
                                    <input required class="form-control mb-4" name="laportgl_sby" type="Date">
                                    <input required class="form-control mb-4" name="laporterjual_sby" type="number" placeholder="Terjual">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
@endsection