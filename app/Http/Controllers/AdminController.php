<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        $title = 'Admin Management Data';
        return view('pages.admin.master_data.admin', compact('admins', 'title'));
    }

    public function store(Request $request)
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

    public function update(Request $request, $id)
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

    public function delete($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Admin deleted successfully.');
    }
}
