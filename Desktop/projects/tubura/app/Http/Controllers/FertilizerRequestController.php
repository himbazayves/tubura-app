<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FertilizerRequestPostRequest;
use App\Models\FertilizerRequest;
use Alert;


class FertilizerRequestController extends Controller
{

    public function index()
    {
        $fertilizer_requests = FertilizerRequest::all();
        return view('fertilizer_requests.index', compact('fertilizer_requests'));
    }

    public function show(Request $request, FertilizerRequest $fertilizer_request)
    {
        return view('fertilizer_requests.show', compact('fertilizer_request'));
    }

    public function create()
    {
        return view('fertilizer_requests.create');
    }

    public function store(FertilizerRequestPostRequest $request)
    {
        $data = $request->validated();

        $data = $request->validated();
        $check= FertilizerRequest::where('fertilizer_id' , $data['fertilizer_id'])
        ->where('fertilizer_application_id',$data['fertilizer_application_id'])
        ->where('farmer_id', $data['farmer_id'])

        ->count();
if($check>0){

return redirect()->back()->with('toast_warning','We Arleady have that request');
}
else{
       
    //dump($data);
    //$fertilizer_request = FertilizerRequest::create($data);
    $fertilizer_request= new FertilizerRequest;
    $fertilizer_request->fertilizer_id=$data['fertilizer_id'];
    $fertilizer_request->farmer_id=$data['farmer_id'];
    $fertilizer_request->requested_amount=$data['requested_amount'];
    
    $fertilizer_request->fertilizer_application_id=$data['fertilizer_application_id'];
    $fertilizer_request->save();
        

}
        
    return redirect()->route('fertilizer-requests.index')->with('status', 'FertilizerRequest created!');
    }

    public function edit(Request $request, FertilizerRequest $fertilizer_request)
    {
        return view('fertilizer_requests.edit', compact('fertilizer_request'));
    }

    public function update(FertilizerRequestPostRequest $request, FertilizerRequest $fertilizer_request)
    {
        $data = $request->validated();
        $fertilizer_request->fill($data);
        $fertilizer_request->save();
        return redirect()->route('fertilizer-requests.index')->with('status', 'FertilizerRequest updated!');
    }

    public function destroy(Request $request, FertilizerRequest $fertilizer_request)
    {
        $fertilizer_request->delete();
        return redirect()->route('fertilizer-requests.index')->with('status', 'FertilizerRequest destroyed!');
    }
}
