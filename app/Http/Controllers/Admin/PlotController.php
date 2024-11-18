<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlotController extends Controller
{
    public function create()
    {
        return view('admin.plots.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plot_number' => 'required',
            'block' => 'required',
            'locality' => 'required',
            'plan_number' => 'required',
            'registered_town_plan_number' => 'required',
            'legal_area' => 'required|numeric',
            'district' => 'required',
            'region' => 'required',
            'drawing_number' => 'required',
            'survey_type' => 'required',
            'surveyor_name' => 'required',
            'council' => 'required',
            'price' => 'required|numeric',
        ]);

        Plot::create($request->all());

        return redirect()->route('admin.plots.index')->with('success', 'Plot details added successfully.');
    }
}
