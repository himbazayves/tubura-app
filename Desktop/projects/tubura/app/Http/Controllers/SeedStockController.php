<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeedStockPostRequest;
use App\Models\SeedStock;


class SeedStockController extends Controller
{

    public function index()
    {
        $seed_stocks = SeedStock::all();
        return view('seed_stocks.index', compact('seed_stocks'));
    }

    public function show(Request $request, SeedStock $seed_stock)
    {
        return view('seed_stocks.show', compact('seed_stock'));
    }

    public function create()
    {
        return view('seed_stocks.create');
    }

    public function store(SeedStockPostRequest $request)
    {
        $data = $request->validated();
        $seed_stock = SeedStock::create($data);
        return redirect()->route('seed-stocks.index')->with('status', 'SeedStock created!');
    }

    public function edit(Request $request, SeedStock $seed_stock)
    {
        return view('seed_stocks.edit', compact('seed_stock'));
    }

    public function update(SeedStockPostRequest $request, SeedStock $seed_stock)
    {
        $data = $request->validated();
        $seed_stock->fill($data);
        $seed_stock->save();
        return redirect()->route('seed-stocks.index')->with('status', 'SeedStock updated!');
    }

    public function destroy(Request $request, SeedStock $seed_stock)
    {
        $seed_stock->delete();
        return redirect()->route('seed-stocks.index')->with('status', 'SeedStock destroyed!');
    }
}
