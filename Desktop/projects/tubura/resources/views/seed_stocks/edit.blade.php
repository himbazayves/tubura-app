@extends('layouts.master')

@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Seed Stock</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Seed Stocks</a></li>
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

<form method="post" action="{{route('seed-stocks.update',['seed_stock'=>$seed_stock->id])}}" >
    @csrf
    @method('PUT')


        

    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="season_id">Season</label>
        <div class="col-sm-12 col-md-10">
        <select class="js-example-basic-single form-control" style="width:100%" name="season_id" id="season_id">
            @foreach((\App\Models\Season::all() ?? [] ) as $season)
            <option value="{{$season->id}}"
                @if($seed_stock->season_id == old('season_id', $season->id))
                selected="selected"
                @endif
            >{{$season->}}</option>

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
                @if($seed_stock->seed_id == old('seed_id', $seed->id))
                selected="selected"
                @endif
            >{{$seed->name}}</option>

            @endforeach
        </select>
    </div>
</div>
        

                            <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="initial_amount">Initial Amount</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control Integer"  type="number"  name="initial_amount" id="initial_amount" value="{{old('initial_amount',$seed_stock->initial_amount)}}"
                        required="required"
                >
            @if($errors->has('initial_amount'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('initial_amount')}}</strong></span>
        @endif
    </div>
</div>
                <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="current_amount">Current Amount</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control Integer"  type="number"  name="current_amount" id="current_amount" value="{{old('current_amount',$seed_stock->current_amount)}}"
                        required="required"
                >
            @if($errors->has('current_amount'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('current_amount')}}</strong></span>
        @endif
    </div>
</div>
                                
  


   



    
   

    <div class="offset-6">
        <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
    </div>

</form>  




@endsection












