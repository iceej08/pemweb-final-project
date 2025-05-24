<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->get('month', now()->month);
        $year = $request->get('year', now()->year);
        $username = $request->get('username');

        $chartData = Diary::getChartData($username, $month, $year);
        $moodDistribution = Diary::getMoodDistribution($username, $month, $year);

        $totalStories = Diary::where('username', $username)
            ->whereMonth('date_created', $month)
            ->whereYear('date_created', $year)
            ->whereNotNull('diary')
            ->count();

        $totalEntries = array_sum($moodDistribution);
        $moodPercentages = [];
        if ($totalEntries > 0) {
            foreach (['terrific','good','so-so', 'bad', 'awful', ] as $mood) {
                $count = $moodDistribution[$mood] ?? 0;
                $moodPercentages[$mood] = round(($count / $totalEntries) * 100);
            }
        }

        return view('chart', compact(
            'chartData',
            'moodDistribution',
            'totalStories',
            'moodPercentages',
            'month',
            'year',
            'username'
        ));
    }

    public function calendar(Request $request)
    {
        return view('calendar');
    }

    public function recap(Request $request)
    {
        return view('recap');
    }

    public function addDiary()
    {
        return view('addDiary');
    }

    public function home(Diary $moodEntry)
    {
        return view('home');
    }
}