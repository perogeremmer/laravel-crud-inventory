@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <a href="{{ route('product.index') }}" class="btn btn-md btn-dark">Back</a>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 class="mb-3">Statistic of Products</h3>
                <div class="card">
                    <canvas id="myChart" width="200" height="200"></canvas>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection

@push('scripts')
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
    <script>
        let data = $.post(`{{ route('product.stat-api') }}`, {}, function(data, status){
            let labels = [];
            let datasets = [];
            let values = data.values;
                values.forEach(item => {
                    labels.push(item.name);
                    datasets.push(item.total);
                });

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '# Report products based on category',
                        data: datasets,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: { }
            });
        });

    </script>
@endpush
