<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SeasonPostRequest;
use App\Models\Season;


class SeasonController extends Controller
{

    public function index()
    {
        $seasons = Season::all();
        return view('admin.seasons.index', compact('seasons'));
    }

    public function show(Request $request, Season $season)
    {
        return view('admin.seasons.show', compact('season'));
    }

    public function create()
    {
        return view('admin.seasons.create');
    }

    public function store(SeasonPostRequest $request)
    {
        $data = $request->validated();
        $season = Season::create($data);
        return redirect()->route('seasons.index')->with('status', 'Season created!');
    }

    public function edit(Request $request, Season $season)
    {
        return view('admin.seasons.edit', compact('season'));
    }

    public function update(SeasonPostRequest $request, Season $season)
    {
        $data = $request->validated();
        $season->fill($data);
        $season->save();
        return redirect()->route('seasons.index')->with('status', 'Season updated!');
    }

    public function destroy(Request $request, Season $season)
    {
        $season->delete();
        return redirect()->route('seasons.index')->with('status', 'Season destroyed!');
    }
}
