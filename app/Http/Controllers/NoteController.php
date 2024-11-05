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
    public function getFacilities($locationId)
    {
        $facilities = Facility::where('location_id', $locationId)->get();
        return response()->json($facilities);
    }

    public function getCategories($facilityId)
    {
        $categories = Category::where('facility_id', $facilityId)->get();
        return response()->json($categories);
    }

    public function getItems($categoryId)
    {
        $items = Item::where('category_id', $categoryId)->get();
        return response()->json($items);
    }

    public function index(Request $request)
    {
        $title = 'New Note';
        $user = \App\Models\User::first();

        $pics = Pic::all();
        $locations = Location::all();
        $facilities = collect();
        $categories = collect();
        $items = collect();

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
            'user',
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

    public function store(Request $request)
    {
        $user = \App\Models\User::first();

        $validatedData = $request->validate([
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

        Note::create(array_merge($validatedData, [
            'name' => $user->name,
            'user_id' => $user->id,
            'pic_id' => $request->pic,
            'location_id' => $request->location,
            'facility_id' => $request->facility,
            'category_id' => $request->category,
            'item_id' => $request->item,
            'image' => $imagePath
        ]));

        return redirect()->route('note.index')->with('success', 'Note saved successfully!');
    }

    public function indexNote()
    {
        $datanotes = Note::with(['user', 'pic', 'location', 'facility', 'category', 'item'])->get();
        $locations = Location::all();
        $title = 'Note Management Data';
        return view('pages.admin.master_data.datanote', compact('datanotes', 'locations', 'title'));
    }

    public function storeNote(Request $request)
    {
        Note::create($request->all());
        return redirect()->back()->with('success', 'Note created successfully.');
    }

    public function updateNote(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update($request->all());
        return redirect()->back()->with('success', 'Note updated successfully.');
    }

    public function deleteNote($id)
    {
        Note::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Note deleted successfully.');
    }

    public function allActivity()
    {
        $title = 'All Activity';
        $notes = Note::all();
        return view('pages.user.activity.activity', compact('title', 'notes'));
    }

    public function showActivityDetails($id)
    {
        $title = 'Activity Details';
        $note = Note::findOrFail($id);
        $pics = Pic::all();
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
}
