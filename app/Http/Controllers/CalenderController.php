<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Calender;
use Carbon\Carbon;


class CalenderController extends Controller
{
    public function index(Request $request)
    {
        // Get month and year from query params or default to current
        $username = Session::get('user_moodiary');
        $month = $request->query('month', date('n'));
        $year = $request->query('year', date('Y'));

        // Dummy username session (replace with real auth later)
        //code sini plis, ini butuh ambil data username hasil dari diary controller dan authcontroller


        // Get diary entries for that month
        $moods = Calender::where('username', $username)
            ->whereMonth('date_created', $month)
            ->whereYear('date_created', $year)
            ->get()
            ->keyBy(function ($item) {
                return Carbon::parse($item->date_created)->day;
            });

        return view('calendar.index', compact('month', 'year', 'moods'));
    }
}
