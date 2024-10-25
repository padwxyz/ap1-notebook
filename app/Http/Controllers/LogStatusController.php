<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class LogStatusController extends Controller
{
    public function index()
    {
        $notes = Note::with(['location', 'facility', 'category', 'item'])->paginate(10);
        $title = 'Log Status';

        return view('pages.user.log_status.log', compact('notes', 'title'));
    }
}