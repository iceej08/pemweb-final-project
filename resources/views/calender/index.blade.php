@extends('layout-navbar')

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

            // Data dummy mood untuk testing
        $moods = [
            1 => (object)['mood_rate' => 5],
            3 => (object)['mood_rate' => 2],
            7 => (object)['mood_rate' => 4],
            10 => (object)['mood_rate' => 1],
            15 => (object)['mood_rate' => 3],
            21 => (object)['mood_rate' => 5],
            25 => (object)['mood_rate' => 2],
            30 => (object)['mood_rate' => 4],
        ];

    @endphp

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background: linear-gradient(to bottom, #f6c08e, #f9a86b);
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

    <div class="container-fluid">
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
                                    <img src="{{ asset('images/mood/' . $moodIcons[$moods[$i]->mood_rate]) }}" class="mood-icon" alt="mood" />
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