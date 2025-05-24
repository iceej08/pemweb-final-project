@extends('layout-navbar')

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
        background: linear-gradient(135deg, #F5E6D3 0%, #E8D4B0 100%);
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

@php
    $diaryData = [
        1 => [
            'image' => 'images/soso.png',
            'date' => '05/05/2025',
            'mood_icon' => 'images/moo_netral.png',
            'mood_label' => 'So-so',
            'text' => 'Today, the sky wore a soft shade of lavender, as if it had been gently brushed with twilight. The breeze was cool and carried the scent of blooming jasmine, wrapping the world in a calm, quiet peace. I took a deep breath, letting the moment settle into me, and for a while, everything felt beautifully still.'
        ],
        2 => [
            'image' => 'images/bad.png',
            'date' => '04/05/2025',
            'mood_icon' => 'images/moo_agak_stres.png',
            'mood_label' => 'Bad',
            'text' => 'The rain falls again—like a longing that never quite fades, tapping gently against the windowpane as if trying to be remembered. Each drop echoes a memory, soft and persistent, blurring the lines between now and then. It’s in this quiet rhythm that I find a strange kind of comfort, as though the sky understands what my heart can’t say.'
        ],
        3 => [
            'image' => 'images/terrific.png',
            'date' => '03/05/2025',
            'mood_icon' => 'images/moo_very_happy.png',
            'mood_label' => 'Terrific',
            'text' => 'Another year older, but my heart’s just as curious, still chasing sunsets and wondering about the stars. Time may leave its traces on my face, but inside, there’s a quiet fire that refuses to dim—a longing to live, to love, and to keep dreaming, no matter the number of candles on the cake.'
        ],
        4 => [
            'image' => 'images/awful.png',
            'date' => '02/05/2025',
            'mood_icon' => 'images/moo_stres.png',
            'mood_label' => 'Awful',
            'text' => 'They say ’rest when you’re weary,’ but sometimes the weight isn’t just in the bones — it’s in the soul. I close my eyes, lie still, and yet the mind keeps running, chasing thoughts I can’t outrun. Maybe rest isn’t just about sleep, but about finding peace in the spaces between the noise'
        ],
    ];
    $entry = $diaryData[$id] ?? null;
@endphp

@if ($entry)
    <div class="detail-container">
        <div class="diary-card">
            <img src="{{ asset($entry['image']) }}" alt="Diary Image" class="diary-image">

            <div class="diary-date">{{ $entry['date'] }}</div>

            <div class="mood-section">
                <img src="{{ asset($entry['mood_icon']) }}" class="mood-icon" alt="Mood Icon">
                <span class="mood-label">{{ $entry['mood_label'] }}</span>
            </div>

            <p class="diary-text">{{ $entry['text'] }}</p>
        </div>
    </div>
@else
    <div class="detail-container">
        <p style="text-align: center; font-style: italic;">Diary entry not found.</p>
    </div>
@endif
@endsection