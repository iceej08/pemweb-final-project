<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class RecapController extends Controller
{
    public function index(Request $request)
    {
        $entries = Diary::orderBy('date_created', 'desc')->get();
        return view('recap', compact('diaries'));
    }
    
    public function show($id)
    {
        $diary = Diary::find($id);

    if (!$diary) {
        return view('recap-detail')->with('diary', null);
    }

    return view('recap-detail', compact('diary'));
    }

}