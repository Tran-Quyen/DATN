@extends('layouts.admin')
@section('title', 'Orders')
@section('content')
    <div class="bg-white">
        <div>
            <div class="btn-group mx-4 mt-2" role="group" aria-label="Basic example">
                <button type="button" data-group="day" class="btn btn-info text-white">Day</button>
                <button type="button" data-group="week" class="btn btn-info text-white">Week</button>
                <button type="button" data-group="month" class="btn btn-info text-white">Month</button>
                <button type="button" data-group="year" class="btn btn-info text-white">Year</button>
            </div>
        </div>
        <div style="height: 80vh;" class="mx-4 mt-4">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        function displayChart(group = 'month'){
            fetch("{{ url('admin/statistic/chart') }}?group=" + group)
                .then(response => response.json())
                .then(json => {
                    myChart.data.labels = json.labels;
                    myChart.data.datasets = json.datasets;
                    myChart.update();
                });
        }
        $('.btn-group .btn').on('click', function(e) {
            e.preventDefault();
            displayChart($(this).data('group'));
        });
        displayChart();

    </script>

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
    @endpush
@endsection
