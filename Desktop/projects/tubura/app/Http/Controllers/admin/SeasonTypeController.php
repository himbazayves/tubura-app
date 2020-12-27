<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\SeasonTypePostRequest;
use App\Models\SeasonType;


class SeasonTypeController extends Controller
{

    public function index()
    {
        $season_types = SeasonType::all();
        return view('admin.season_types.index', compact('season_types'));
    }

    public function show(Request $request, SeasonType $season_type)
    {
        return view('admin.season_types.show', compact('season_type'));
    }

    public function create()
    {
        return view('admin.season_types.create');
    }

    public function store(SeasonTypePostRequest $request)
    {
        $data = $request->validated();
        $season_type = SeasonType::create($data);
        return redirect()->route('season-types.index')->with('status', 'SeasonType created!');
    }

    public function edit(Request $request, SeasonType $season_type)
    {
        return view('admin.season_types.edit', compact('season_type'));
    }

    public function update(SeasonTypePostRequest $request, SeasonType $season_type)
    {
        $data = $request->validated();
        $season_type->fill($data);
        $season_type->save();
        return redirect()->route('season-types.index')->with('status', 'SeasonType updated!');
    }

    public function destroy(Request $request, SeasonType $season_type)
    {
        $season_type->delete();
        return redirect()->route('season-types.index')->with('status', 'SeasonType destroyed!');
    }
}
