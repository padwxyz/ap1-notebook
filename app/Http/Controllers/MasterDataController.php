<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Pic;
use App\Models\Location;
use App\Models\Facility;
use App\Models\Category;
use App\Models\Item;
use App\Models\Note;

class MasterDataController extends Controller
{
    // CRUD for Admin
    

    // CRUD for User
    

    // CRUD for PIC
    

    // CRUD for Location
    

    // CRUD for Facility
    

    // CRUD for Category
    

    // CRUD for Item
    

    // CRUD for Note
    public function indexNote()
    {
        // Menggunakan eager loading untuk mengurangi jumlah query
        $datanotes = Note::with(['user', 'pic', 'location', 'facility', 'category', 'item'])->get();
        $locations = Location::all(); // Mengambil data locations untuk form
        $title = 'Datanote Management'; // Judul halaman yang sesuai
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

    public function getFacilitiesByLocation($location_id)
    {
        $facilities = Facility::where('location_id', $location_id)->get();
        return response()->json($facilities);
    }

    public function getCategoriesByFacility($facility_id)
    {
        $categories = Category::where('facility_id', $facility_id)->get();
        return response()->json($categories);
    }

    public function getItemsByCategory($category_id)
    {
        $items = Item::where('category_id', $category_id)->get();
        return response()->json($items);
    }
}
