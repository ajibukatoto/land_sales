<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlotController extends Controller
{
    /**
     * Display the form to create a new plot.
     */
    public function create()
    {
        return view('admin.plots.create');
    }

    /**
     * Store a newly created plot in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'plot_number' => 'required|string|max:255',
            'block' => 'required|string|max:255',
            'locality' => 'required|string|max:255',
            'plan_number' => 'required|string|max:255',
            'registered_town_plan_number' => 'required|string|max:255',
            'legal_area' => 'required|numeric',
            'district' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'drawing_number' => 'required|string|max:255',
            'survey_type' => 'required|string|max:255',
            'surveyor_name' => 'required|string|max:255',
            'council' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        // Create the plot record
        Plot::create($request->all());

        // Redirect to the index page with a success message
        return redirect()->route('admin.plots.index')->with('success', 'Plot details added successfully.');
    }
}
