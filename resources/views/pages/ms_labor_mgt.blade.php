@extends('layouts.dashboard')
@section('content')

<form method="POST">
    <div class="wrapper">
        <div class="upper-wrapper">
            <div class="circlechart">
                <div class="chart-container"style="height:50vh;">
                <canvas id="myChart"></canvas>
                </div>
                <script src="{{asset('js/charts/Chart.bundle.js')}}"></script>
                <script src="{{asset('js/charts/chartjs-plugin-colorschemes.js')}}"></script>
                <script>
                    document.getElementById('btn').style.display="none";
                </script>
            </div>
        </div>
    </div>
</form>
@endsection
