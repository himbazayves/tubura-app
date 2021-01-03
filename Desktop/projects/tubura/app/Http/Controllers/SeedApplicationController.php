<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeedApplicationPostRequest;
use App\Models\SeedApplication;


class SeedApplicationController extends Controller
{

    public function index()
    {
        $seed_applications = SeedApplication::all();
        return view('seed_applications.index', compact('seed_applications'));
    }

    public function show(Request $request, SeedApplication $seed_application)
    {
        return view('seed_applications.show', compact('seed_application'));
    }

    public function create()
    {
        return view('seed_applications.create');
    }

    public function store(SeedApplicationPostRequest $request)
    {
        $data = $request->validated();
        $check=SeedApplication::where('season_id',$data['season_id'])->count();
        if($check>0){
            return redirect()->back()->with('toast_warning',"We arleady have that application");
        }
        else{
        $seed_application = SeedApplication::create($data);
        return redirect()->route('seed-applications.index')->with('toast_success', 'SeedApplication created!');
    }
    }

    public function edit(Request $request, SeedApplication $seed_application)
    {
        return view('seed_applications.edit', compact('seed_application'));
    }

    public function update(Request $request)
    {
        
        $request->validate([
            'season_id'=>"required",
            'open'=>'required'

        ]);
       
        $seed_application=SeedApplication::find($request->id);
        $seed_application->open=$request->open;
        $seed_application->season_id=$request->season_id;

        $seed_application->save();
        return redirect()->route('seed-applications.index')->with('toast_success', 'SeedApplication updated!');
    }

    public function destroy(Request $request, SeedApplication $seed_application)
    {
        $seed_application->delete();
        return redirect()->route('seed-applications.index')->with('toast_success', 'SeedApplication destroyed!');
    }
}
