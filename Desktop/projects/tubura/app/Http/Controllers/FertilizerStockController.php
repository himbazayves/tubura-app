<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FertilizerStockPostRequest;
use App\Models\FertilizerStock;


class FertilizerStockController extends Controller
{

    public function index()
    {
        $fertilizer_stocks = FertilizerStock::all();
        return view('fertilizer_stocks.index', compact('fertilizer_stocks'));
    }

    public function show(Request $request, FertilizerStock $fertilizer_stock)
    {
        return view('fertilizer_stocks.show', compact('fertilizer_stock'));
    }

    public function create()
    {
        return view('fertilizer_stocks.create');
    }

    public function store(FertilizerStockPostRequest $request)
    {
        $data = $request->validated();
        $fertilizer_stock = FertilizerStock::create($data);
        return redirect()->route('fertilizer-stocks.index')->with('status', 'FertilizerStock created!');
    }

    public function edit(Request $request, FertilizerStock $fertilizer_stock)
    {
        return view('fertilizer_stocks.edit', compact('fertilizer_stock'));
    }

    public function update(FertilizerStockPostRequest $request, FertilizerStock $fertilizer_stock)
    {
        $data = $request->validated();
        $fertilizer_stock->fill($data);
        $fertilizer_stock->save();
        return redirect()->route('fertilizer-stocks.index')->with('status', 'FertilizerStock updated!');
    }

    public function destroy(Request $request, FertilizerStock $fertilizer_stock)
    {
        $fertilizer_stock->delete();
        return redirect()->route('fertilizer-stocks.index')->with('status', 'FertilizerStock destroyed!');
    }
}
