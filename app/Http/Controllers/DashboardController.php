<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class DashboardController extends Controller
{
    public function index()
    {
        $todos = Note::where('status', 'todo')->count();
        $pendings = Note::where('status', 'pending')->count();
        $inProgress = Note::where('status', 'inprogress')->count();
        $dones = Note::where('status', 'done')->count();
        $cancels = Note::where('status', 'cancel')->count();
        $recentActivities = Note::orderBy('created_at', 'desc')->take(5)->get();
        $title = 'Dashboard';

        return view('pages.user.dashboard.dashboard', compact('todos', 'pendings', 'inProgress', 'dones', 'cancels', 'recentActivities', 'title'));
    }
}