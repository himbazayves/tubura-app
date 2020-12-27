<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\SeasonPostRequest;
use App\Http\Controllers\Controller;
use App\Models\Season;

class SeasonController extends Controller
{


    public function index()
    {
        return Season::all();
    }

    public function show(Request $request, Season $season)
    {
        return $season;
    }

    public function store(SeasonPostRequest $request)
    {
        $data = $request->validated();
        $season = Season::create($data);
        return $season;
    }

    public function update(SeasonPostRequest $request, Season $season)
    {
        $data = $request->validated();
        $season->fill($data);
        $season->save();

        return $season;
    }

    public function destroy(Request $request, Season $season)
    {
        $season->delete();
        return $season;
    }

}
