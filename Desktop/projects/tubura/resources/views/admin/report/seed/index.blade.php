@extends('layouts.master')

@section('menu')

@include('admin.partials.menu')



@endsection

@section('path')
<div class="title">
    <h4>Seed Application report</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://tubura.test/dashboard">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Seed Application</li>
    </ol>
</nav>


@endsection

@section('filter')
<form action="{{route('seed_report.filter')}}" action="post"  >
    <div class="row">
      <div class="col">
        

        <select class="form-control" name="application">
            <option value="" selected disabled>Season</option>
            @foreach ($seedApplication as $application)
                <option value="{{$application->id}}">{{$application->season->year->name}}-{{$application->season->season_type->name}}</option>
            @endforeach

        </select>
      </div>
      <div class="col">
        <select class="form-control" name="seed">
            <option value="" selected disabled>Seed</option>
            <option value="">All seeds</option>
            @foreach ($seeds as $seed)
                <option value="{{$seed->id}}">{{$seed->name}}</option>
            @endforeach

        </select>
      </div>
      <div class="col">
        <div class="col">
            <select class="form-control" name="cell">
                <option value="" selected disabled>Cell</option>
                <option value="all">All cells</option>
                @foreach ($cells as $cell)
                    <option value="{{$cell->id}}">{{$cell->name}}</option>
                @endforeach
    
            </select>
          </div>
      </div>



      <div class="col">
        <div class="col">
            <button class="btn btn-primary" type="submit">Filter</button>
          </div>
      </div>


    </div>
  </form>
@endsection





@section('content')





   <?php
     $totalAmount=0;

     foreach($reports as $r){
         
         $totalAmount=$totalAmount+$r->requested_amount;
     }

   ?>

  <div class="alert alert-info">
      <center> <strong> Total amount: {{$totalAmount}} kg.</strong></center>
  </div>


   <table class="data-table table stripe hover nowrap">
   
   
    <thead>
        <tr>
                        
                        
        <th>Farmer name</th>
        <th>Farmer Last name</th>
        <td>Farmer Id</td>
        <td>Requested Amount</td>
        </tr>
    </thead>
    <tbody>

        @foreach($reports as $key => $report)
        <tr>
        
        

        <td>
             {{$report->farmer->name}}                  
                            
        </td>
        <td>
            {{$report->farmer->surname}}                  
                           
       </td>
       <td>
        {{$report->farmer->NID}}                  
                       
       </td>

       <td>
           {{$report->requested_amount}} kg.
       </td>
         <tr>       
            
        @endforeach
                   
                        


    
   

    
    
       

    <tbody>    

    </table>     




@endsection
