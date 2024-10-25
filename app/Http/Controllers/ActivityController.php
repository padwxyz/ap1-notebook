<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Category;
use App\Models\Facility;
use App\Models\Item;
use App\Models\Location;

class ActivityController extends Controller
{
    public function viewByCategory()
    {
        $categories = Category::all();
        $notes = null;
        $title = 'View Activity by Category';
        return view('pages.user.activity.activity_bycategory', compact('categories', 'notes', 'title'));
    }

    public function viewByFacility()
    {
        $facilities = Facility::all();
        $notes = null;
        $title = 'View Activity by Facility';
        return view('pages.user.activity.activity_byfacility', compact('facilities', 'notes', 'title'));
    }

    public function viewByItem()
    {
        $items = Item::all();
        $notes = null;
        $title = 'View Activity by Item';
        return view('pages.user.activity.activity_byitem', compact('items', 'notes', 'title'));
    }

    public function viewByLocation()
    {
        $locations = Location::all();
        $notes = null;
        $title = 'View Activity by Location';
        return view('pages.user.activity.activity_bylocation', compact('locations', 'notes', 'title'));
    }

    public function filterActivity(Request $request)
    {
        $request->validate([
            'filter_type' => 'required|string|in:category,facility,item,location',
            'filter_value' => 'required|integer',
        ]);

        $filterType = $request->input('filter_type');
        $filterValue = $request->input('filter_value');

        $notes = Note::with(['category', 'facility', 'item', 'location'])
            ->when($filterType == 'category', function ($query) use ($filterValue) {
                return $query->where('category_id', $filterValue);
            })
            ->when($filterType == 'facility', function ($query) use ($filterValue) {
                return $query->where('facility_id', $filterValue);
            })
            ->when($filterType == 'item', function ($query) use ($filterValue) {
                return $query->where('item_id', $filterValue);
            })
            ->when($filterType == 'location', function ($query) use ($filterValue) {
                return $query->where('location_id', $filterValue);
            })
            ->get();

        $title = 'Filtered Activities';
        return view('pages.filtered_activities', compact('notes', 'title'));
    }

    public function viewByStatus()
    {
        $todos = Note::where('status', 'todo')->get();
        $pendings = Note::where('status', 'pending')->get();
        $inProgress = Note::where('status', 'inprogress')->get();
        $dones = Note::where('status', 'done')->get();
        $cancels = Note::where('status', 'cancel')->get();

        $title = 'View Activity by Status';
        return view('pages.user.activity.activity_bystatus', compact('todos', 'pendings', 'inProgress', 'dones', 'cancels', 'title'));
    }
}
