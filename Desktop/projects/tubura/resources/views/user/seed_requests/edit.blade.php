@extends('layouts.master')

@section('menu')

@include('user.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Seed Request</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Seed Requests</a></li>
    <li class="breadcrumb-item active" aria-current="page">id</li>
    </ol>
</nav>


@endsection



@section('content')


@if($errors->any())
<div class="alert alert-light border-left danger">
<ul>
    @foreach($errors->all() as $error)
    <li class="text-danger">{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif

<form method="post" action="{{route('seed-requests.update',['seed_request'=>$seed_request->id])}}" >
    @csrf
    @method('PUT')


        

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="season_id">Season</label>
        <div class="col-sm-12 col-md-10">
        <select class="js-example-basic-single form-control" style="width:100%" name="season_id" id="season_id">
            @foreach((\App\Models\Season::all() ?? [] ) as $season)
            <option value="{{$season->id}}"
                @if($seed_request->season_id == old('season_id', $season->id))
                selected="selected"
                @endif
            >{{$season->year->name}}-{{$season->season_type->name}}</option>

            @endforeach
        </select>
    </div>
</div>
            

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="farmer_id">Farmer</label>
        <div class="col-sm-12 col-md-10">
        <select class="js-example-basic-single form-control" style="width:100%" name="farmer_id" id="farmer_id">
            @foreach((\App\Models\Farmer::all() ?? [] ) as $farmer)
            <option value="{{$farmer->id}}"
                @if($seed_request->farmer_id == old('farmer_id', $farmer->id))
                selected="selected"
                @endif
            >{{$farmer->name}}</option>

            @endforeach
        </select>
    </div>
</div>
            

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="seed_id">Seed</label>
        <div class="col-sm-12 col-md-10">
        <select class="js-example-basic-single form-control" style="width:100%" name="seed_id" id="seed_id">
            @foreach((\App\Models\Seed::all() ?? [] ) as $seed)
            <option value="{{$seed->id}}"
                @if($seed_request->seed_id == old('seed_id', $seed->id))
                selected="selected"
                @endif
            >{{$seed->name}}</option>

            @endforeach
        </select>
    </div>
</div>
        

                                            <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="requested_amount">Requested Amount</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="requested_amount" id="requested_amount" value="{{old('requested_amount',$seed_request->requested_amount)}}"
                        required="required"
                >
            @if($errors->has('requested_amount'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('requested_amount')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="given_amount">Given Amount</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control String"  type="text"  name="given_amount" id="given_amount" value="{{old('given_amount',$seed_request->given_amount)}}"
                        required="required"
                >
            @if($errors->has('given_amount'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('given_amount')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="approved">Approved</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control Boolean"  type="text"  name="approved" id="approved" value="{{old('approved',$seed_request->approved)}}"
                        >
            @if($errors->has('approved'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('approved')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="received">Received</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control Boolean"  type="text"  name="received" id="received" value="{{old('received',$seed_request->received)}}"
                        >
            @if($errors->has('received'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('received')}}</strong></span>
        @endif
    </div>
</div>
                        
  


   



    
   

    <div class="offset-6">
        <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
    </div>

</form>  




@endsection












