<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\StockPostRequest;
use App\Http\Controllers\Controller;
use App\Models\Stock;

class StockController extends Controller
{


    public function index()
    {
        return Stock::all();
    }

    public function show(Request $request, Stock $stock)
    {
        return $stock;
    }

    public function store(StockPostRequest $request)
    {
        $data = $request->validated();
        $stock = Stock::create($data);
        return $stock;
    }

    public function update(StockPostRequest $request, Stock $stock)
    {
        $data = $request->validated();
        $stock->fill($data);
        $stock->save();

        return $stock;
    }

    public function destroy(Request $request, Stock $stock)
    {
        $stock->delete();
        return $stock;
    }

}
