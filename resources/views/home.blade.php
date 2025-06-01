<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@400..700&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/images/logomoo.png">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }
        
        .main-content {
            flex-grow: 1;  
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            transform: translate(80px, 70px);
        }

        .main-content img {
            width: 250px;
            margin-bottom: 0px;
        }
        .main-content h1 {
            font-family: 'Alkatra', cursive;
            font-size: 80px;
            margin-bottom: 10px;
        }
        .main-content p {
            font-size: 27px;
            margin-bottom: 20px;
        }
        .btn-start {
            padding: 10px 24px;
            background: #d2691e;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 800;
        }
        .btn-start:hover{
            background-color: #AF4D07;
        }
    </style>
</head>
</html>

@extends('layout-navbar')

@section('title', 'Moodiary - Home')

@section('navbar')
<div class="sidebar fixed-top d-flex flex-column align-items-start px-3 py-4" style="min-height: 100vh;">
    <div class="d-flex align-items-center mb-2 mt-4 me-3 fw-semibold" style="font-family: 'Alkatra', cursive; font-size:1.5rem;">
        <img src="{{ asset('images/logomoo.png') }}" style="width: 70px; height: 70px; margin-right:10px;"> Moodiary </div>

    <div class="sidebar-content mt-4">
        <a href="/home" class="nav-item-custom active mb-4">
        <img src="{{ asset('images/navbar/home.png') }}" alt="Home">
        <span>Home</span>
        </a>
        <a href="/chart" class="nav-item-custom mb-4">
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
        <a href="/addDiary" class="nav-item-custom mb-4" aria-current="true">
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
<body>
    <div class="main-content">
        <div>
            <img src="{{ asset('images/moo_winkk.png') }}" alt="Cow Wink">
            @if(session()->has('user_moodiary'))
                <h1>Hello {{ Str::title(session('user_moodiary')) }}</h1>
            @else
                <h1>Hello guest</h1>
            @endif
            <p>Safe space for your feelings</p>
            <a href="{{ route('diary.create') }}">
            <button class="btn-start">Start Your Story</button>
            </a>
        </div>
    </div>
</body>
@endsection

