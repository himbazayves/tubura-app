<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StockPostRequest;
use App\Models\Stock;


class StockController extends Controller
{

    public function index()
    {
        $stocks = Stock::all();
        return view('admin.stocks.index', compact('stocks'));
    }

    public function show(Request $request, Stock $stock)
    {
        return view('admin.stocks.show', compact('stock'));
    }

    public function create()
    {
        return view('admin.stocks.create');
    }

    public function store(StockPostRequest $request)
    {
        $data = $request->validated();


        $checkStock=Stock::where('season_id', $data['season_id'])
        ->where('seed_id', $data['seed_id'] )
        ->orWhere('fertilizer_id', $data['fertilizer_id'])->count();
        if($checkStock>0){

            echo "exist";
        }

        else{

            echo "lyes";
        }

        //foreach($stocks as $sctock)

        //var_dump($data);
       //$stock = Stock::create($data);
       //return redirect()->route('stocks.index')->with('status', 'Stock created!');
    }

    public function edit(Request $request, Stock $stock)
    {
        return view('admin.stocks.edit', compact('stock'));
    }

    public function update(StockPostRequest $request, Stock $stock)
    {
        $data = $request->validated();
        $stock->fill($data);
        $stock->save();
        return redirect()->route('stocks.index')->with('status', 'Stock updated!');
    }

    public function destroy(Request $request, Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('status', 'Stock destroyed!');
    }
}
