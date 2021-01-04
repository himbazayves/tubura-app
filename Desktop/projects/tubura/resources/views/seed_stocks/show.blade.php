@extends('layouts.master')



@section('menu')

@include('user.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Seed Stock create</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard" >Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Seed Stock</li>
    </ol>
</nav>

@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Seed Stock Show </h1>
        </div>

    <div class="card-body">
                                                        <div class="form-group">
            <label class="col-form-label" for="value">Initial Amount</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$seedStock->initial_amount}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Current Amount</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$seedStock->current_amount}}">
        </div>
                                                                                    </div>

    </div>

    <div class="card mb-4">

                                                        
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection