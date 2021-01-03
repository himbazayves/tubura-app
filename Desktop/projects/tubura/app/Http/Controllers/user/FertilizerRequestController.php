<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\FertilizerRequestPostRequest;
use App\Models\FertilizerRequest;
use Alert;


class FertilizerRequestController extends Controller
{

    public function index()
    {
        $fertilizer_requests = FertilizerRequest::all();
        return view('user.fertilizer_requests.index', compact('fertilizer_requests'));
    }

    public function show(Request $request, FertilizerRequest $fertilizerRequest)
    {
        return view('user.fertilizer_requests.show', compact('fertilizerRequest'));
    }

    public function create()
    {
        return view('user.fertilizer_requests.create');
    }

    public function store(FertilizerRequestPostRequest $request)
    {
        $data = $request->validated();
        $check= FertilizerRequest::where('fertilizer_id' , $data['fertilizer_id'])
        ->where('season_id',$data['season_id'])
        ->where('farmer_id', $data['farmer_id'])

        ->count();
if($check>0){

return redirect()->back()->with('toast_warning','We Arleady have that request');
}
else{
        $fertilizer_request = FertilizerRequest::create($data);

}
        return redirect()->route('fertilizer-requests.index')->with('toast_success', 'FertilizerRequest created!');
    }

    public function edit(Request $request, FertilizerRequest $fertilizer_request)
    {
        return view('user.fertilizer_requests.edit', compact('fertilizer_request'));
    }

    public function update(FertilizerRequestPostRequest $request, FertilizerRequest $fertilizer_request)
    {
        $data = $request->validated();
        $fertilizer_request->fill($data);
        $fertilizer_request->save();
        return redirect()->route('fertilizer-requests.index')->with('toast_success', 'FertilizerRequest updated!');
    }

    public function destroy(Request $request, FertilizerRequest $fertilizer_request)
    {
        $fertilizer_request->delete();
        return redirect()->route('fertilizer-requests.index')->with('toast_success', 'FertilizerRequest destroyed!');
    }
}
