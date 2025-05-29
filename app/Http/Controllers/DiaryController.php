<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DiaryController extends Controller
{
    public function create()
    {
        return view('add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mood' => 'required|in:terrific,good,so-so,bad,awful',
            'diary' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('uploads', 'public'); // simpan di storage/app/public/uploads
        } else {
            $photoPath = null;
        }

        $moodMap = [
            'awful' => 1,
            'bad' => 2,
            'so-so' => 3,
            'good' => 4,
            'terrific' => 5,
        ];

        $moodText = $request->mood;
        $moodScore = $moodMap[$moodText];

        Diary::create([
            'username' => Session::get('user_moodiary'),
            'mood' => $moodText,
            'mood_rate' => $moodScore,
            'diary' => $request->diary,
            'photo' => $photoPath,
            'date_created' => now()->toDateString()
        ]);

        return redirect()->route('diary.create')->with('success', 'Diary saved!');
    }

    public function recap()
    {
        $username = Session::get('user_moodiary');

        $diaries = Diary::where('username', $username)
                        ->orderBy('date_created', 'desc')
                        ->get();

        return view('recap', compact('diaries'));
    }

    public function edit($id)
    {
        $diary = Diary::findOrFail($id);
        return view('add', compact('diary'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mood' => 'required|in:terrific,good,so-so,bad,awful',
            'diary' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $moodMap = [
            'awful' => 1,
            'bad' => 2,
            'so-so' => 3,
            'good' => 4,
            'terrific' => 5,
        ];

        $moodText = $request->mood;
        $moodScore = $moodMap[$moodText];

        $diary = Diary::findOrFail($id);
        $diary->mood = $moodText;
        $diary->mood_rate = $moodScore;
        $diary->diary = $request->diary;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('uploads', 'public');
            $diary->photo = $photoPath;
        }

        $diary->save();
        return redirect()->route('diary.recap')->with('success', 'Diary berhasil diperbarui!');
    }
}
