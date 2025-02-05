<?php

namespace App\Http\Controllers;

use App\Models\Plot;
use Illuminate\Http\Request;

class LandPlotController extends Controller
{
    public function index()
    {
        $plots = Plot::all();
        return view('land_plots.index', compact('plots'));
    }

    public function create()
    {
        return view('land_plots.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lotNumber' => 'required|string|max:255',
            'block' => 'required|string|max:255',
            'status' => 'required|string|in:available,sold',
        ]);

        Plot::create($request->all());
        return redirect()->route('land_plots.index')->with('success', 'Plot created successfully!');
    }

    public function show(Plot $land_plot)
    {
        return view('land_plots.show', compact('land_plot'));
    }

    public function edit(Plot $land_plot)
    {
        return view('land_plots.edit', compact('land_plot'));
    }

    public function update(Request $request, Plot $land_plot)
    {
        $request->validate([
            'lotNumber' => 'required|string|max:255',
            'block' => 'required|string|max:255',
            'status' => 'required|string|in:available,sold',
        ]);

        $land_plot->update($request->all());
        return redirect()->route('land_plots.index')->with('success', 'Plot updated successfully!');
    }

    public function destroy(Plot $land_plot)
    {
        $land_plot->delete();
        return redirect()->route('land_plots.index')->with('success', 'Plot deleted successfully!');
    }
}
