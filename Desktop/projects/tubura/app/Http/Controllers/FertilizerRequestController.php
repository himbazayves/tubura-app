<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FertilizerRequestPostRequest;
use App\Models\FertilizerRequest;


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
        $fertilizer_request = FertilizerRequest::create($data);
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
