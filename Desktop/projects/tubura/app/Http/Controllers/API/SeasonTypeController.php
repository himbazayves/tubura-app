<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\SeasonTypePostRequest;
use App\Http\Controllers\Controller;
use App\Models\SeasonType;

class SeasonTypeController extends Controller
{


    public function index()
    {
        return SeasonType::all();
    }

    public function show(Request $request, SeasonType $season_type)
    {
        return $season_type;
    }

    public function store(SeasonTypePostRequest $request)
    {
        $data = $request->validated();
        $season_type = SeasonType::create($data);
        return $season_type;
    }

    public function update(SeasonTypePostRequest $request, SeasonType $season_type)
    {
        $data = $request->validated();
        $season_type->fill($data);
        $season_type->save();

        return $season_type;
    }

    public function destroy(Request $request, SeasonType $season_type)
    {
        $season_type->delete();
        return $season_type;
    }

}
