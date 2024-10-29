<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Pic;
use App\Models\Location;
use App\Models\Facility;
use App\Models\Category;
use App\Models\Item;

class NoteController extends Controller
{
    // Render the form for creating a note
    public function index(Request $request)
    {
        $title = 'Create a New Note';
        $pics = Pic::all();
        $locations = Location::all();
        $facilities = collect(); // Empty collection
        $categories = collect(); // Empty collection
        $items = collect(); // Empty collection

        $selectedLocation = $request->location;
        $selectedFacility = $request->facility;
        $selectedCategory = $request->category;

        if ($selectedLocation) {
            $facilities = Facility::where('location_id', $selectedLocation)->get();
        }

        if ($selectedFacility) {
            $categories = Category::where('facility_id', $selectedFacility)->get();
        }

        if ($selectedCategory) {
            $items = Item::where('category_id', $selectedCategory)->get();
        }

        return view('pages.user.note.note', compact(
            'title',
            'pics',
            'locations',
            'facilities',
            'categories',
            'items',
            'selectedLocation',
            'selectedFacility',
            'selectedCategory'
        ));
    }

    // Store the newly created note
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'pic' => 'required|exists:pics,id',
            'location' => 'required|exists:locations,id',
            'facility' => 'nullable|exists:facilities,id',
            'category' => 'nullable|exists:categories,id',
            'item' => 'nullable|exists:items,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'problem' => 'required|string|max:255',
            'activity' => 'required|string|max:255',
            'status' => 'required|in:todo,pending,inprogress,done,cancel',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('notes_images', 'public') : null;

        Note::create(array_merge($validatedData, ['image' => $imagePath]));

        return redirect()->route('note.index')->with('success', 'Note saved successfully!');
    }

    public function allActivity()
    {
        $title = 'All Activity'; // Adding dynamic title
        $notes = Note::all();
        return view('pages.user.activity.activity', compact('title', 'notes'));
    }

    public function showActivityDetails($id)
    {
        $title = 'Activity Details'; // Adding dynamic title
        $note = Note::findOrFail($id);
        $pics = Pic::all(); // get all PICs for dropdown
        return view('pages.user.activity.activity_details', compact('note', 'pics', 'title'));
    }

    public function updateActivity(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:todo,pending,inprogress,done,cancel',
            'pic' => 'required|exists:pics,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'message' => 'required|string',
        ]);

        $note = Note::findOrFail($id);
        $note->update(array_merge($validatedData, ['activity' => $validatedData['message']]));

        return redirect()->route('activity-details', $id)->with('success', 'Activity updated successfully!');
    }

    public function history()
    {
        $title = 'All Activity'; // Adding dynamic title
        $notes = Note::all();
        return view('pages.user.history.history', compact('title', 'notes'));
    }
}
