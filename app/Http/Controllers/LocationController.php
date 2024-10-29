<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        $title = 'Location Data';
        return view('pages.admin.master_data.location', compact('locations', 'title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'location_name' => 'required|string|max:255',
        ]);

        Location::create($validatedData);
        return redirect()->back()->with('success', 'Location created successfully.');
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $validatedData = $request->validate([
            'location_name' => 'required|string|max:255',
        ]);

        $location->update($validatedData);
        return redirect()->back()->with('success', 'Location updated successfully.');
    }

    public function delete($id)
    {
        Location::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Location deleted successfully.');
    }
}