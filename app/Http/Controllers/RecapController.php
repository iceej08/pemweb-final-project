<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class RecapController extends Controller
{
    public function index(Request $request)
    {
        $entries = Diary::orderBy('date_created', 'desc')->get();
        return view('recap', compact('entries'));
    }
}