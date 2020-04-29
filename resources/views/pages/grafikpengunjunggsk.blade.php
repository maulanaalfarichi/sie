@extends('layout.master')
@section('konten')
<title>Laporan Pengunjung Gresik</title>
        <!-- main content area start -->
             <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Laporan Pengunjung - Gresik</h4>
                            <iframe scrolling="no" frameborder="no" clocktype="html5" style="overflow:hidden;border:0;margin:0;padding:0;width:240px;height:20px;"src="https://www.clocklink.com/html5embed.php?clock=018&timezone=Indonesia_Surabaya&color=gray&size=240&Title=&Message=&Target=&From=2020,1,1,0,0,0&DateFormat=yyyy / MMM / d&TimeFormat=h:m:s TT&Color=gray"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-content-inner">
                <div class="row">
                    <div class="col-12 mt-5">
                        <figure class="highcharts-figure">
                            <div id="chartPengunjungGsk"></div>
                        </figure>
                    </div>
                </div>
            

            <script>
                $(document).ready(function() {
                    var options = {
                        chart: {
                            renderTo: 'chartPengunjungGsk',
                            type: 'line',
                        },
                        lang: {
                            drillUpText: '< Back'
                        },
                        title: {},
                        subtitle: {
                            text: 'Grafik laporan pengunjung di cabang Gresik.'
                        },
                        xAxis: {
                            type: 'category'
                        },
                        yAxis: {
                            title: {
                                text: 'Jumlah'
                            },
                            labels: {
                                formatter: function () {
                                    return this.value;
                                }
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        plotOptions: {
                            series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: true,
                                    formatter: function () {
                                        return this.y;
                                    }
                                }
                            }
                        },
                        tooltip: {
                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> total pengunjung<br/>'
                        },
                        series: {},
                        drilldown: {
                            series: {}
                        }
                    };
                    function getDataSale() {
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "{{ route('report.sumPengunjungGsk') }}",
                            success: function (data) {
                                options.series = data.kategori;
                                options.drilldown.series = data.barang;
                                options.title.text = 'Pengunjung';
                                var chart = new Highcharts.Chart(options);
                            },
                            error: function (e) {
                                console.log(e);
                            }
                        });
                    }
                    getDataSale();
                });
            </script>
            
        @endsection