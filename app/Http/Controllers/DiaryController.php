<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use app\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DiaryController extends Controller
{
    public function create()
    {
        return view('diary.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mood' => 'required|in:terrific,good,so-so,bad,awful',
            'diary' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);
        
        $binaryData = null;

        if ($request->hasFile('photo')) {
            $binaryData = file_get_contents($request->file('photo')->getRealPath());
        }

        Diary::create([
            'user_id' => Auth::id(),
            'mood' => $request->mood,
            'diary' => $request->diary,
            'photo' => $binaryData,
            'entry_date' => now()->toDateString(),
        ]);

        return redirect()->route('diary.create')->with('success', 'Diary saved!');
    }
}
