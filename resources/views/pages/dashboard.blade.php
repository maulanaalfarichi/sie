@extends('layout.master')
@section('konten')
<title>Dashboard </title>
        <!-- main content area start -->
             <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard </h4>
                            <!-- <iframe scrolling="no" frameborder="no" clocktype="html5" style="overflow:hidden;border:0;margin:0;padding:0;width:240px;height:20px;"src="https://www.clocklink.com/html5embed.php?clock=018&timezone=Indonesia_Surabaya&color=gray&size=240&Title=&Message=&Target=&From=2020,1,1,0,0,0&DateFormat=yyyy / MMM / d&TimeFormat=h:m:s TT&Color=gray"></iframe> -->
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
                            {{-- <div class="col-md-4 mt-3 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-wallet"></i>Omset</div>
                                            <h2>2,315</h2>
                                        </div>
                                        <!-- <canvas id="seolinechart1" height="50"></canvas> -->
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6 mt-md-3 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-user"></i>Karyawan</div>
                                            <h2>{{ $karyawan }}</h2>
                                        </div>
                                        <!-- <canvas id="seolinechart2" height="50"></canvas> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-3 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg4">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-heart"></i>Pengunjung</div>
                                            <h2>{{ $pengunjung }}</h2>
                                        </div>
                                        <!-- <canvas id="seolinechart2" height="50"></canvas> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- seo fact area end -->
                     <!-- Calendar start -->
                     <div class="col-6 mt-5">
                    
                                    <div class="card-body">
                                    <div data-tockify-component="mini" data-tockify-calendar="david123"></div>
<script data-cfasync="false" data-tockify-script="embed" src="https://public.tockify.com/browser/embed.js"></script>
                                    </div>
                            </div>
                            <!-- Calendar end -->
                     <!-- Clock start -->
                     <div class="col-6 mt-5">
                                    <div class="card-body">
                                    <br>
                                    </br>
                                    <br>
                                    </br>
                                    <br>
                                    
                                    <!-- <iframe scrolling="no" frameborder="no" clocktype="html5" style="overflow:hidden;border:0;margin:0;padding:0;width:200px;height:200px;"src="https://www.clocklink.com/html5embed.php?clock=002&timezone=Indonesia_Surabaya&color=blue&size=200&Title=&Message=&Target=&From=2020,1,1,0,0,0&Color=blue"></iframe> -->
                                    <!-- <div class="cleanslate w24tz-current-time w24tz-large" style="display: inline-block !important; visibility: hidden !important; min-width:430px !important; min-height:200px !important;"><p><a href="//24timezones.com/Surabaya/time" style="text-decoration: none" class="clock24" id="tz24-1587790872-c1631-eyJob3VydHlwZSI6IjI0Iiwic2hvd2RhdGUiOiIxIiwic2hvd3NlY29uZHMiOiIxIiwiY29udGFpbmVyX2lkIjoiY2xvY2tfYmxvY2tfY2I1ZWEzYzQxODBjMmEzIiwidHlwZSI6ImRiIiwibGFuZyI6ImVuIn0=" title="time at Surabaya" target="_blank">Surabaya</a></p><div id="clock_block_cb5ea3c4180c2a3"></div></div>
<script type="text/javascript" src="//w.24timezones.com/l.js" async></script> -->
<div style="text-align:center;padding:1em 0;"> <h3><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/city/1625822">Surabaya, Indonesia</a></h3> 
<iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=large&timezone=Asia%2FJakarta" width="100%" height="140" frameborder="0" seamless></iframe> </div>
                                    </div>   
                            </div>
                            <!-- Clock end -->
                            
                    <!-- Weather start -->
                    <div class="col-12 mt-5">
                    <div class="card">
                                    <div class="card-body">
                                    <div id="2bb82555401e913be5ac26ea4f150e1f" class="ww-informers-box-854753"><p class="ww-informers-box-854754"><a href="https://world-weather.info/forecast/indonesia/surabaya/">Surabaya - weather forecast</a><br><a href="https://world-weather.info/forecast/usa/new_york/">https://world-weather.info/forecast/usa/new_york/</a></p></div><script type="text/javascript" charset="utf-8" src="https://world-weather.info/wwinformer.php?userid=2bb82555401e913be5ac26ea4f150e1f"></script><style>.ww-informers-box-854754{-webkit-animation-name:ww-informers54;animation-name:ww-informers54;-webkit-animation-duration:1.5s;animation-duration:1.5s;white-space:nowrap;overflow:hidden;-o-text-overflow:ellipsis;text-overflow:ellipsis;font-size:12px;font-family:Arial;line-height:18px;text-align:center}@-webkit-keyframes ww-informers54{0%,80%{opacity:0}100%{opacity:1}}@keyframes ww-informers54{0%,80%{opacity:0}100%{opacity:1}}</style>
                                    </div>
                                    </div>
                            </div>
                            <!-- Weather end -->
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
                             <!-- PLAY area start -->
                             <div class="col-12 mt-5">
                                    <object type="application/x-shockwave-flash" style="outline:none;" data="http://cdn.abowman.com/widgets/fish/fish.swf?" width="1000" height="225"><param name="movie" value="http://cdn.abowman.com/widgets/fish/fish.swf?"></param><param name="AllowScriptAccess" value="always"></param><param name="wmode" value="opaque"></param><param name="scale" value="noscale"/><param name="salign" value="tl"/></object>
                                    <!-- <object type="application/x-shockwave-flash" style="outline:none;" data="http://cdn.abowman.com/widgets/hamster/hamster.swf?" width="300" height="225"><param name="movie" value="http://cdn.abowman.com/widgets/hamster/hamster.swf?"></param><param name="AllowScriptAccess" value="always"></param><param name="wmode" value="opaque"></param></object> -->
                            </div>
                            <!-- PLAY area end -->
                            
        <!-- main content area end -->
        @endsection