@extends('layouts.master')



@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Season create</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard" >Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Season</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h4> Season Show </h4>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Start</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$season->start}}">
        </div>
                                                                <div class="form-group">
            <label class="col-form-label" for="value">End</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$season->end}}">
        </div>
                                                    </div>

    </div>

    <div class="card mb-4">

                                        
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection