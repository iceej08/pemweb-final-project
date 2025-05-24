<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Calender;
use Carbon\Carbon;


class CalenderController extends Controller
{
    public function index(Request $request)
    {
        // Get month and year from query params or default to current
        $month = $request->query('month', date('n'));
        $year = $request->query('year', date('Y'));

        // Dummy username session (replace with real auth later)
        $username = 'demo_user';

        // Get diary entries for that month
        $moods = Calender::where('username', $username)
            ->whereMonth('date_created', $month)
            ->whereYear('date_created', $year)
            ->get()
            ->keyBy(function ($item) {
                return Carbon::parse($item->date_created)->day;
            });

        return view('calender.index', compact('month', 'year', 'moods'));
    }
}

// class CalenderController extends Controller
// {
//     public function index(Request $request)
//     {
//         $username = Session::get('username');
//         if (!$username) return redirect('/login');


//         // Get bulan dan tahun dari query (default: bulan sekarang)
//         $month = $request->input('month', now()->month);
//         $year = $request->input('year', now()->year);

//         $entries = Calender::where('username', $username)
//             ->whereMonth('date_created', $month)
//             ->whereYear('date_created', $year)
//             ->get();

//         $moodMap = [
//             1 => 'awful.png',
//             2 => 'bad.png',
//             3 => 'so-so.png',
//             4 => 'good.png',
//             5 => 'terrific.png',
//         ];

//         return view('calender.index', compact('entries', 'moodMap', 'month', 'year'));
//     }

// }
