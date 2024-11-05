<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class LogStatusController extends Controller
{
    public function index()
    {
        $items = Item::with('category.facility.location')->paginate(10);
        $title = 'Log Status';

        return view('pages.user.log_status.log', compact('items', 'title'));
    }
}
