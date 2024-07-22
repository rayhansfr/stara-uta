<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Alternatif;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    public function dashboard(): View
    {
        $alternatifs = Alternatif::all();
        return view('dashboard', compact('alternatifs'));
    }

    public function create()
    {
        return view('alternatif.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'c1' => 'required|numeric|between:1,10',
            'c2' => 'required|numeric|between:1,10',
            'c3' => 'required|numeric|between:1,10',
            'c4' => 'required|numeric|between:1,10',
        ]);

        Alternatif::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Data alternatif berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->delete();

        $result = Result::where('nama', $alternatif->nama)->first();
        if ($result) {
            $result->delete();
        }

        return redirect()->route('dashboard')->with('success', 'Data alternatif dan result berhasil dihapus.');
    }

    public function calculateUtility()
    {
        // Truncate the results table
        DB::table('results')->truncate();

        $alternatives = Alternatif::all();
        $criteriaWeights = [
            'c1' => 0.25,
            'c2' => 0.25,
            'c3' => 0.25,
            'c4' => 0.25,
        ];

        $maxScores = [];
        $maxNormalized = [];
        $minScores = [];
        $minNormalized = [];
        $intervalDiffs = [];


        if (!$alternatives->isEmpty()) {
            foreach (['c1', 'c2', 'c3', 'c4'] as $criterion) {
                $scores = $alternatives->pluck($criterion)->toArray();
                $maxScores[$criterion] = (float) max($scores);
                $minScores[$criterion] = (float) min($scores);

                $maxNormalized[$criterion] = max(array_map(function ($score) use ($maxScores, $criterion) {
                    return round($score / $maxScores[$criterion], 3);
                }, $scores));
                $minNormalized[$criterion] = min(array_map(function ($score) use ($maxScores, $criterion) {
                    return round($score / $maxScores[$criterion], 3);
                }, $scores));

                $intervalDiffs[$criterion] = round(($maxNormalized[$criterion] - $minNormalized[$criterion]) / $criteriaWeights[$criterion], 3);
            }

            // Debugging output to confirm interval differences
            // dd(compact('maxNormalized', 'minNormalized', 'intervalDiffs', 'criteriaWeights'));

            foreach ($alternatives as $alternative) {
                $utility = 0;

                foreach (['c1', 'c2', 'c3', 'c4'] as $criterion) {
                    $score = $alternative->$criterion;
                    $normalizedScore = $score / $maxScores[$criterion];
                    $normalizedScores[$criterion] = $normalizedScore;
                    $utility += $normalizedScore * $intervalDiffs[$criterion];
                }
                $utility = round($utility, 3);

                Result::create([
                    'nama' => $alternative->nama,
                    'c1' => $normalizedScores['c1'],
                    'c2' => $normalizedScores['c2'],
                    'c3' => $normalizedScores['c3'],
                    'c4' => $normalizedScores['c4'],
                    'status' => $alternative->status,
                    'nilai_utilitas' => $utility,
                ]);
            }

            Result::orderBy('id', 'desc')->get();
        }

        return redirect()->route('result')->with(['success' => 'Utility calculation completed successfully.',  'intervalDiffs' => $intervalDiffs, 'maxScores' => $maxScores, 'minScores' => $minScores, 'criteriaWeights' => $criteriaWeights]);
    }
}
