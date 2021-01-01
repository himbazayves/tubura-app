<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\SeedRequestPostRequest;
use App\Http\Controllers\Controller;
use App\Models\SeedRequest;

class SeedRequestController extends Controller
{


    public function index()
    {
        return SeedRequest::all();
    }

    public function show(Request $request, SeedRequest $seed_request)
    {
        return $seed_request;
    }

    public function store(SeedRequestPostRequest $request)
    {
        $data = $request->validated();
        $seed_request = SeedRequest::create($data);
        return $seed_request;
    }

    public function update(SeedRequestPostRequest $request, SeedRequest $seed_request)
    {
        $data = $request->validated();
        $seed_request->fill($data);
        $seed_request->save();

        return $seed_request;
    }

    public function destroy(Request $request, SeedRequest $seed_request)
    {
        $seed_request->delete();
        return $seed_request;
    }

}
