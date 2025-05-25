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
        $username = session('user_moodiary');
    
        $entries = Diary::where('username', $username)
            ->whereMonth('date_created', $month)
            ->whereYear('date_created', $year)
            ->orderBy('date_created')
            ->get();
    
        $chartData = $entries->map(function ($entry) {
            return [
                'day' => $entry->date_created->day,
                'mood_value' => $entry->mood_rate,
                'mood' => $entry->mood
            ];
        });
    
        $moodDistribution = Diary::where('username', $username)
            ->whereMonth('date_created', $month)
            ->whereYear('date_created', $year)
            ->selectRaw('mood, COUNT(*) as count')
            ->groupBy('mood')
            ->pluck('count', 'mood')
            ->toArray();
    
        $totalStories = $entries->whereNotNull('diary')->count();
        $totalEntries = array_sum($moodDistribution);
        $moodPercentages = [];
    
        if ($totalEntries > 0) {
            foreach (['so-so', 'terrific', 'awful','good','bad'] as $mood){
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
}