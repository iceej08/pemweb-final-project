<?php

namespace App\Http\Controllers;

use App\Models\DiaryData;
use Illuminate\Http\Request;

class RecapController extends Controller
{
    public function index()
    {
        $entries = DiaryData::orderBy('date_created', 'desc')->get();
        return view('recap', compact('entries'));
    }
}