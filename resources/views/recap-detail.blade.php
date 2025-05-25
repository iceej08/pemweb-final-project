@extends('layout-navbar')

@section('title', 'Moodiary - Details')

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
        <a href="/calendar" class="nav-item-custom mb-4">
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
    <div class="logout-section mt-auto">
        <form action="{{ route('logout') }}" method="get" class="w-100">
            @csrf
            <button type="submit" class="nav-item-custom mb-4 btn-logout">
                <span>Logout</span>
            </button>
        </form>
    </div>
</div>
@endsection

@section('content')
<style>
     :root {
        --primary: #F0BD7C;
        --secondary: #FFF0DC;
        --text-dark: #5C3C00;
        --text-light: #666;
    }
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 20px;
        min-height: 100vh;
    }
    .detail-container {
        max-width: 800px;
        margin: 0 auto;
        padding-left: 80px;
    }
    .diary-card {
        background: #FFF0DC;
        border-radius: 25px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    .diary-image {
        width: 100%;
        max-width: 500px;
        height: auto;
        border-radius: 15px;
        object-fit: cover;
    }
    .diary-date {
        margin-top: 15px;
        background: #F7D6AC;
        padding: 6px 20px;
        border-radius: 30px;
        font-weight: 700;
        color: #000;
        font-size: 18px;
    }
    .mood-section {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
        justify-content: center;
    }
    .mood-icon {
        width: 28px;
        height: 28px;
    }
    .mood-label {
        font-weight: 600;
        color: var(--text-dark);
        font-size: 15px;
    }
    .diary-text {
        margin-top: 15px;
        font-size: 14px;
        line-height: 1.8;
        color: var(--text-light);
        max-width: 600px;
        font-style: italic;
    }
    @media (max-width: 768px) {
        .detail-container {
            padding-left: 0;
        }
        .diary-card {
            padding: 15px;
        }
        .diary-image {
            max-width: 100%;
        }
        .diary-text {
            font-size: 13px;
        }
    }
</style>

@if ($diary)
    <div class="detail-container">
        <div class="diary-card">
            @if($diary->photo)
                <img src="{{ asset('storage/' . $diary->photo) }}" alt="Photo" class="diary-image">
            @else
                <img src="{{ asset('images/default.png') }}" class="diary-image" alt="Default Image">
            @endif

            <div class="diary-date">{{ \Carbon\Carbon::parse($diary->date_created)->format('d/m/Y') }}</div>

            <div class="mood-section">
                <img src="{{ asset('images/moods/' . strtolower($diary->mood) . '.png') }}" class="mood-icon" alt="Mood Icon">
                <span class="mood-label">{{ ucfirst($diary->mood) }}</span>
            </div>

            <p class="diary-text">{{ $diary->diary }}</p>
        </div>
    </div>
@else
    <div class="detail-container">
        <p style="text-align: center; font-style: italic;">Diary entry not found.</p>
    </div>
@endif
@endsection