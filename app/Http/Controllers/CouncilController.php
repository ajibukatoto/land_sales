<?php

namespace App\Http\Controllers;

use App\Models\Council; // Ensure to import the Council model
use Illuminate\Http\Request;

class CouncilController extends Controller
{
    public function index()
    {
        $councils = Council::all();
        return view('councils.index', compact('councils'));
    }

    public function create()
    {
        return view('councils.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate(['name' => 'required']);

        // Create a new council
        Council::create($request->all());

        // Redirect to the councils index page
        return redirect()->route('councils.index')->with('success', 'Council created successfully.');
    }

    public function edit($id)
    {
        $council = Council::findOrFail($id);
        return view('councils.edit', compact('council'));
    }

    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate(['name' => 'required']);

        // Find and update the council
        $council = Council::findOrFail($id);
        $council->update($request->all());

        // Redirect to the councils index page
        return redirect()->route('councils.index')->with('success', 'Council updated successfully.');
    }

    public function destroy($id)
    {
        $council = Council::findOrFail($id);
        $council->delete();

        // Redirect to the councils index page
        return redirect()->route('councils.index')->with('success', 'Council deleted successfully.');
    }
}
