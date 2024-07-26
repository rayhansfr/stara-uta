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

    public function edit($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        return view('alternatif.edit', compact('alternatif'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'nama' => 'required|string|max:255',
            'c1' => 'required|numeric|between:1,10',
            'c2' => 'required|numeric|between:1,10',
            'c3' => 'required|numeric|between:1,10',
            'c4' => 'required|numeric|between:1,10',
            'c5' => 'required|numeric|between:1,10',
        ]);

        // Create a new Alternatif record in the database
        Alternatif::create($request->all());

        // Redirect the user back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Data alternatif berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'nama' => 'required|string|max:255',
            'c1' => 'required|numeric|between:1,10',
            'c2' => 'required|numeric|between:1,10',
            'c3' => 'required|numeric|between:1,10',
            'c4' => 'required|numeric|between:1,10',
            'c5' => 'required|numeric|between:1,10',
        ]);

        // Find the Alternatif record to be updated
        $alternatif = Alternatif::findOrFail($id);

        // Update the Alternatif record with the new data
        $alternatif->update($request->all());

        // Redirect the user back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Data alternatif berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Find the Alternatif record to be deleted
        $alternatif = Alternatif::findOrFail($id);

        // Delete the Alternatif record from the database
        $alternatif->delete();

        // Check if a corresponding Result record exists
        $result = Result::where('nama', $alternatif->nama)->first();
        if ($result) {
            // Delete the Result record from the database
            $result->delete();
        }

        // Redirect the user back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Data alternatif dan result berhasil dihapus.');
    }

    public function calculateUtility()
    {
        // Delete all data from the 'results' table
        DB::table('results')->truncate();

        // Get all alternatives from the 'alternatifs' table
        $alternatives = Alternatif::all();

        // Define the weights for each criterion
        $criteriaWeights = [
            'c1' => 0.3,
            'c2' => 0.25,
            'c3' => 0.2,
            'c4' => 0.15,
            'c5' => 0.1,
        ];

        // Initialize arrays to store calculated values
        $maxScores = [];
        $maxNormalized = []; // G+
        $minScores = [];
        $minNormalized = []; // G-
        $intervalDiffs = [];

        // Calculate interval differences if alternatives exist
        if (!$alternatives->isEmpty()) {
            foreach (['c1', 'c2', 'c3', 'c4', 'c5'] as $criterion) {
                $scores = $alternatives->pluck($criterion)->toArray();

                // Initialize max and min scores for each criterion
                $maxScores[$criterion] = (float) max($scores);
                $minScores[$criterion] = (float) min($scores);

                // Normalize scores for each alternative
                $maxNormalized[$criterion] = max(array_map(function ($score) use ($maxScores, $criterion) {
                    return round($score / $maxScores[$criterion], 3);
                }, $scores));
                $minNormalized[$criterion] = min(array_map(function ($score) use ($maxScores, $criterion) {
                    return round($score / $maxScores[$criterion], 3);
                }, $scores));

                // Calculate interval differences for each criterion
                $intervalDiffs[$criterion] = round(($maxNormalized[$criterion] - $minNormalized[$criterion]) / $criteriaWeights[$criterion], 3);
            }

            // Calculate utility for each alternative
            foreach ($alternatives as $alternative) {
                $utility = 0;
                $calculatedScores = [];

                foreach (['c1', 'c2', 'c3', 'c4', 'c5'] as $criterion) {
                    $score = $alternative->$criterion;
                    $normalizedScore = $score / $maxScores[$criterion];
                    $normalizedScores[$criterion] = $normalizedScore;
                    $calculatedScore = $normalizedScore * $intervalDiffs[$criterion];
                    $calculatedScores[$criterion] = $calculatedScore;
                    $utility += $calculatedScore;
                }
                $utility = round($utility, 3);

                // Store calculated utility in the 'results' table
                Result::create([
                    'nama' => $alternative->nama,
                    'c1' => $calculatedScores['c1'],
                    'c2' => $calculatedScores['c2'],
                    'c3' => $calculatedScores['c3'],
                    'c4' => $calculatedScores['c4'],
                    'c5' => $calculatedScores['c5'],
                    'nilai_utilitas' => $utility,
                ]);
            }

            // Retrieve all results ordered by utility in descending order
            $results = Result::orderBy('nilai_utilitas', 'desc')->get();

            // Get the highest utility value
            $highestUtility = Result::orderBy('nilai_utilitas', 'desc')->first();
        }

        // Return a view with the calculated data
        return view('result', [
            'intervalDiffs' => $intervalDiffs,
            'maxScores' => $maxScores,
            'minScores' => $minScores,
            'criteriaWeights' => $criteriaWeights,
            'highestUtility' => $highestUtility,
            'results' => $results,
        ]);
    }
}
