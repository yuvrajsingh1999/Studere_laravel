<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;

class VenuesController extends Controller
{
    public function index(Venue $venue)
    {
        $venues = $venue->all();
        $title = "Venues";
        return view('venues', compact('title', 'venues'));
    }

    public function store(Request $request, Venue $venue)
    {
        $this->validate($request, [
            'name' => 'required|unique:venues'
        ]);

        $venue->create(['name' => $request->get('name')]);

        return redirect()->back()->with('success', 'Hall created successfully!');
    }
}
