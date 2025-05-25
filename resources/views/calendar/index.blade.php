@extends('layout-navbar')

@section('title', 'Moodiary - Calendar')

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
        <a href="/calendar" class="nav-item-custom active mb-4">
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

    @php
        use Carbon\Carbon;

        $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
        $monthName = date('F', $firstDayOfMonth);
        $startDayOfWeek = date('N', $firstDayOfMonth); // 1 = Mon
        $daysInMonth = date('t', $firstDayOfMonth);

        $dayNames = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
        $moodIcons = [
            1 => 'awful.png',
            2 => 'bad.png',
            3 => 'good.png',
            4 => 'good.png',
            5 => 'terrific.png',
        ];

    @endphp

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .calendar-box {
            background-color: #FFF0DC;
            border-radius: 20px;
            box-shadow: 1rem 1rem 3rem rgba(0, 0, 0, 0.5);
            padding: 2rem;
            width: 100%;
            max-width: none !important;
            text-align: center;
            margin-left: 3rem;
        }

        .calendar-header {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bolder;
            font-size: 2rem !important;
            height : 3rem;
            gap: 2rem;
            margin-bottom: 0 !important;
        }

        .arrow {
            cursor: pointer;
            font-size: 1.5rem;
            margin-left: 1rem;
            margin-right: 1rem;
            color: #543A14;
            transition: color 0.2s ease;
        }
        .arrow:hover{
            color: #f9a86b;
        }
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
            text-align: center;
        }
        .calendar-month{
            margin-top: 1.5rem;
            margin-bottom: 1.5rem !important;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: auto;
            color: #543A14;
            gap: 2rem;
        }
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr); /* 7 kolom: senin–minggu */
            gap: 20px;
            text-align: center;
            margin-left: 2rem;
            margin-right: 2rem;
        }
        
        .day-name {
            font-weight: bold;
            font-size: 1rem;
            color: #8F8E8E;
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
            margin-left: 1.5rem;
            margin-right: 1.5rem;
        }

        .day-cell {
            font-weight: bold;
            font-size: 1.1rem;
            color: #543A14;
            height: 2.5rem !important;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .empty {
            height: 2.5rem;
        }

        .mood-icon {
            width: 3rem;
            height: 3rem;
            object-fit: contain;
        }
    </style>

    <div class="container-fluid mt-5" style="min-height: 79vh">
        <div class="row">

            <div class="col-12">
                <div class="calendar-box">
                    <div class="calendar-header">
                        <a href="{{ url('/calender?month=' . ($month == 1 ? 12 : $month - 1) . '&year=' . ($month == 1 ? $year - 1 : $year)) }}" class="arrow">&#x276E;</a>
                        <p class="calendar-month">{{ $monthName }} {{ $year }}</p>
                        <a href="{{ url('/calender?month=' . ($month == 12 ? 1 : $month + 1) . '&year=' . ($month == 12 ? $year + 1 : $year)) }}" class="arrow">&#x276F;</a>
                    </div>
                    <div class="calendar-grid">
                        @foreach ($dayNames as $day)
                            <div class="day-name">{{ $day }}</div>
                        @endforeach

                        @for ($i = 1; $i < $startDayOfWeek; $i++)
                            <div class="empty"></div>
                        @endfor

                        @for ($i = 1; $i <= $daysInMonth; $i++)
                            <div class="day-cell">
                                @if (isset($moods[$i]))
                                    <img src="{{ asset('images/moods/' . $moodIcons[$moods[$i]->mood_rate]) }}" class="mood-icon" alt="mood" />
                                @else
                                    <div>{{ $i }}</div>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection