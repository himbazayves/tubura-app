<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\SeedApplicationPostRequest;
use App\Http\Controllers\Controller;
use App\Models\SeedApplication;

class SeedApplicationController extends Controller
{


    public function index()
    {
        return SeedApplication::all();
    }

    public function show(Request $request, SeedApplication $seed_application)
    {
        return $seed_application;
    }

    public function store(SeedApplicationPostRequest $request)
    {
        $data = $request->validated();
        $seed_application = SeedApplication::create($data);
        return $seed_application;
    }

    public function update(SeedApplicationPostRequest $request, SeedApplication $seed_application)
    {
        $data = $request->validated();
        $seed_application->fill($data);
        $seed_application->save();

        return $seed_application;
    }

    public function destroy(Request $request, SeedApplication $seed_application)
    {
        $seed_application->delete();
        return $seed_application;
    }

}
