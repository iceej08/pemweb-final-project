<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/images/logomoo.png">  
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'poppins', sans-serif;
            background: linear-gradient(180deg, #fef3e2 0%, #F0BB78 100%);
            min-height: 100vh;
        }

        .container {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        .sidebar {
            width: 280px;
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem 1.5rem;
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 3rem;
        }

        .main-content {
            flex: 1;
            padding: 1rem;
            flex-direction: column;
            height: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            text-align: center;
            margin-bottom: 1rem;
        }

        .card-chart {
            background: rgba(255, 255, 255, 0.9); 
            border-radius: 20px;
            padding: 2rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgb(255, 255, 255);
            box-shadow: 4px 4px 32px rgba(0, 0, 0, 0.2);
        }


        .stats-grid {
            display: grid;
            grid-template-columns: 3fr 1fr;
            gap: 2rem;
            
            grid-auto-rows: min-content;
        }

        .left-column {
            display: flex;
            height: 500px;
            flex-direction: column;
            min-width: 800px;
        }

        .right-column {
            display: grid;
            grid-template-rows: auto auto;
            min-width:250px;
            gap: 1rem;
        }

        .top-box {
            min-height: 100px;
        }

        .bottom-box {
            min-height: 200px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 4px 4px 30px rgba(0, 0, 0, 0.2);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: #4285f4;
            margin: 0.5rem 0;
        }

        .stat-label {
            color: #666;
            font-size: 1rem;
        }


        .btn-add{
            background: #d2691e;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;

            transition: all 0.2s ease;
            margin-top: 1rem;
        }

        .btn-add:hover {
            background-color: #AF4D07;
            box-shadow: 0 4px 12px rgba(210, 105, 30, 0.3);
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .card-chart-header h3 {
            margin: 0;
            color: #333;
            font-weight: 600;
        }

        .card-chart-body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 400px;
        }

        #moodChart {
            max-width: 100%;
            max-height: 100%;
        }

        #donutChart {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>
</html>
@extends('layout-navbar')

@section('title', 'Moodiary - Chart')

@section('navbar')
<div class="sidebar fixed-top d-flex flex-column align-items-start px-3 py-4" style="min-height: 100vh;">
    <div class="d-flex align-items-center mb-2 mt-4 me-3 fw-semibold" style="font-family: 'Alkatra', cursive; font-size:1.5rem;">
        <img src="{{ asset('images/logomoo.png') }}" style="width: 70px; height: 70px; margin-right:10px;"> Moodiary </div>

    <div class="sidebar-content mt-4">
        <a href="/home" class="nav-item-custom mb-4">
        <img src="{{ asset('images/navbar/home.png') }}" alt="Home">
        <span>Home</span>
        </a>
        <a href="/chart" class="nav-item-custom active mb-4">
            <img src="{{ asset('images/navbar/chart.png') }}" alt="Chart">
            <span>Chart</span>
        </a>
        <a href="/calendar" class="nav-item-custom mb-4">
            <img src="{{ asset('images/navbar/calender.png') }}" alt="Calendar">
            <span>Calendar</span>
        </a>
        <a href="/recap" class="nav-item-custom mb-4">
            <img src="{{ asset('images/navbar/recap.png') }}" alt="Recap">
            <span>Recap</span>
        </a>
        <a href="/addDiary" class="nav-item-custom mb-4">
            <img src="{{ asset('images/navbar/add.png') }}" alt="Add">
            <span>Add</span>
        </a>
        <a href="{{ route('profile', ['username' => session('user_moodiary')]) }}" class="nav-item-custom mb-4">
            <img src="{{ asset('images/navbar/profile.png') }}" alt="Add" style="width: 35px; height: auto;">
            <span>Profile</span>
        </a>
    </div>
