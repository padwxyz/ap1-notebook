<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pic;

class PicController extends Controller
{
    public function index()
    {
        $pics = Pic::all();
        $title = 'PIC Data';
        return view('pages.admin.master_data.pic', compact('pics', 'title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pic_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        Pic::create($validatedData);
        return redirect()->back()->with('success', 'PIC created successfully.');
    }

    public function update(Request $request, $id)
    {
        $pic = Pic::findOrFail($id);

        $validatedData = $request->validate([
            'pic_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        $pic->update($validatedData);
        return redirect()->back()->with('success', 'PIC updated successfully.');
    }

    public function delete($id)
    {
        Pic::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'PIC deleted successfully.');
    }
}
