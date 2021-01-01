<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\FertilizerRequestPostRequest;
use App\Http\Controllers\Controller;
use App\Models\FertilizerRequest;

class FertilizerRequestController extends Controller
{


    public function index()
    {
        return FertilizerRequest::all();
    }

    public function show(Request $request, FertilizerRequest $fertilizer_request)
    {
        return $fertilizer_request;
    }

    public function store(FertilizerRequestPostRequest $request)
    {
        $data = $request->validated();
        $fertilizer_request = FertilizerRequest::create($data);
        return $fertilizer_request;
    }

    public function update(FertilizerRequestPostRequest $request, FertilizerRequest $fertilizer_request)
    {
        $data = $request->validated();
        $fertilizer_request->fill($data);
        $fertilizer_request->save();

        return $fertilizer_request;
    }

    public function destroy(Request $request, FertilizerRequest $fertilizer_request)
    {
        $fertilizer_request->delete();
        return $fertilizer_request;
    }

}
