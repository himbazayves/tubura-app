<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\SeedPostRequest;
use App\Http\Controllers\Controller;
use App\Models\Seed;

class SeedController extends Controller
{


    public function index()
    {
        return Seed::all();
    }

    public function show(Request $request, Seed $seed)
    {
        return $seed;
    }

    public function store(SeedPostRequest $request)
    {
        $data = $request->validated();
        $seed = Seed::create($data);
        return $seed;
    }

    public function update(SeedPostRequest $request, Seed $seed)
    {
        $data = $request->validated();
        $seed->fill($data);
        $seed->save();

        return $seed;
    }

    public function destroy(Request $request, Seed $seed)
    {
        $seed->delete();
        return $seed;
    }

}
