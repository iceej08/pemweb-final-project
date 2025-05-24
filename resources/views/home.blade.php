<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodiary - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@400..700&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
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
            width: 370px;
            margin-bottom: 0px;
        }
        .main-content h1 {
            font-family: 'Alkatra', cursive;
            font-size: 100px;
            margin-bottom: 10px;
        }
        .main-content p {
            font-size: 27px;
            margin-bottom: 20px;
        }
        .btn-start {
            padding: 10px 24px;
            background-color: #AF4D07;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 800;
        }
    </style>
</head>
@extends('layout-navbar')

@section('content')
<body>
    <div class="main-content">
        <div>
            <img src="{{ asset('images/moo_winkk.png') }}" alt="Cow Wink">
            @if(session()->has('user'))
                <h1>Hello {{ Str::title(session('user')->name) }}</h1>
            @else
                <h1>Hello guest</h1>
            @endif
            <p>Safe space for your feelings</p>
            <button class="btn-start">Start Your Story</button>
        </div>
    </div>
</body>
@endsection
</html>
