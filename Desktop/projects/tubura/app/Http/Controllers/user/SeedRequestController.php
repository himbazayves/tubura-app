<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\SeedRequestPostRequest;
use App\Models\SeedRequest;
Use Alert;


class SeedRequestController extends Controller
{

    public function index()
    {
        $seed_requests = SeedRequest::all();
        return view('user.seed_requests.index', compact('seed_requests'));
    }

    public function show(Request $request, SeedRequest $seedRequest)
    {
        return view('user.seed_requests.show', compact('seedRequest'));
    }

    public function create()
    {
        return view('user.seed_requests.create');
    }

    public function store(SeedRequestPostRequest $request)
    {
        $data = $request->validated();
        
        $check= SeedRequest::where('seed_id' , $data['seed_id'])
                             ->where('season_id',$data['season_id'])
                             ->where('farmer_id', $data['farmer_id'])
        
                             ->count();
        if($check>0){

            return redirect()->back()->with('toast_warning','We Arleady have that request');
        }

      else  {

        $seed_request = SeedRequest::create($data);
        return redirect()->route('seed-requests.index')->with('toast_success', 'Seed request created!');
        }
    }

    public function edit(Request $request, SeedRequest $seed_request)
    {
        return view('user.seed_requests.edit', compact('seed_request'));
    }

    public function update(SeedRequestPostRequest $request, SeedRequest $seed_request)
    {
        $data = $request->validated();
        $seed_request->fill($data);
        $seed_request->save();
        return redirect()->route('seed-requests.index')->with('toast_success', 'Seed Request updated!');
    }

    public function destroy(Request $request, SeedRequest $seed_request)
    {
        $seed_request->delete();
        return redirect()->route('seed-requests.index')->with('toast_success', 'SeedRequest destroyed!');
    }
}