</div>
@endsection
@section('content')
<div class="container" style="padding-left:8rem; margin-top: -2rem;">
    <main class="main-content">
        <h1 class="page-title">Chart</h1>

    <!--EDIT-->
    <div class="d-flex justify-content-center mb-4">
        <form method="GET" action="{{ route('chart') }}" class="d-flex align-items-center gap-3 p-3 rounded-4 shadow" style="width:75%; background: rgba(255, 255, 255, 0.9)">
            <div class="d-flex justify-content-center w-100">
                <label for="month" class="form-label mt-1 fw-semibold me-2">Select Month:</label>
                <select name="month" id="month" class="form-select form-select-sm w-25 me-2">
                    @foreach(range(1, 12) as $m)
                        <option value="{{ $m }}" {{ $m == $month ? 'selected' : '' }}>
                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                        </option>
                    @endforeach
                </select>
            
                <label for="year" class="form-label mt-1 fw-semibold me-2">Select Year:</label>
                <select name="year" id="year" class="form-select form-select-sm w-25 me-2">
                    @for($y = now()->year; $y >= now()->year - 5; $y--)
                        <option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>{{ $y }}</option>
                    @endfor
                </select>
           
                <button type="submit" class="btn btn-sm fw-semibold text-white" style="background-color: #d2691e;">
                    <i class="fas fa-chart-line me-1"></i> View
                </button>
            </div>
        </form>
    </div>


        <div class="stats-grid">
            <!--main-->
            <div class="left-column">
                <div class="card-chart">
                    <div class="card-chart-header">
                        <h3>Emotion Chart - {{ date('F', mktime(0, 0, 0, $month, 1)) }} {{ $year }}</h3>
                    </div>
                    <div class="card-chart-body">
                        <canvas id="moodChart"></canvas>
                    </div>
                </div>
            </div>
            
            <div class="right-column">
                 <!--stat-->
                <div class="top-box">
                    <div class="card-chart" style="height: 180px; padding-top:1rem; padding-bottom: 1rem">
                        <div class="stat-label">You have created</div>
                        <div class="stat-number">{{ $totalStories }}</div>
                        <div class="stat-label">stories</div>
                    </div>
                </div>
                 <!--donut-->
                <div class="bottom-box">
                    <div class="stat-card">
                        <canvas id="donutChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            <a href="/addDiary">
                <button class="btn-add">Add Your Story</button>
            </a>
        </div>
    </main>
</div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const chartData = @json($chartData);
        const ctx = document.getElementById('moodChart').getContext('2d');

        new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
            data: chartData.map(item => ({ x: item.day, y: item.mood_value })),  // day = 1,2,3,4...
            borderColor: '#8B4513',
            backgroundColor: 'transparent',
            borderWidth: 4,
            tension: 0.4,
            pointBackgroundColor: '#8B4513',
            pointBorderColor: '#fff',
            pointBorderWidth: 3,
            pointRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false }},
            scales: {
            y: {
                min: 1,
                max: 5,
                ticks: {
                stepSize: 1,
                callback: function(value) {
                    const labels = {1: 'Awful', 2: 'Bad', 3: 'So-so', 4: 'Good', 5: 'Terrific'};
                    return labels[value] || value;
                }
                }
            },
            x: {
                type: 'linear',
                position: 'bottom',
                ticks: {
                stepSize: 5, 
                callback: function(value) {
                    return value; 
                }
                },
                min: 0, 
                max: 31
            }
            }
        }
        });

        const moodImages = {
        'Terrific': new Image(),
        'Good': new Image(),
        'So-so': new Image(),
        'Bad': new Image(),
        'Awful': new Image()
        };

        moodImages['Terrific'].src = '/images/moods/terrific.png';
        moodImages['Good'].src = '/images/moods/good.png';
        moodImages['So-so'].src = '/images/moods/so-so.png';
        moodImages['Bad'].src = '/images/moods/bad.png';
        moodImages['Awful'].src = '/images/moods/awful.png';

        const donutCtx = document.getElementById('donutChart').getContext('2d');
        const moodPercentages = @json($moodPercentages);

        new Chart(donutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Terrific', 'Good', 'So-so', 'Bad', 'Awful'],
                datasets: [{
                    data: [
                        moodPercentages['terrific'] || 0,
                        moodPercentages['good'] || 0,
                        moodPercentages['so-so'] || 0,
                        moodPercentages['bad'] || 0,
                        moodPercentages['awful'] || 0
                    ],
                    backgroundColor: ['#E5989B', '#355070', '#84A59D','#F0BB78','#543A14'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                cutout: '80%',
                plugins: {
                    legend: {
                        display: true, 
                        position: 'bottom', 
                        labels: {
                            color: '#333',
                            font: {
                                size: 10
                            },
                            usePointStyle: true,
                            pointStyle: 'circle',
                            boxWidth: 10
                        }
                    }
                }
            }
        });
    });
    </script>
</body>
@endsection
