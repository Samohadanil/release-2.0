@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Best donor</div>
                        <div class="card-body">
                            {{$bestDonor}}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Amount (day)</div>
                        <div class="card-body">
                            {{$amountDay}}$
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Amount (month)</div>
                        <div class="card-body">
                            {{$amountMonth}}$
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div id="linechart" style="width: 1000px; height: 500px"></div>


                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Donation</th>
                            <th scope="col">Message</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($donations as $donation)
                                <tr>
                                    <th scope="row">{{$donation->id}}</th>
                                    <td>{{$donation->name}}</td>
                                    <td>{{$donation->email}}</td>
                                    <td>{{$donation->donation}}</td>
                                    <td>{{$donation->message}}</td>
                                    <td>{{$donation->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>


            {{$donations->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var population = <?php echo $population; ?>;
        console.log(population);
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(lineChart);

        function lineChart() {
            var data = google.visualization.arrayToDataTable(population);
            var options = {
                title: 'Wildlife Population',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            chart.draw(data, options);
        }
    </script>

</div>
@endsection
