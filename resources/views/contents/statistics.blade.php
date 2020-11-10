@extends('layouts.account')

@section('stylesheets')
<link rel="stylesheet" href="{{asset('plugins/chart.js/dist/Chart.min.css')}}" type="text/css">
@endsection
@section('breadcrumbs')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}" title="" itemprop="url">Home</a></li>
            <li class="breadcrumb-item active">My Account</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--custom chart start-->
        <div class="border-head">
            <h3>Statistics</h3>
        </div>
        <div class="text-center" style="margin-bottom: 10px">
            <button class="btn btn-primary btn-action" type="today">1 day</button>
            <button class="btn btn-primary btn-action" type="daily">7 days</button>
            <button class="btn btn-primary btn-action" type="weekly">1 Month</button>
            <button class="btn btn-primary btn-action" type="monthly">12 Months</button>
            <button class="btn btn-primary btn-action" type="yearly">All</button>
        </div>
        <canvas id="line" height="300" width="900"></canvas>
        <!--custom chart end-->
    </div>
</div>
@endsection

@section('scripts')
<!--script for this page-->
<script src="{{asset('plugins/chart.js/dist/Chart.min.js')}}"></script>
<script>
    var ctx = document.getElementById("line").getContext('2d');
    var myChart = new Chart(ctx, {});
    $('.btn-action').on('click', function(){
        let type = $(this).attr('type');
        $.get("{{route('charts.index')}}", {type}, function(response){
            myChart.destroy();
            myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: response.labels,
                    datasets:[
                        {
                            label: 'Phone Views',
                            borderColor: "#8e5ea2",
                            borderWidth: 1,
                            data : response.data.phoneviews
                        },
                        {
                            label: 'Product Views',
                            borderColor: "#3e95cd",
                            borderWidth: 1,
                            data : response.data.productviews
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });
    });

    $('.btn-action:first').trigger('click');
</script>
@endsection