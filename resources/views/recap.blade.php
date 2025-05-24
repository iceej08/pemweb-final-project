<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodiary Recap</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #F0BD7C;
            --secondary: #FFF0DC;
            --text-dark: #5C3C00;
            --text-light: #666;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #F5E6D3 0%, #E8D4B0 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
        }
        
        .recap-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .recap-title {
            font-size: 28px;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }
        
        .diary-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            padding: 20px;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .diary-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .diary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.15);
        }
        
        .diary-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
            margin: 15px 15px 0 15px;
            width: calc(100% - 30px);
        }
        
        .diary-content {
            padding: 20px;
            padding-top: 15px;
        }
        
        .diary-date {
            display: inline-block;        
            padding: 4px 12px;            
            font-size: 16px;
            font-weight: 700;          
            color: #000000;              
            background: #F7D6AC;         
            border-radius: 30px;         
            line-height: 1;  
        }
        
        .mood-section {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
        }
        
        .mood-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }
        
        .mood-label {
            font-size: 14px;
            font-weight: 500;
            color: var(--text-dark);
        }
        
        .diary-text {
            font-size: 13px;
            color: var(--text-light);
            line-height: 1.5;
            font-style: italic;
            margin: 0;
        }
        
        
        @media (max-width: 768px) {
            .diary-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            body {
                padding: 15px;
            }
            
            .diary-image {
                height: 160px;
            }
        }
    </style>
</head>
@extends('layout-navbar')

@section('navbar')
<div class="sidebar fixed-top d-flex flex-column align-items-start px-3 py-4" style="min-height: 100vh;">
    <div class="d-flex align-items-center mb-2 mt-4 me-3 fw-semibold" style="font-family: 'Alkatra', cursive; font-size:1.5rem;">
        <img src="{{ asset('images/logomoo.png') }}" style="width: 70px; height: 70px; margin-right:10px;"> Moodiary </div>

    <div class="sidebar-content mt-4">
        <a href="/home" class="nav-item-custom mb-4">
        <img src="{{ asset('images/navbar/home.png') }}" alt="Home">
        <span>Home</span>
        </a>
        <a href="/chart" class="nav-item-custom mb-4">
            <img src="{{ asset('images/navbar/chart.png') }}" alt="Chart">
            <span>Chart</span>
        </a>
        <a href="/calender" class="nav-item-custom mb-4">
            <img src="{{ asset('images/navbar/calender.png') }}" alt="Calendar">
            <span>Calendar</span>
        </a>
        <a href="/recap" class="nav-item-custom active mb-4">
            <img src="{{ asset('images/navbar/recap.png') }}" alt="Recap">
            <span>Recap</span>
        </a>
        <a href="/addDiary" class="nav-item-custom mb-4" aria-current="true">
            <img src="{{ asset('images/navbar/add.png') }}" alt="Add">
            <span>Add</span>
        </a>
    </div>
</div>
@endsection

@section('content')
<body>
<div class="container">
    <div class="diary-grid">
        @forelse ($diaries as $diary)
            <a href="{{ url('/recap-detail/' . $diary->id) }}">
                <div class="diary-card">
                    @if ($diary->photo)
                        <img src="data:image/jpeg;base64,{{ base64_encode($diary->photo) }}" class="diary-image" alt="Diary Image">
                    @else
                        <img src="{{ asset('images/default.png') }}" class="diary-image" alt="Default Image">
                    @endif

                    <div class="diary-content">
                        <div class="diary-date">
                            {{ \Carbon\Carbon::parse($diary->date_created)->format('d/m/Y') }}
                        </div>
                        <div class="mood-section">
                            <img src="{{ asset('images/moods/' . strtolower($diary->mood) . '.png') }}" class="mood-icon" alt="Mood">
                            <span class="mood-label">{{ ucfirst($diary->mood) }}</span>
                        </div>
                        <p class="diary-text">"{{ Str::limit($diary->diary, 100) }}"</p>
                    </div>
                </div>
            </a>
        @empty
            <p style="color: var(--text-dark); text-align: center;">Belum ada catatan mood atau diary.</p>
        @endforelse
</div>


        {{-- <div class="diary-grid"> --}}
            <!-- Card 1 -->
            {{-- <a href="{{ url('/recap-detail/1') }}">
            <div class="diary-card mood-so-so">
                <img src="images/so-so.png" class="diary-image" alt="Sunset Sky">
                <div class="diary-content">
                    <div class="diary-date">05/05/2025</div>
                    <div class="mood-section">
                    <img src="images/moods/so-so.png" class="mood-icon" alt="Mood">
                        <span class="mood-label">So-so</span>
                    </div>
                    <p class="diary-text">"Today, the sky wore a soft shade of............"</p>
                </div>
            </div>
            </a>       

            <!-- Card 2 -->
            <a href="{{ url('/recap-detail/2') }}">
            <div class="diary-card mood-bad">
                <img src="images/bad.png" class="diary-image" alt="Rain">
                <div class="diary-content">
                    <div class="diary-date">04/05/2025</div>
                    <div class="mood-section">
                    <img src="images/moods/bad.png" class="mood-icon" alt="Mood">
                        <span class="mood-label">Bad</span>
                    </div>
                    <p class="diary-text">"The rain falls again—like a longing............"</p>
                </div>
            </div>
            </a>

            <!-- Card 3 -->
            <a href="{{ url('/recap-detail/3') }}">
            <div class="diary-card mood-terrific">
                <img src="images/terrific.png" class="diary-image" alt="Birthday Cake">
                <div class="diary-content">
                    <div class="diary-date">03/05/2025</div>
                    <div class="mood-section">
                    <img src="images/moods/terrific.png" class="mood-icon" alt="Mood">
                        <span class="mood-label">Terrific</span>
                    </div>
                    <p class="diary-text">"Another year older, but my heart's just......."</p>
                </div>
            </div>
            </a>

            <!-- Card 4 -->
            <a href="{{ url('/recap-detail/4') }}">
            <div class="diary-card mood-awful">
                <img src="images/awful.png" class="diary-image" alt="Stressed Person">
                <div class="diary-content">
                    <div class="diary-date">02/05/2025</div>
                    <div class="mood-section">
                    <img src="images/moods/awful.png" class="mood-icon" alt="Mood">
                        <span class="mood-label">Awful</span>
                    </div>
                    <p class="diary-text">"They say 'rest when you're weary, but........"</p>
                </div>
            </div>
            </a> --}}
        </div>
    </div>
    @endsection
</body>
</html>