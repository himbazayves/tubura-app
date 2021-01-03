<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\FertilizerApplicationPostRequest;
use App\Http\Controllers\Controller;
use App\Models\FertilizerApplication;

class FertilizerApplicationController extends Controller
{


    public function index()
    {
        return FertilizerApplication::all();
    }

    public function show(Request $request, FertilizerApplication $fertilizer_application)
    {
        return $fertilizer_application;
    }

    public function store(FertilizerApplicationPostRequest $request)
    {
        $data = $request->validated();
        $fertilizer_application = FertilizerApplication::create($data);
        return $fertilizer_application;
    }

    public function update(FertilizerApplicationPostRequest $request, FertilizerApplication $fertilizer_application)
    {
        $data = $request->validated();
        $fertilizer_application->fill($data);
        $fertilizer_application->save();

        return $fertilizer_application;
    }

    public function destroy(Request $request, FertilizerApplication $fertilizer_application)
    {
        $fertilizer_application->delete();
        return $fertilizer_application;
    }

}
