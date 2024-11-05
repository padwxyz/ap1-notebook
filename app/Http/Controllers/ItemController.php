<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category.facility.location')->get();
        $categories = Category::with('facility.location')->get();
        $title = 'Item Management Data';
        return view('pages.admin.master_data.item', compact('items', 'categories', 'title'));
    }

    public function store(Request $request)
    {
        Item::create($request->all());
        return redirect()->back()->with('success', 'Item created successfully.');
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());
        return redirect()->back()->with('success', 'Item updated successfully.');
    }

    public function delete($id)
    {
        Item::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Item deleted successfully.');
    }
}
