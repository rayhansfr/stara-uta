<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::orderBy('nilai_utilitas', 'desc')->get();
        $highestUtility = Result::orderBy('nilai_utilitas', 'desc')->first();
        // $results = Result::all();
        return view('result', [
            'highestUtility' => $highestUtility,
            'results' => $results,
        ]);
    }
}
