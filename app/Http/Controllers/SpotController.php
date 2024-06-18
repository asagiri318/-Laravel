<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spot;

class SpotController extends Controller
{
    public function create()
    {
        return view('spot.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'prefecture' => 'required|string|max:50',
            'city' => 'required|string|max:100',
            'description' => 'required|string',
            'date_visited' => 'required|date',
            'child_age_range' => 'required|string|max:50',
            'rating' => 'required|integer|min:1|max:5',
            'photo' => 'nullable|image|max:2048',
            'spot_url' => 'nullable|url|max:255',
        ]);

        $spot = new Spot($request->all());

        if ($request->hasFile('photo')) {
            $spot->photo = $request->file('photo')->store('photos', 'public');
        }

        $spot->save();

        return redirect()->route('mypage')->with('status', 'スポットが登録されました');
    }

    public function show($id)
    {
        $spot = Spot::findOrFail($id);
        return view('spot.show', compact('spot'));
    }
}
