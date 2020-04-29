@extends('layout.master')
@section('konten')
<title>Laporan Penjualan Surabaya</title>
        <!-- main content area start -->
             <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Laporan Penjualan - Surabaya</h4>
                            <iframe scrolling="no" frameborder="no" clocktype="html5" style="overflow:hidden;border:0;margin:0;padding:0;width:240px;height:20px;"src="https://www.clocklink.com/html5embed.php?clock=018&timezone=Indonesia_Surabaya&color=gray&size=240&Title=&Message=&Target=&From=2020,1,1,0,0,0&DateFormat=yyyy / MMM / d&TimeFormat=h:m:s TT&Color=gray"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                <!-- seo fact area start -->
            <div class="col-12 mt-5">
                <figure class="highcharts-figure">
                    <div id="chartPenjualanMakananSby"></div>
                </figure>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <figure class="highcharts-figure">
                    <div id="chartPenjualanMakananSby1"></div>
                </figure>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <figure class="highcharts-figure">
                    <div id="chartPenjualanMinumanSby"></div>
                </figure>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <figure class="highcharts-figure">
                    <div id="chartPenjualanMinumanSby1"></div>
                </figure>
            </div>
        </div>
    
    <script>
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'chartPenjualanMakananSby',
                    type: 'column',
                },
                lang: {
                    drillUpText: '< Back'
                },
                title: {},
                subtitle: {
                    text: 'Grafik laporan penjualan makanan di cabang Surabaya.'
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
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> total penjualan<br/>'
                },
                series: {},
                drilldown: {
                    series: {}
                }
            };
            function getDataPenjualanMakananByMonth() {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('report.sumPenjualanMakananSby') }}",
                    success: function (data) {
                        options.series = data.kategori;
                        options.drilldown.series = data.barang;
                        options.title.text = 'Penjualan Makanan';
                        var chart = new Highcharts.Chart(options);
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
            }
            getDataPenjualanMakananByMonth();
        });
    </script>

<script>
$(document).ready(function() {
    var options = {
        chart: {
            renderTo: 'chartPenjualanMakananSby1',
            type: 'column'
        },
        title: {},
        subtitle: {
            text: 'Grafik laporan penjualan makanan di cabang surabaya.'
        },
        xAxis: {
            crosshair: true,
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [],
    };

    function getDataPenjualanMakananByMonth() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ route('report.sumPenjualanMakananSby1') }}",
            success: function (data) {
                options.series = data.kategori_barang;
                options.xAxis.categories = data.bulan;
                options.title.text = 'Penjualan Makanan';
                var chart = new Highcharts.Chart(options);
            },
            error: function (e) {
                console.log(e);
            }
        });
    }
    getDataPenjualanMakananByMonth();
});
</script>

    <script>
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'chartPenjualanMinumanSby',
                    type: 'column',
                },
                lang: {
                    drillUpText: '< Back'
                },
                title: {},
                subtitle: {
                    text: 'Grafik laporan penjualan minuman di cabang Surabaya.'
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
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> total penjualan<br/>'
                },
                series: {},
                drilldown: {
                    series: {}
                }
            };
            function getDataPenjualanMinumanByMonth() {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('report.sumPenjualanMinumanSby') }}",
                    success: function (data) {
                        options.series = data.kategori;
                        options.drilldown.series = data.barang;
                        options.title.text = 'Penjualan Minuman';
                        var chart = new Highcharts.Chart(options);
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
            }
            getDataPenjualanMinumanByMonth();
        });
    </script>

<script>
$(document).ready(function() {
    var options = {
        chart: {
            renderTo: 'chartPenjualanMinumanSby1',
            type: 'column'
        },
        title: {},
        subtitle: {
            text: 'Grafik laporan penjualan minuman di cabang surabaya.'
        },
        xAxis: {
            crosshair: true,
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [],
    };

    function getDataPenjualanMinumanByMonth() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ route('report.sumPenjualanMinumanSby1') }}",
            success: function (data) {
                options.series = data.kategori_barang;
                options.xAxis.categories = data.bulan;
                options.title.text = 'Penjualan Minuman';
                var chart = new Highcharts.Chart(options);
            },
            error: function (e) {
                console.log(e);
            }
        });
    }
    getDataPenjualanMinumanByMonth();
});
</script>

@endsection