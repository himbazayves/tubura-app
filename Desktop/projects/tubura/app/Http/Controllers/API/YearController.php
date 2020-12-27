<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\YearPostRequest;
use App\Http\Controllers\Controller;
use App\Models\Year;

class YearController extends Controller
{


    public function index()
    {
        return Year::all();
    }

    public function show(Request $request, Year $year)
    {
        return $year;
    }

    public function store(YearPostRequest $request)
    {
        $data = $request->validated();
        $year = Year::create($data);
        return $year;
    }

    public function update(YearPostRequest $request, Year $year)
    {
        $data = $request->validated();
        $year->fill($data);
        $year->save();

        return $year;
    }

    public function destroy(Request $request, Year $year)
    {
        $year->delete();
        return $year;
    }

}
