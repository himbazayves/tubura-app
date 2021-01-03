<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FertilizerStockPostRequest;
use App\Models\FertilizerStock;
use Alert;


class FertilizerStockController extends Controller
{

    public function index()
    {
        $fertilizer_stocks = FertilizerStock::all();
        return view('fertilizer_stocks.index', compact('fertilizer_stocks'));
    }

    public function show(Request $request, FertilizerStock $fertilizerStock)
    {
        return view('fertilizer_stocks.show', compact('fertilizerStock'));
    }

    public function create()
    {
        return view('fertilizer_stocks.create');
    }

    public function store(FertilizerStockPostRequest $request)
    {
        $data = $request->validated();

        //var_dump($data);

        $stock= new FertilizerStock;
        $stock->initial_amount=$data['initial_amount'];
        $stock->current_amount=$data['initial_amount'];
        $stock->season_id=$data['season_id'];
        $stock->fertilizer_id=$data['fertilizer_id'];
        $stock->save();


       // $fertilizer_stock = FertilizerStock::create($data);
        return redirect()->route('fertilizer-stocks.index')->with('toast_success', 'FertilizerStock created!');
    }

    public function edit(Request $request, FertilizerStock $fertilizer_stock)
    {
        return view('fertilizer_stocks.edit', compact('fertilizer_stock'));
    }

    public function update(FertilizerStockPostRequest $request, FertilizerStock $fertilizer_stock)
    {
        $data = $request->validated();

        $stock= FertilizerStock::find($fertilizer_stock['id']);
        $stock->initial_amount=$data['initial_amount'];
        $stock->current_amount=$data['initial_amount'];
        $stock->season_id=$data['season_id'];
        $stock->fertilizer_id=$data['fertilizer_id'];
        $stock->save();

       // var_dump($fertilizer_stock);
     // echo $fertilizer_stock['id'];
        //$fertilizer_stock->fill($data);
        //$fertilizer_stock->save();
    return redirect()->route('fertilizer-stocks.index')->with('toast_success', 'FertilizerStock updated!');
    }

    public function destroy(Request $request, FertilizerStock $fertilizer_stock)
    {
        $fertilizer_stock->delete();
        return redirect()->route('fertilizer-stocks.index')->with('toast_success', 'FertilizerStock destroyed!');
    }
}
