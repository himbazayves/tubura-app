@extends('layouts.master')



@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Fertilizer Request create</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard" >Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Fertilizer Request</li>
    </ol>
</nav>

@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Fertilizer Request Show </h1>
        </div>

    <div class="card-body">
                                                                        <div class="form-group">
            <label class="col-form-label" for="value">Requested Amount</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$fertilizerRequest->requested_amount}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Given Amount</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$fertilizerRequest->given_amount}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Approved</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$fertilizerRequest->approved}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Received</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$fertilizerRequest->received}}">
        </div>
                                                                    </div>

    </div>

    <div class="card mb-4">

                                                        
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection