@extends('layouts.master')



@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Fertilizer Stock create</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard" >Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Fertilizer Stock</li>
    </ol>
</nav>

@endsection

@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Fertilizer Stock Show </h1>
        </div>

    <div class="card-body">
                                                        <div class="form-group">
            <label class="col-form-label" for="value">Initial Amount</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$fertilizerStock->initial_amount}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Current Amount</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$fertilizerStock->current_amount}}">
        </div>
                                                                    </div>

    </div>

    <div class="card mb-4">

                                        
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection