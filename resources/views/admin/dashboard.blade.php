@extends('layouts.admin')
@section('header', 'Dashboard')

@section('content')
<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $total_buku }}</h3>
                <p>Data Buku</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <a href="{{ url('buku') }}" class="small-box-footer">More Info&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $total_anggota }}</h3>
                <p>Data Anggota</p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
            <a href="{{ url('anggota') }}" class="small-box-footer">More Info&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $total_penerbit }}</h3>
                <p>Data Penerbit</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <a href="{{ url('penerbit') }}" class="small-box-footer">More Info&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $total_peminjaman }}</h3>
                <p>Data Peminjaman</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <a href="{{ url('peminjaman') }}" class="small-box-footer">More Info&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card card-danger">
            <div class="card-header">
                <h1 class="card-title">Grafik Penerbit</h1>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card card-success">
            <div class="card-header">
                <h1 class="card-title">Grafik Peminjaman</h1>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')
<script src="{{ asset('assets../../plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>

<script type="text/javascript">
    var label_donut = '{!! json_encode($label_donut) !!}';
    var data_donut = '{!! json_encode($data_donut) !!}';
    var data_bar = '{!! json_encode($data_bar) !!}';

    $(function() {
        // Donut Chart
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
        var donutData = {
            labels: JSON.parse(label_donut),
            datasets: [{
                data: JSON.parse(data_donut),
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
            }]
        }

        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }

        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })
        // Close Donut Chart

        // Bar Chart
        var areaChartData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Nov', 'Dec'],
            datasets: JSON.parse(data_bar)
        }

        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })

        var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
        var stackedBarChartData = $.extend(true, {}, barChartData)

        var stackedBarChartOptios = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }

        new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptios
        })
        // Close Bar Chart
    })
</script>
@endpush