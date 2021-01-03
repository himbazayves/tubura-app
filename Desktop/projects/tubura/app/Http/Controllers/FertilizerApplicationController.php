<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FertilizerApplicationPostRequest;
use App\Models\FertilizerApplication;
use Alert;


class FertilizerApplicationController extends Controller
{

    public function index()
    {
        $fertilizer_applications = FertilizerApplication::all();
        return view('fertilizer_applications.index', compact('fertilizer_applications'));
    }

    public function show(Request $request, FertilizerApplication $fertilizer_application)
    {
        return view('fertilizer_applications.show', compact('fertilizer_application'));
    }

    public function create()
    {
        return view('fertilizer_applications.create');
    }

    public function store(FertilizerApplicationPostRequest $request)
    {
        $data = $request->validated();

        $check=FertilizerApplication::where('season_id',$data['season_id'])->count();
        if($check>0){
            return redirect()->back()->with('toast_warning',"We arleady have that application");
        }
        else{
        $fertilizer_application = FertilizerApplication::create($data);
        return redirect()->route('fertilizer-applications.index')->with('toast_success', 'FertilizerApplication created!');
        }
    }

    public function edit(Request $request, FertilizerApplication $fertilizer_application)
    {
        return view('fertilizer_applications.edit', compact('fertilizer_application'));
    }

    public function update(FertilizerApplicationPostRequest $request, FertilizerApplication $fertilizer_application)
    {
        $data = $request->validated();
        $fertilizer_application->fill($data);
        $fertilizer_application->save();
        return redirect()->route('fertilizer-applications.index')->with('toast_success', 'FertilizerApplication updated!');
    }

    public function destroy(Request $request, FertilizerApplication $fertilizer_application)
    {
        $fertilizer_application->delete();
        return redirect()->route('fertilizer-applications.index')->with('toast_success', 'FertilizerApplication destroyed!');
    }
}
