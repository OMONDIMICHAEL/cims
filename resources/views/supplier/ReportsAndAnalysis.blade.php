@extends('layouts.app')

@section('title', 'Analysis')
@section('content')
    <div name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__("Report And Analysis")}}
        </h2>
    </div>
    <div class="flex max-w-9xl max-auto sm:px-6 lg:px-8 p-4 bg-white shadow-sm sm:rounded-lg m-6">
        <div class="w-1/4 p-4 hidden sm:block break-words ">
            {{__('left')}}
        </div>
        <div class="w-full sm:w-1/2 p-4 break-words">
            <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mb-4" id="bodyGridDiv">
                <div class="container-fluid text-center text-md-start mt-5">
                    <div class="" id="">
                        <span style="color:red;">still under construction; It will contain the following</span>
                        <section>
                            <dl>
                                <dt>Inventory turnover rates</dt>
                                <dd>High turnover rate</dd>
                                <dd>Low turnover rate</dd>
                                <dd>Industry Comparison</dd>
                                <dd>Trend analysis</dd>
                                <dt>Generating reports</dt>
                                <dd>Sales report</dd>
                                <dd>Financial report</dd>
                                <dd>Inventory report</dd>
                                <dd>Purchasing report</dd>
                                <dd>Customer report</dd>
                                <dd>Operational report</dd>
                            </dl>
                        </section>
                        <canvas id="myChart"></canvas>
                        <script>
                                // Get the canvas element
                            var ctx = document.getElementById('myChart').getContext('2d');

                            // Define data for the chart (example data)
                            var data = {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                            datasets: [{
                                label: 'Sales',
                                backgroundColor: 'rgba(255, 99, 132, 0.2)', // Color for the bars
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1,
                                data: [65, 59, 80, 81, 56, 55, 40, 95, 88, 75, 90, 66] // Example sales data
                            }]
                            };

                            // Define options for the chart
                            var options = {
                            scales: {
                                yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                                }]
                            }
                            };

                            // Create the chart
                            var myChart = new Chart(ctx, {
                            type: 'bar', // Specify the type of chart (e.g., bar, line, pie)
                            data: data, // Provide the data
                            options: options // Provide the options
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/4 p-4 hidden sm:block break-words">
            {{__('right')}}
        </div>
    </div>
@endsection