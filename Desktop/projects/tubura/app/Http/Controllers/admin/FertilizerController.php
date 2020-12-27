<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FertilizerPostRequest;
use App\Models\Fertilizer;


class FertilizerController extends Controller
{

    public function index()
    {
        $fertilizers = Fertilizer::all();
        return view('admin.fertilizers.index', compact('fertilizers'));
    }

    public function show(Request $request, Fertilizer $fertilizer)
    {
        return view('admin.fertilizers.show', compact('fertilizer'));
    }

    public function create()
    {
        return view('admin.fertilizers.create');
    }

    public function store(FertilizerPostRequest $request)
    {
        $data = $request->validated();
        $fertilizer = Fertilizer::create($data);
        return redirect()->route('fertilizers.index')->with('status', 'Fertilizer created!');
    }

    public function edit(Request $request, Fertilizer $fertilizer)
    {
        return view('admin.fertilizers.edit', compact('fertilizer'));
    }

    public function update(FertilizerPostRequest $request, Fertilizer $fertilizer)
    {
        $data = $request->validated();
        $fertilizer->fill($data);
        $fertilizer->save();
        return redirect()->route('fertilizers.index')->with('status', 'Fertilizer updated!');
    }

    public function destroy(Request $request, Fertilizer $fertilizer)
    {
        $fertilizer->delete();
        return redirect()->route('fertilizers.index')->with('status', 'Fertilizer destroyed!');
    }
}
