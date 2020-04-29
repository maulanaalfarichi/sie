@extends('layout.master')
@section('konten')
    <title>Fruts Cafe - Lapor Penjualan Gresik</title>
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Laporan Penjualan - Gresik</h4>
                    <iframe scrolling="no" frameborder="no" clocktype="html5" style="overflow:hidden;border:0;margin:0;padding:0;width:240px;height:20px;"src="https://www.clocklink.com/html5embed.php?clock=018&timezone=Indonesia_Surabaya&color=gray&size=240&Title=&Message=&Target=&From=2020,1,1,0,0,0&DateFormat=yyyy / MMM / d&TimeFormat=h:m:s TT&Color=gray"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <figure class="highcharts-figure">
                    <div id="chartPenjualanMakananGsk"></div>
                </figure>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <figure class="highcharts-figure">
                    <div id="chartPenjualanMakananGsk1"></div>
                </figure>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <figure class="highcharts-figure">
                    <div id="chartPenjualanMinumanGsk"></div>
                </figure>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <figure class="highcharts-figure">
                    <div id="chartPenjualanMinumanGsk1"></div>
                </figure>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'chartPenjualanMakananGsk',
                    type: 'column',
                },
                lang: {
                    drillUpText: '< Back'
                },
                title: {},
                subtitle: {
                    text: 'ini adalah grafik laporan penjualan makanan di cabang Gresik.'
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
                    url: "{{ route('report.sumPenjualanMakananGsk') }}",
                    success: function (data) {
                        options.series = data.kategori;
                        options.drilldown.series = data.barang;
                        options.title.text = 'Laporan Penjualan Makanan di Cabang Gresik';
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
            renderTo: 'chartPenjualanMakananGsk1',
            type: 'column'
        },
        title: {},
        subtitle: {
            text: 'ini adalah grafik laporan penjualan makanan di cabang Gresik.'
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
            url: "{{ route('report.sumPenjualanMakananGsk1') }}",
            success: function (data) {
                options.series = data.kategori_barang;
                options.xAxis.categories = data.bulan;
                options.title.text = 'Laporan Penjualan Makanan di Cabang Gresik';
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
                    renderTo: 'chartPenjualanMinumanGsk',
                    type: 'column',
                },
                lang: {
                    drillUpText: '< Back'
                },
                title: {},
                subtitle: {
                    text: 'ini adalah grafik laporan penjualan minuman di cabang Gresik.'
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
                    url: "{{ route('report.sumPenjualanMinumanGsk') }}",
                    success: function (data) {
                        options.series = data.kategori;
                        options.drilldown.series = data.barang;
                        options.title.text = 'Laporan Penjualan Minuman di Cabang Gresik';
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
            renderTo: 'chartPenjualanMinumanGsk1',
            type: 'column'
        },
        title: {},
        subtitle: {
            text: 'ini adalah grafik laporan penjualan minuman di cabang Gresik.'
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
            url: "{{ route('report.sumPenjualanMinumanGsk1') }}",
            success: function (data) {
                options.series = data.kategori_barang;
                options.xAxis.categories = data.bulan;
                options.title.text = 'Laporan Penjualan Minuman di Cabang Gresik';
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