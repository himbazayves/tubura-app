<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\YearPostRequest;
use App\Models\Year;


class YearController extends Controller
{

    public function index()
    {
        $years = Year::all();
        return view('admin.years.index', compact('years'));
    }

    public function show(Request $request, Year $year)
    {
        return view('admin.years.show', compact('year'));
    }

    public function create()
    {
        return view('admin.years.create');
    }

    public function store(YearPostRequest $request)
    {
        $data = $request->validated();
        $year = Year::create($data);
        return redirect()->route('years.index')->with('status', 'Year created!');
    }

    public function edit(Request $request, Year $year)
    {
        return view('admin.years.edit', compact('year'));
    }

    public function update(YearPostRequest $request, Year $year)
    {
        $data = $request->validated();
        $year->fill($data);
        $year->save();
        return redirect()->route('years.index')->with('status', 'Year updated!');
    }

    public function destroy(Request $request, Year $year)
    {
        $year->delete();
        return redirect()->route('years.index')->with('status', 'Year destroyed!');
    }
}
