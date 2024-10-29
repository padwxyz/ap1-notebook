<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Facility;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('facility.location')->get();
        $facilities = Facility::with('location')->get();
        $title = 'Category Data';
        return view('pages.admin.master_data.category', compact('categories', 'facilities', 'title'));
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
