@extends('layouts.master')

@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Fertilizer Application</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Fertilizer Applications</a></li>
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

<form method="post" action="{{route('fertilizer-applications.update',['fertilizer_application'=>$fertilizer_application->id])}}" >
    @csrf
    @method('PUT')


            

                            <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label" for="open">Open</label>
        <div class="col-sm-12 col-md-10">
                <input class="form-control Boolean"  type="text"  name="open" id="open" value="{{old('open',$fertilizer_application->open)}}"
                        >
            @if($errors->has('open'))
        <span class="invalid-feedback" role="alert"><strong>{{$errors->first('open')}}</strong></span>
        @endif
    </div>
</div>
                        
  


   



    
   

    <div class="offset-6">
        <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
    </div>

</form>  




@endsection












