<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\SeedStockPostRequest;
use App\Http\Controllers\Controller;
use App\Models\SeedStock;

class SeedStockController extends Controller
{


    public function index()
    {
        return SeedStock::all();
    }

    public function show(Request $request, SeedStock $seed_stock)
    {
        return $seed_stock;
    }

    public function store(SeedStockPostRequest $request)
    {
        $data = $request->validated();
        $seed_stock = SeedStock::create($data);
        return $seed_stock;
    }

    public function update(SeedStockPostRequest $request, SeedStock $seed_stock)
    {
        $data = $request->validated();
        $seed_stock->fill($data);
        $seed_stock->save();

        return $seed_stock;
    }

    public function destroy(Request $request, SeedStock $seed_stock)
    {
        $seed_stock->delete();
        return $seed_stock;
    }

}
