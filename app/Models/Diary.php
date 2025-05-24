<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;
    protected $table = 'table_diary';
    protected $fillable = [
        'username',
        'diary',
        'date_created',
        'mood',
        'photo'
    ];

    protected $casts = [
        'date_created' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getMoodValue($mood)
    {
        $values = [
            'awful' => 1,
            'bad' => 2,
            'so-so' => 3,
            'good' => 4,
            'terrific' => 5
        ];
        
        return $values[$mood] ?? 3;
    }

    public static function getMoodDistribution($username, $month = null, $year = null)
    {
        $month = $month ?? now()->month;
        $year = $year ?? now()->year;

        return self::where('username', $username)
            ->whereMonth('date_created', $month)
            ->whereYear('date_created', $year)
            ->selectRaw('mood, COUNT(*) as count')
            ->groupBy('mood')
            ->pluck('count', 'mood')
            ->toArray();
    }

    public static function getChartData($username, $month = null, $year = null)
    {
        $month = $month ?? now()->month;
        $year = $year ?? now()->year;
        
        $entries = self::where('username', $username)
            ->whereMonth('date_created', $month)
            ->whereYear('date_created', $year)
            ->orderBy('date_created')
            ->get();

        $chartData = [];
        foreach ($entries as $entry) {
            $chartData[] = [
                'day' => $entry->date_created->day,
                'mood_value' => self::getMoodValue($entry->mood),
                'mood' => $entry->mood
            ];
        }

        return $chartData;
    }
}
