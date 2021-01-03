<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\FertilizerStockPostRequest;
use App\Http\Controllers\Controller;
use App\Models\FertilizerStock;

class FertilizerStockController extends Controller
{


    public function index()
    {
        return FertilizerStock::all();
    }

    public function show(Request $request, FertilizerStock $fertilizer_stock)
    {
        return $fertilizer_stock;
    }

    public function store(FertilizerStockPostRequest $request)
    {
        $data = $request->validated();
        $fertilizer_stock = FertilizerStock::create($data);
        return $fertilizer_stock;
    }

    public function update(FertilizerStockPostRequest $request, FertilizerStock $fertilizer_stock)
    {
        $data = $request->validated();
        $fertilizer_stock->fill($data);
        $fertilizer_stock->save();

        return $fertilizer_stock;
    }

    public function destroy(Request $request, FertilizerStock $fertilizer_stock)
    {
        $fertilizer_stock->delete();
        return $fertilizer_stock;
    }

}
