<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
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
    public function indexAdmin()
    {
        $admins = Admin::all();
        $title = 'Admin Data';
        return view('pages.admin.master_data.admin', compact('admins', 'title'));
    }

    public function storeAdmin(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8',
        ]);

        Admin::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->back()->with('success', 'Admin created successfully.');
    }

    public function updateAdmin(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $admin->name = $validatedData['name'];
        $admin->email = $validatedData['email'];

        if ($request->filled('password')) {
            $admin->password = Hash::make($validatedData['password']);
        }

        $admin->save();

        return redirect()->back()->with('success', 'Admin updated successfully.');
    }

    public function deleteAdmin($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Admin deleted successfully.');
    }

    // CRUD for User
    public function indexUser()
    {
        $users = User::all();
        $title = 'User Data';
        return view('pages.admin.master_data.user', compact('users', 'title'));
    }

    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->back()->with('success', 'User created successfully.');
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:5',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->username = $validatedData['username'];

        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    // CRUD for PIC
    public function indexPic()
    {
        $pics = Pic::all();
        $title = 'PIC Data';
        return view('pages.admin.master_data.pic', compact('pics', 'title'));
    }

    public function storePic(Request $request)
    {
        $validatedData = $request->validate([
            'pic_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        Pic::create($validatedData);
        return redirect()->back()->with('success', 'PIC created successfully.');
    }

    public function updatePic(Request $request, $id)
    {
        $pic = Pic::findOrFail($id);

        $validatedData = $request->validate([
            'pic_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        $pic->update($validatedData);
        return redirect()->back()->with('success', 'PIC updated successfully.');
    }

    public function deletePic($id)
    {
        Pic::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'PIC deleted successfully.');
    }

    // CRUD for Location
    public function indexLocation()
    {
        $locations = Location::all();
        $title = 'Location Data';
        return view('pages.admin.master_data.location', compact('locations', 'title'));
    }

    public function storeLocation(Request $request)
    {
        $validatedData = $request->validate([
            'location_name' => 'required|string|max:255',
        ]);

        Location::create($validatedData);
        return redirect()->back()->with('success', 'Location created successfully.');
    }

    public function updateLocation(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $validatedData = $request->validate([
            'location_name' => 'required|string|max:255',
        ]);

        $location->update($validatedData);
        return redirect()->back()->with('success', 'Location updated successfully.');
    }

    public function deleteLocation($id)
    {
        Location::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Location deleted successfully.');
    }

    // CRUD for Facility
    public function indexFacility()
    {
        $facilities = Facility::with('location')->get();
        $locations = Location::all();
        $title = 'Facility Data';
        return view('pages.admin.master_data.facility', compact('facilities', 'locations', 'title'));
    }

    public function storeFacility(Request $request)
    {
        Facility::create($request->all());
        return redirect()->back()->with('success', 'Facility created successfully.');
    }

    public function updateFacility(Request $request, $id)
    {
        $facility = Facility::findOrFail($id);
        $facility->update($request->all());
        return redirect()->back()->with('success', 'Facility updated successfully.');
    }

    public function deleteFacility($id)
    {
        Facility::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Facility deleted successfully.');
    }

    // CRUD for Category
    public function indexCategory()
    {
        $categories = Category::with('facility.location')->get();
        $facilities = Facility::with('location')->get();
        $title = 'Category Data';
        return view('pages.admin.master_data.category', compact('categories', 'facilities', 'title'));
    }

    public function storeCategory(Request $request)
    {
        Category::create($request->all());
        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    public function deleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    // CRUD for Item
    public function indexItem()
    {
        $items = Item::with('category.facility.location')->get();
        $categories = Category::with('facility.location')->get();
        $title = 'Item Data';
        return view('pages.admin.master_data.item', compact('items', 'categories', 'title'));
    }

    public function storeItem(Request $request)
    {
        Item::create($request->all());
        return redirect()->back()->with('success', 'Item created successfully.');
    }

    public function updateItem(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());
        return redirect()->back()->with('success', 'Item updated successfully.');
    }

    public function deleteItem($id)
    {
        Item::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Item deleted successfully.');
    }

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
