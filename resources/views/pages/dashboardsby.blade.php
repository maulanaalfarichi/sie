@extends('layout.master')
@section('konten')
<title>Dashboard</title>
        <!-- main content area start -->
             <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard - Surabaya</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                <!-- seo fact area start -->
                <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-4 mt-3 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-wallet"></i>Omset</div>
                                            <h2>2,315</h2>
                                        </div>
                                        <!-- <canvas id="seolinechart1" height="50"></canvas> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-md-3 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-user"></i>Karyawan</div>
                                            <h2>3,984</h2>
                                        </div>
                                        <!-- <canvas id="seolinechart2" height="50"></canvas> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-md-3 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg4">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-heart"></i>Pengunjung</div>
                                            <h2>3,984</h2>
                                        </div>
                                        <!-- <canvas id="seolinechart2" height="50"></canvas> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- seo fact area end -->
                                <!-- Blockquotes area start -->
                                <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"></h4>
                                        <blockquote class="blockquote">
                                            <p class="mb-3">Help young people. Help small guys. Because small guys will be big. Young people will have the seeds you bury in their minds, and when they grow up, they will change the world.</p>
                                            <footer class="blockquote-footer">Jack Ma
                                                <cite title="Source Title">
                                                </cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            <!-- Blockquotes area end -->
        <!-- main content area end -->
        @endsection