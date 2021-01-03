<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeedRequestPostRequest;
use App\Models\SeedRequest;
use App\Models\SeedApplication;


class SeedRequestController extends Controller
{

    public function index()
    {
        $seed_requests = SeedRequest::all();
        return view('seed_requests.index', compact('seed_requests'));
    }

    public function show(Request $request, SeedRequest $seed_request)
    {
        return view('seed_requests.show', compact('seed_request'));
    }

    public function create()
    {
        return view('seed_requests.create');
    }

    public function store(SeedRequestPostRequest $request)
    {
        $data = $request->validated();
        $check= SeedRequest::where('seed_id' , $data['seed_id'])
        ->where('seed_application_id',$data['seed_application_id'])
        ->where('farmer_id', $data['farmer_id'])

        ->count();
if($check>0){

return redirect()->back()->with('toast_warning','We Arleady have that request');
}
else{
    
    if(SeedApplication::where('id',$data['seed_application_id'])->first()->open)
     {
        $seed_request = SeedRequest::create($data);
        return redirect()->route('seed-requests.index')->with('status', 'SeedRequest created!');
     }

     else{

        return redirect()->back()->with('toast_warning','Fertilizer application for this season is closed.'); 
     }
}
    
    }

    public function edit(Request $request, SeedRequest $seed_request)
    {
        return view('seed_requests.edit', compact('seed_request'));
    }

    public function update(SeedRequestPostRequest $request, SeedRequest $seed_request)
    {
        $data = $request->validated();
        $seed_request->fill($data);
        $seed_request->save();
        return redirect()->route('seed-requests.index')->with('status', 'SeedRequest updated!');
    }

    public function destroy(Request $request, SeedRequest $seed_request)
    {
        $seed_request->delete();
        return redirect()->route('seed-requests.index')->with('status', 'SeedRequest destroyed!');
    }
}
