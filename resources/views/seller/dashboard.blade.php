@extends('layouts.seller-dashboard')
@section('title', 'Dashboard')
@section('content')
    </header>
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Dashboard
            </h2>
          
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Card -->
                <div class="flex items-center p-8 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div
                        class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Total products
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $totalProducts }}
                        </p>
                    </div>
                </div>
    
               
                <!-- Card -->
                <div class="flex items-center p-8 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Pending products
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $pendingProducts }}
                        </p>
                    </div>
                </div>
            </div>



            <!-- Charts -->
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Charts</h2>
            <div class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Products by category</h4>
                    <!-- Canvas for pie chart -->
                    <canvas id="pieChart"></canvas>
                   
                </div>
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Stock</h4>
                    <!-- Canvas for line chart -->
                    <canvas id="barChart"></canvas>
                    
                </div>
            </div>
        </div>
    </main>

    <script>

        var products = {!! json_encode($productsByCategory) !!};
        var inStock = {!! json_encode($inStock) !!};
        var outOfStock = {!! json_encode($outOfStock) !!};

        // Initialize pie chart
        var pieChartCanvas = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: {
                labels: Object.keys(products),
                datasets: [{
                    data: Object.values(products),
                    backgroundColor: ['#3490dc', '#38a169', '#6b46c1', '#f6ad55',
                        '#ed64a6'] // Sample colors, replace with your desired colors
                }]
            },
            options: {
                // Add options here if needed
            }
        });

        // Initialize bar chart
    var barChartCanvas = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: {
            labels: ['In Stock', 'Out of Stock'],
            datasets: [{
                label: 'Number of Products',
                data: Object.values(products),
                backgroundColor: [ '#f6ad55', '#ed64a6'] 
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
@endsection
