<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\FertilizerPostRequest;
use App\Http\Controllers\Controller;
use App\Models\Fertilizer;

class FertilizerController extends Controller
{


    public function index()
    {
        return Fertilizer::all();
    }

    public function show(Request $request, Fertilizer $fertilizer)
    {
        return $fertilizer;
    }

    public function store(FertilizerPostRequest $request)
    {
        $data = $request->validated();
        $fertilizer = Fertilizer::create($data);
        return $fertilizer;
    }

    public function update(FertilizerPostRequest $request, Fertilizer $fertilizer)
    {
        $data = $request->validated();
        $fertilizer->fill($data);
        $fertilizer->save();

        return $fertilizer;
    }

    public function destroy(Request $request, Fertilizer $fertilizer)
    {
        $fertilizer->delete();
        return $fertilizer;
    }

}
