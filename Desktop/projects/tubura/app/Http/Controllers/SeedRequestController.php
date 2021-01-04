<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeedRequestPostRequest;
use App\Models\SeedRequest;
use App\Models\SeedStock;
use App\Models\SeedApplication;
use App\Models\Farmer;
use Auth;
use Alert;


class SeedRequestController extends Controller
{

    public function index()
    {
        $seed_requests = SeedRequest::where('cell_id', Auth::user()->cell_id)->get();
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
        $seed_request->cell_id=Farmer::find($data['farmer_id'])->cell_id;
        $seed_request->save();
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


    function approve(Request $request, $id){
     
        $seedRequest=SeedRequest::find($id);

        if($seedRequest->approved){

        $seedRequest->approved=0;
        $seedRequest->save();

        return redirect()->back()->with('toast_success', " Request denied");
           
        }


        else{
            $seedRequest->approved=1;
            $seedRequest->save();

        return redirect()->back()->with('toast_success', " Request approved");

        }
        

    }



    function receive(Request $request, $id){
     
        $seedRequest=SeedRequest::find($id);

        if($seedRequest->received){

        $seedRequest->approved=0;
        $seedRequest->save();

        return redirect()->back()->with('toast_success', " Requet marked as not received");
           
        }


        else{
           
            $cell=$seedRequest->cell_id;
            $season= $seedRequest->seed_application->season_id;
            $seed=$seedRequest->seed_id;

            $stock=SeedStock::where('cell_id',$cell)->where('season_id', $season)
                                ->where('seed_id', $seed)->first();
            $checkStock=$stock->count();

            if($checkStock>0){
                $currentStock=$stock->current_amount;
                $request_amount=$seedRequest->requested_amount;

                if($currentStock<$request_amount){
                    return redirect()->back()->with('toast_warning', 'Your stock can not satify this request.');
                
                }
                
                else{
                
                   
                    $stock->current_amount=$stock->current_amount-$request_amount;
                    $stock->save();
                    $seedRequest->received=1;
                    $seedRequest->save();
                
                return redirect()->back()->with('toast_success', " Request marked as received ");
                }


            }

            else{

                return redirect()->back()->with('toast_warning', 'You need to create stock first');
            }

           

        }
        

    }
}
