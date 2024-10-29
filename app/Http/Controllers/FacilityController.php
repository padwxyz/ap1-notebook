<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Location;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::with('location')->get();
        $locations = Location::all();
        $title = 'Facility Data';
        return view('pages.admin.master_data.facility', compact('facilities', 'locations', 'title'));
    }

    public function store(Request $request)
    {
        Facility::create($request->all());
        return redirect()->back()->with('success', 'Facility created successfully.');
    }

    public function update(Request $request, $id)
    {
        $facility = Facility::findOrFail($id);
        $facility->update($request->all());
        return redirect()->back()->with('success', 'Facility updated successfully.');
    }

    public function delete($id)
    {
        Facility::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Facility deleted successfully.');
    }
}
