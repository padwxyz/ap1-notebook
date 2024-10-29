<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class HistoryController extends Controller
{
    public function index()
    {
        $title = 'All Activity';
        $notes = Note::all();
        return view('pages.user.history.history', compact('title', 'notes'));
    }
}
