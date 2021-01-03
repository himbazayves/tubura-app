<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\SeedPostRequest;
use App\Models\Seed;
use Alert;


class SeedController extends Controller
{

    public function index()
    {
        $seeds = Seed::all();
        return view('seeds.index', compact('seeds'));
    }

    public function show(Request $request, Seed $seed)
    {
        return view('seeds.show', compact('seed'));
    }

    public function create()
    {
        return view('seeds.create');
    }

    public function store(SeedPostRequest $request)
    {
        $data = $request->validated();
        $seed = Seed::create($data);
        return redirect()->route('seeds.index')->with('toast_success', 'Seed created!');
    }

    public function edit(Request $request, Seed $seed)
    {
        return view('seeds.edit', compact('seed'));
    }

    public function update(SeedPostRequest $request, Seed $seed)
    {
        $data = $request->validated();
        $seed->fill($data);
        $seed->save();
        return redirect()->route('seeds.index')->with('toast_success', 'Seed updated!');
    }

    public function destroy(Request $request, Seed $seed)
    {
        $seed->delete();
        return redirect()->route('seeds.index')->with('toast_success', 'Seed destroyed!');
    }
}
