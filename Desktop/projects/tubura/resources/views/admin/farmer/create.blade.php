@extends('layouts.master')
@section('menu')
@include('admin.partials.menu')
@endsection
@section('path')
<div class="title">
   <h4>New farmer</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">New farmer</li>
   </ol>
</nav>
@endsection


@section('content')

@if ($errors->any())
    @include('admin.partials.errors')
@endif


<form action="{{route('farmers.store')}}" method="post">
   @csrf
    <div class="form-group row">
      <label class="col-sm-12 col-md-2 col-form-label">Name</label>
      <div class="col-sm-12 col-md-10">
         <input  type="text" class="form-control" name="name" value="{{ old('name') }}"  required autocomplete="picture"   autofocus>
         
         
         @error('name')
         <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
         </span>
          @enderror
     
        </div>
   </div>


   <div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">Surname</label>
    <div class="col-sm-12 col-md-10">
       <input  type="text" class="form-control" name="surname" value="{{ old('surname') }}"  required autocomplete="picture"   autofocus>
   
       @error('surname')
       <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
       </span>
        @enderror
      </div>
    </div>


    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">NID</label>
        <div class="col-sm-12 col-md-10">
           <input type="text" class="form-control  @error('NID') is-invalid @enderror "   name="NID"  value="{{ old('NID') }}" required autocomplete="picture"   autofocus>
       
           @error('NID')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
            @enderror
        </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Phone number</label>
            <div class="col-sm-12 col-md-10">
               <input  type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}"  required autocomplete="picture"   autofocus>
               @error('phone_number')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
                @enderror
           
            </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Cell</label>
                <div class="col-sm-12 col-md-10">
                   <select class="js-example-basic-single form-control" style="width:100%" name="cell_id">
                     
                     @foreach($cells as $key => $cell)
                   <option value="{{$cell->id}}">{{$cell->name}}</option>
                     @endforeach
                     
                   
                   </select>

                   @error('cell')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                    @enderror
                </div>
             </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Land size (in Hectare)</label>
                <div class="col-sm-12 col-md-10">
                   <input  type="number" value="{{ old('land_size') }}" class="form-control" name="land_size"  required autocomplete="picture"   autofocus>
               
                   @error('land_size')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                    @enderror
                  </div>
                </div>

 <div class="offset-6">
               <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="{{route('farmers.index')}}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 

            </form>

         </div>            
@endsection